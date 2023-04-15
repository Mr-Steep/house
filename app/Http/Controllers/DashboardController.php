<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public static $user_id = 0;
    public function index()
    {
        $habitations = Auth::user()->habitations()->with('booking')->get();
        return view('dashboard.booking', compact('habitations'));
    }

    public function habitation(){
        dd(2);
    }

    public function booking()
    {

        $habitations = Auth::user()->habitations()->with('booking')->get();
        return view('dashboard.booking', compact('habitations'));
    }

    public function message()
    {
        $chats = Chat::orWhere('from_user_id', Auth::user()->id)
            ->orWhere('to_user_id', Auth::user()->id)
            ->with('chatTo')->with('chatFrom')
            ->get()
            ->unique('from_user_id', 'to_user_id');
        return view('dashboard.message', compact('chats'));
    }

    public function dialog(User $user)
    {
        $chats = Auth::user()->chatTo()->with('chatFrom')->get()->unique('from_user_id', 'to_user_id');
        $user_id = $user->id;
        self::$user_id = $user_id;
        $collection = $user->chatFrom()->with('chatTo')->with('chatFrom')->where('to_user_id', Auth::user()->id)->get()
            ->merge($user->chatTo()->with('chatTo')->with('chatFrom')->where('from_user_id', Auth::user()->id)->get());
        $messages = $collection->unique()->sortBy('created_at');
        return view('dashboard.message', compact('chats', 'messages', 'user_id'));
    }

    public function settings(){
        return view('dashboard.settings');

    }

    public function verification(){
        return view('dashboard.verification');
    }



//    public function create(Request $request)
//    {
//
//    }



//    public function store(Request $request, Dashboard $dashboard){}

//    public function show(Dashboard $dashboard){}


//    public function edit(Dashboard $dashboard){}

//    public function cancel(Dashboard $dashboard){}


//    public function update(Request $request, Dashboard $dashboard){}


//    public function destroy(Dashboard $dashboard){}
}
