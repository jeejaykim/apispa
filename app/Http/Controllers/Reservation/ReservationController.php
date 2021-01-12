<?php

namespace App\Http\Controllers\Reservation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

use App\Category;
use App\Services;
use App\Reservation;
use App\Schedule;
use App\User;
use App\Addon;


class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $dt = Carbon::now()->format('Y-m-d');
        $newreservations = Reservation::where('reserved_date', $dt)->where('active', 0)->orderBy('created_at','desc')->paginate(10);
        $oldreservations = Reservation::where('reserved_date', $dt)->where('active', 1)->orderBy('created_at','desc')->paginate(10);
        $addons = Addon::get();
        return view ('reservations.index', compact('newreservations', 'oldreservations','addons'));
    }
    public function create()
    {
        $staffs = User::where('role','staff')->get();
        $addons = Addon::get();
        $schedules = Schedule::get();
        $services = Services::get();
        return view('reservations.add', compact('staffs','addons','schedules','services'));
    }
    public function show($id)
    {
        $reservation = Reservation::find($id);
        $schedules = Schedule::get();
        $staffs = User::where('role','staff')->get();
        $services = Services::get();
        $addons = Addon::get();
        return view('reservations.show',compact('reservation','schedules','staffs','services','addons'));
    }
    public function update(Request $request, Reservation $reservation)
    {
        $data = $this->validate($request,[
            'name'=>'required', 'string', 'max:255',
            'role'=>'required', 'string',
            'contact_number'=>  $request->role === 'walkin' ? '' : 'required', 'string', 'max:11', 'min:11',
            'reserved_date'=> 'date',
            'active' => 'required',
            'schedule_id'=> 'required', 'string',
            'therapist_id'=> 'required', 'string',
            'service_id'=> 'required', 'string'
        ]);
        $reservation->update($data);
        $reservation->addon()->sync($request->addon);
        return back()->with('success','Reservation Updated'); 
    }
    public function activate(Reservation $reservation){
        $reservation->active = '1';
        $reservation->update();
        return back()->with('success','Successfully Activated ');
    }
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->back()->with('warning','Reservation Deleted');;
    }

    public function store(Request $request, Schedule $schedule, User $user)
    {
        $service = Services::where('id', 3)->first();
        $this->validate($request,[
            'name'=>'required',
            'contact_number'=>'required',
        ]);
        $reservation = Reservation::create([
            'name' => $request->name,
            'contact_number' => $request->contact_number,
            'role' => Auth::check() ? 'walkin' : 'guest',
            'reserved_date' => Carbon::now(),
            'active' => Auth::check() ? 1 : 0,
            'schedule_id' => $schedule->id,
            'therapist_id' => $user->id,
            'service_id' => $service->id
        ]);

        
        return redirect()->route('reservation.success');
    }
    public function save(Request $request){
        $data = $this->validate($request,[
            'name' => 'required',
            'contact_number' => 'required',
            'reserved_date' => 'required',
            'schedule_id' => 'required',
            'therapist_id' => 'required',
            'service_id' => 'required',
            'role' => 'required',
        ]);
        $reservation = Reservation::create(array_merge($data,[
            'active' => 1]
        ));
        return redirect()->back()->with('success','Successfully Added Old Reservation ');
    }
    
    

}
