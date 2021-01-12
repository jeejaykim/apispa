<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Attendance;
use App\Reservation;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $dates = Attendance::distinct()->get(['date']);
        $therapists = User::where('role','staff')->get();
        $month = now();
        return view('attendance.index', compact('dates','therapists','month'));
    }
    public function edit(Attendance $attendance){
        $staff = User::find($attendance->user_id);
        return view('attendance.edit', compact('staff','attendance'));
    }
    public function update(Request $request, Attendance $attendance){
        $data = $this->validate($request,[
            'status'=>'required', 'integer',
            'date'=>'required'
        ]);
        $attendance->update($data);
        return redirect()->back()->with('success','Successfully updated');
    }
    public function destroy(Attendance $attendance){
        $attendance->delete();
        return redirect()->back()->with('warning','Successfully Deleted');
    }
}