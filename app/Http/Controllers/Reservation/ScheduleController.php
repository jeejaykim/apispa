<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;


class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $schedule = Schedule::orderBy('sched_time','asc')->paginate(10);
        return view('schedule.index')->with('schedule',$schedule);
    }

    public function create(Request $request)
    {
        $chosen_time = Schedule::orderBy('sched_time','asc')->get();
        return view('schedule.create')->with('chosen_date',$chosen_time);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'sched_time'=>'required|unique:schedules,sched_time',
            
        ]);
        $schedule = new Schedule;
        $schedule->sched_time = $request->input('sched_time');
        $schedule->save();

        return redirect(route('schedule.index'))->with('success','Schedule Saved');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'sched_time'=>'required',
            
        ]);
        $sched = Reservation::find($id);
        $sched->sched_time = $request->input('sched_time');
        $sched->save();

        return redirect(route('schedule.index'))->with('success','Reservation Updated');
    }

    public function destroy($id)
    {
        $schedule = Schedule::find($id);
        $schedule->delete();
        return redirect(route('schedule.index'))->with('success','Schedule Deleted');
    }
}
