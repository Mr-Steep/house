<?php

namespace App\View\Components;

use App\Models\Chat;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
use Illuminate\Database\Eloquent\Collection;

class DashboardLayout extends Component
{
    private static $newBooking;
    private static $soonBooking;
    private static $inHouseBooking;
    private static $departureBooking;
    private static $archiveBooking;

    static function getNewBooking()
    {
        return self::$newBooking;
    }

    static function getSoonBooking()
    {
        return self::$soonBooking;
    }

    static function getInHouseBooking()
    {
        return self::$inHouseBooking;
    }

    static function getDepartureBooking()
    {
        return self::$departureBooking;
    }

    static function getArchiveBooking()
    {
        return self::$archiveBooking;
    }

    static function getCountNewBooking()
    {
        return self::countItems(self::$newBooking);
    }

    static function getCountSoonBooking()
    {
        return self::countItems(self::$soonBooking);
    }

    static function getCountInHouseBooking()
    {
        return self::countItems(self::$inHouseBooking);
    }

    static function getCountDepartureBooking()
    {
        return self::countItems(self::$departureBooking);
    }

    static function getCountArchiveBooking()
    {
        return self::countItems(self::$archiveBooking);
    }

    static function countItems($collection): int
    {
        $count = 0;
        foreach ($collection as $hab) {
            $count += $hab->booking->count();
        };
        return $count;
    }


    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        self::$newBooking = collect();
        self::$soonBooking = collect();
        self::$inHouseBooking = collect();
        self::$departureBooking = collect();

        self::$newBooking = Auth::user()->habitations()->with('booking', function ($query) {
            $query->where('confirmed', 0);
        })->get();

        self::$soonBooking = Auth::user()->habitations()->with('booking', function ($query) {
            $query
                ->where('confirmed', 1)
                ->where('arrival', '>', Carbon::today());

        })->get();

        self::$inHouseBooking = Auth::user()->habitations()->with('booking', function ($query) {
            $query
                ->where('confirmed', 1)
                ->where('arrival', '<=', Carbon::today())
                ->where('departure', '>', Carbon::today());

        })->get();


        self::$departureBooking = Auth::user()->habitations()->with('booking', function ($query) {
            $query
                ->where('confirmed', 1)
                ->where('departure', Carbon::today());
        })->get();


        self::$archiveBooking = Auth::user()->habitations()->with('booking', function ($query) {
            $query->where('departure', '<',Carbon::today());
        })->get();


        $countBooking = self::getCountNewBooking();
        $countMessageNew = Chat::where('to_user_id',Auth::user()->id)
            ->where('message_status','Not Send')->get()->count();
        return view('layouts.dashboard', compact('countBooking', 'countMessageNew'));
    }
}

