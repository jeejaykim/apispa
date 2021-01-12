<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Schedule;
use App\User;
use Carbon\Carbon;
use App\Reservation;


class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $staffs = User::where('role', 'staff')->paginate(3);
        $reservations = Reservation::get();
        $total_reservation = Reservation::where('active',1)->get();
        $reservations_today = $total_reservation->where('reserved_date',now()->format('Y-m-d'));
        $sales = 0;
        $total_sales = 0;
        foreach($total_reservation as $total_res){
            $total_sales = $total_sales + $total_res->service->price;
        }
        foreach($reservations_today as $res){
            $sales = $sales + $res->service->price;
        }
        
        $month = request('month') == null ? now()->format('m') : Carbon::parse("2019-".request('month')."-01")->format('m');
        $data = $month != now()->format('m') ? 'total' : (request('data') ? request('data') : 'today');
        $days=[];
        for($i = 1; $i<=7; $i++){
            $tmpDays = $this->collectDataByDay($month,$i);
            array_push($days, $tmpDays);
        }
        for($i; $i<=Schedule::count();$i++){
            
        }
        switch($data){

            case "today":
            for ($i= 1; $i <= Schedule::count(); $i++){
                $label[$i-1] = Carbon::parse(Schedule::find($i)->sched_time)->format('h A');
                $resCount[$i-1] = Reservation::where('active', 1)->where('schedule_id', $i)->where('reserved_date',now()->format('Y-m-d'))->count();
            }
            
            return view('dashboard.index', compact('staffs','reservations','total_sales','sales','data', 'month', 'label','resCount','days'));
            break;

            case "total":
            for ($i = (int)Carbon::parse("2019-".$month."-01")->startOfMonth()->format('d'); $i <= Carbon::parse("2019-".$month."-01")->endOfMonth()->format('d'); $i++) {
                $label[$i-1] = $i;
                $resCount[$i-1] = Reservation::where('active', 1)->where('reserved_date','2019-'.$month."-".$i)->count();
            }
            $reservations = Reservation::where('active', 1)->whereMonth('reserved_date', $month)->get();
            return view('dashboard.index', compact('staffs','reservations','total_sales','sales','data', 'month', 'label','resCount','days'));
            break;

            
        }
    }

    public function customer(){
        $customers = Reservation::where('role','guest')->distinct()->get();
        return view('dashboard.customers',compact('customers'));
    }

    public function all_reservations(){
        $reservations = Reservation::orderBy('created_at','desc')->paginate(20);
        return view('dashboard.all_reservations', compact('reservations'));
    }
    public function trash(){
        $reservations = Reservation::onlyTrashed()->get();
        return view('dashboard.trash',compact('reservations'));
    }
    public function restore($id){
        Reservation::withTrashed()->find($id)->restore();
        return redirect()->back()->with('success','Successfully Restored');
    }
    public function today(){
        $schedules = Schedule::orderBy('sched_time','asc')->get();
        $users = User::where('role','staff')->where('status', '1')->get();
        return view('dashboard.today', compact('schedules', 'users'));
    }

    public static function collectDataByDay($month,$day) {
        $complete_date = Carbon::parse("2019-".$month.'-05');
        $days = [];
        $total = 0;
        for ($i = 1; $i < $complete_date->startOfMonth()->daysInMonth ; $i++) { 
            if (Carbon::parse("2019-".$month.'-'.$i)->format('N') == $day) {
                // array_push($days, $i);
                $total = $total + Reservation::whereDate('reserved_date', Carbon::parse("2019-".$month.'-'.$i))->count();
            }
        }
        return $total;
    }
}   
