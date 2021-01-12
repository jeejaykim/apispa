<?php

namespace App\Http\Controllers\Reservation;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Category;
use App\Services;
use App\Reservation;
use App\Schedule;
use App\User;
use App\Addon;

use Illuminate\Support\Facades\Auth;

class PrereservationController extends Controller
{
    public function store(Request $request, Schedule $schedule, User $user)
    {
        $service = Services::where('id', 3)->first();
        $data = $this->validate($request,[
            'name'=>'required',
            'contact_number'=> !empty(Auth::user()) ? 'nullable' : 'required',
        ]);
        $reservation = Reservation::create(array_merge($data,[
            'role' => Auth::check() ? 'walkin' : 'guest',
            'reserved_date' => now(),
            'active' => Auth::check() ? 1 : 0,
            'schedule_id' => $schedule->id,
            'therapist_id' => $user->id,
            'service_id' => $request->service]
        ));
        return redirect()->route('prereservation.success');
    }
    public function show(Schedule $schedule, User $user)
    {
        $reservation = Reservation::where('reserved_date',now()->format('Y-m-d'))->where('schedule_id',$schedule->id)->where('therapist_id',$user->id)->first();
        return $reservation ? redirect()->route('home.index') : view ('prereservation.show',compact('schedule', 'user'));
    }
}