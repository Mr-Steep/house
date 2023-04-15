<?php

namespace App\Http\Controllers;

use App\Models\Advantages;
use App\Models\Habitation;
use App\Models\TypeHabitation;
use App\Models\TypePartHabitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HabitationController extends Controller
{

    public function index(Request $request)
    {
        $habitations  = $this->search($request);
        session(['isMap' => $request->getPathInfo() == '/map' ]);
        return view('welcome', compact('habitations'));
    }


    private function search(Request $request): \Illuminate\Database\Eloquent\Collection
    {
        $habitations = \App\Models\Habitation::where('moderate', 1);

        if($request->place){
            $words = explode(',', $request->place);

            foreach ($words as $word){
                $place = trim($word);
                $habitations->orWhere('city', 'like',"%{$place}%");
//                $habitations->like('street', 'like',"%$word%");
            }
        }
        if($request->start && $request->end){



        }
        $habitations->where('finished',100);
        return $habitations->get();
    }


    public function create(Request $request)
    {
        $user = Auth::user();
        $unregisteredHabitations = $user->getUnregisteredHabitation();
        if ($unregisteredHabitations->count()) {
            return view('page.unregisteredHabitations', compact('unregisteredHabitations'));
        }
        $habitation = Habitation::create([
            'user_id' => $user->id,
        ]);
        $question = $this->questions(1, TypeHabitation::all());
        return redirect()->route('habitation.edit',$habitation->id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */

    public function store(Request $request, Habitation $habitation)
    {

    }
    public function showAll(Request $request, Habitation $habitation)
    {

        return view('habitation.show-all', compact('habitation'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Habitation $habitation
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Habitation $habitation)
    {
       return view('habitation.show', compact('habitation'));
    }


    public function edit(Habitation $habitation)
    {
        $q = $habitation->question;
        $answers = match ($q) {
            2 => TypePartHabitation::all(),
            5 => Advantages::all(),
            default => TypeHabitation::all()
        };
        $question = $this->questions($q, $answers);
        return view('quiz.quiz', compact('question', 'habitation'));


    }

    public function cancel(Habitation $habitation)
    {
        $habitation->question--;

        $habitation->question = match ($habitation->question){
            0 => 1,
            default =>$habitation->question
        };

        $habitation->save();
        return redirect()->back();

    }


    public function update(Request $request, Habitation $habitation)
    {
        if($habitation->question>=10){
            $habitation->finished = 100;
            $habitation->save();
            return redirect()->route('dashboard.index');
        }

        $validate = match ($habitation->question) {
            1 => ['id_type_habitation' => 'required|between:1,500'],
            2 => ['id_part_type_habitation' => 'required|between:1,500'],
            3 => [
                'city' => 'required',
                'street' => 'required',
                'house' => 'required',
                'floor' => 'required',
                'latitude' => 'required',
                'longitude' => 'required',
            ],
            4 => [ 'count_guests' => 'required|numeric|min:1'],
            5 => [ 'ids_advantages' => 'required_unless:items,[]'],
            6 => [],
            7 => ['description'=> 'required|string|min:20'],
            8 => ['name'=> 'required|string|min:5|max:30'],
            9 => ['price'=> 'required|numeric|min:5|max:1500'],
        };


        if ($request['id_type_habitation']) {
            $habitation->id_type_habitation = $request['id_type_habitation'];
        }
        if ($request['id_part_type_habitation']) {
            $habitation->id_part_type_habitation = $request['id_part_type_habitation'];
        }
        if ($request['latitude']) {
            $habitation->latitude = $request['latitude'];
        }
        if ($request['longitude']) {
            $habitation->longitude = $request['longitude'];
        }
        if ($request['city']) {
            $habitation->city = $request['city'];
        }
        if ($request['street']) {
            $habitation->street = $request['street'];
        }
        if ($request['house']) {
            $habitation->house = $request['house'];
        }
        if ($request['floor']) {
            $habitation->floor = $request['floor'];
        }
        if ($request['count_guests']) {
            $habitation->count_guests = $request['count_guests'];
        }
        if ($request['ids_advantages']) {
            $habitation->ids_advantages = json_encode($request['ids_advantages'][0]);
        }
        if ($request['description']) {
            $habitation->description = $request['description'];
        }
        if ($request['name']) {
            $habitation->name = $request['name'];
        }
        if ($request['price']) {
            $habitation->price = $request['price'];
        }

        $validator = Validator::make($request->all(), $validate);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }



        $habitation->question++;
        $habitation->save();

        return redirect(route('habitation.edit', $habitation->id));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Habitation $habitation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Habitation $habitation)
    {
        $habitation->delete();
    }

    public function removeAll()
    {
        $user = Auth::user();
        $user->unregisteredHabitation()->delete();
        return redirect('/habitation/create');
    }

    private function questions($id_question, $answers)
    {
        $quiz = [
            1 => [
                'name' => 'Выберите Жильё',
                'items' => $answers,
            ],
            2 => [
                'name' => 'Что Вы предлагаете?',
                'items' => $answers,
            ],
            3 => [
                'name' => 'Адрес Вашего Жилья',
                'items' => null,
            ],
            4 => [
                'name' => 'Количество гостей',
                'items' => null,
            ],
            5 => [
                'name' => 'Расскажите о преимуществах',
                'items' => $answers,
            ],
            6 => [
                'name' => 'Загрузите фотографии',
                'items' => null,
            ],
            7 => [
                'name' => 'Расскажите о Вашем жилье',
                'items' => null,
            ],
            8 => [
                'name' => 'Интересное название',
                'items' => null,
            ],
            9 => [
                'name' => 'Сколько Вы хотите за ночь (USD) ?',
                'items' => null,
            ],
            10 => [
                'name' => 'Поздравляем Вы закончили',
                'items' => null,
            ],

        ];
        $quiz[$id_question]['id'] = $id_question;
        $quiz[$id_question]['percent'] = $id_question * 10;
        return $quiz[$id_question];
    }


}
