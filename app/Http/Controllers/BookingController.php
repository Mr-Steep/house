<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $habitation_id = $request->habitation;
        $start = $request->start;
        $end = $request->end;
        $adult = $request->adult;
        $children = $request->children;

        $arrival = new Carbon($start);
        $departure = new Carbon($end);


//        $range = $request->range;
//        $arrRange = explode(Booking::SEPARATOR, $range);
//        $arrival = new Carbon($arrRange[0]);
//        $departure = new Carbon($arrRange[1]);

        $user = Auth::user();
        Booking::create([
            'habitation_id'=>$habitation_id,
            'user_id'=> $user->id,
            'arrival'=> $arrival,
            'departure'=>$departure,
            'adult'=>$adult,
            'children'=>$children,
        ]);
        return redirect()->back()->with('ok','ВСЕ ок');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }

    public function confirm(Booking $booking)
    {
        $booking->confirmed = true;
        $booking->update();
        return redirect()->back()->with('success');
    }

    public function cancel(Booking $booking)
    {
        $booking->confirmed = false;
        $booking->update();
        return redirect()->back();
//        return redirect()->back()->with('success');
    }
}
