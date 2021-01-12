<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\User;
use App\Reservation;
use App\Schedule;
use Carbon\Carbon;

class RecordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function show($id, $type,$month){
        $staff = User::find($id);
        $dt = Carbon::now();
        $reservation = Reservation::where('active',1)->where('therapist',$staff->name);

        switch ($type){
            case "today":
            $dt = $dt->format('Y-m-d');
            $reservation = $reservation->whereMonth('reserved_date',$month)->where('reserved_date', $dt)->get();
            break;
            
            case "weekly":
            $dt2= Carbon::now();
            $reservation = $reservation->whereMonth('reserved_date',$month)->whereBetween('reserved_date', [$dt->subDays(7),$dt2])->get();
            break;
            
            case "monthly":
            $reservation = $reservation->whereMonth('reserved_date', $month)->get();
            break;
            
            default:

            break;
        }
        return view('records.show', compact('reservation','staff','type'));

    }

    public function revenue(Request $request){
        $month = request('month') == now()->format('m') ? request('month') : Carbon::parse("2019-".request('month')."-01")->format('m');
        $reservations = Reservation::get();
        $users = User::where('role', 'staff')->get();
        $data = $month != now()->format('m') ? 'total' : request('data');
        $label[] = array();
        $resCount[] = array();
        switch($data){

            case "today":
            $reservations = Reservation::where('active', 1)->where('reserved_date',now()->format('Y-m-d'));
            for ($i= 1; $i <= Schedule::count(); $i++){
                $label[$i-1] = Carbon::parse(Schedule::find($i)->sched_time)->format('h A');
                $resCount[$i-1] = Reservation::where('active', 1)->where('schedule_id', $i)->where('reserved_date',now()->format('Y-m-d'))->count();
            }

            return view('records.revenue', compact('reservations','users','data', 'month', 'label','resCount'));
            break;

            case "total":
            for ($i = (int)Carbon::parse("2019-".$month."-01")->startOfMonth()->format('d'); $i <= Carbon::parse("2019-".$month."-01")->endOfMonth()->format('d'); $i++) {
                $label[$i-1] = $i;
                $resCount[$i-1] = Reservation::where('active', 1)->where('reserved_date','2019-'.$month."-".$i)->count();
            }
            $reservations = Reservation::where('active', 1)->whereMonth('reserved_date', $month)->get();
            return view('records.revenue', compact('reservations','users','data', 'month', 'label','resCount'));
            break;

            
        }
    }
    
    public function search(Request $request){
        $data = request('search_me');
        $reservations = Reservation::where('name','LIKE','%'.$data.'%')
                                    ->orWhere('role','LIKE','%'.$data.'%')
                                    ->orWhere('contact_number','LIKE','%'.$data.'%')
                                    ->orWhere('reserved_date','LIKE','%'.$data.'%')->get();
                                    
        return view('records.search', compact('reservations','data'));
    }

}
