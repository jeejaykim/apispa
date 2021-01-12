<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Schedule;
use App\Reservation;
use App\Services;
use App\Category;
use App\User;
use App\Addons;

use Carbon;

class HomeController extends Controller
{

    public function index()
    {
        $schedules = Schedule::orderBy('sched_time','asc')->get();
        $users = User::where('role', 'staff')->where('status', '1')->get();
        $services = Services::orderBy('created_at','desc')->get();
        return view('home.index', compact('schedules','users','services'));
    }

    public function reserve(Schedule $schedule, User $staff)
    {
        $minute = 2;
        $countSchedule = Schedule::count();
        $nextSchedule = Schedule::find($schedule->id + 1);

        if($schedule->id != $countSchedule){
            $reservation = Reservation::where('active', 1)->where('reserved_date', Carbon::now()->format('Y-m-d'))->where('therapist_id', $staff->id)->first();
            $minute = $reservation === null ? 2 : 1 ;
        }else{
            $minute = 1;
        }

        return view ('home.reserve',compact('schedule', 'staff','minute'));
    }

    public function store(Schedule $schedule, User $staff, Request $request)
    {
        dd($request->all());
        $this->validate($request,[
            'name'=>'required',
            'contact_number'=> 'required',
            'minute' => 'required'
        ]);
        return redirect()->route('reservation.success');
    }

}
