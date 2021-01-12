<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Carbon;

class Reservation extends Model
{
    use SoftDeletes;

    /*
    * Attributes
    */

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    protected $gaurded = ['id'];

    protected $fillable= [
        'name',
        'role',
        'contact_number',
        'reserved_date',
        'active',
        'schedule_id',
        'therapist_id',
        'service_id'
    ];

    public function schedule(){
        return $this->belongsTo(Schedule::class, 'schedule_id');
    }

    public function staff(){
        return $this->belongsTo(User::class, 'staff_id');
    }

    public function therapist(){
        return $this->belongsTo(User::class, 'therapist_id');
    }
    public function service(){
        return $this->belongsTo(Services::class, 'service_id');
    }
    public function addon(){
        return $this->belongsToMany(Addon::class, 'reservation_addon');
    }


    public static function getStatus($id){
        $reservation = Reservation::find($id);
        return ($reservation->active == 0) ?  "Inactive" : "Active";

    }

    public static function checkData(){
        $count = Reservation::where('reserved_date', now()->format('Y-m-d'))->get()->count();  
        return $count == 0 ?  0 : 1;
    }
    public static function countData($i, $type){
        $count = Reservation::get()->count();  
        $x=$count-$i;
        if($x <= 0){
            return "0-0-0";
        } 
        $reservation = Reservation::find($x);    
        switch($type){

            case "id":
            return $reservation->id;
            break;

            case "name":
            return $reservation->name;
            break;

            case "time":
            return $reservation->schedule->sched_time;
            break;

            case "status":
            return $reservation->active == 1 ? "Active" : "Inactive";
            break;

        }
    }
    
    public static function checkPR( $schedule, $user){
        $schedule = Schedule::find($schedule);
        $user = User::find($user);
        $reservation = Reservation::where('reserved_date',now()->format('Y-m-d'))->where('therapist_id',$user->id)->get();
        $reservation0 = $reservation->where('schedule_id',$schedule->id)->first();
        $reservation1 = $reservation->where('schedule_id',$schedule->id-1)->first();
        $reservation2 = $reservation->where('schedule_id',$schedule->id-2)->first();
        
        if($reservation0){
            return Reservation::checkRes($reservation0);
        }else if($reservation1){
            return $reservation1->service->minutes >= 60 ? Reservation::checkRes($reservation1) : Reservation::echobtn($schedule, $user);
        }else{
            return $schedule->sched_time < now()->format('H:i:s') ? "- - - -" : Reservation::echobtn($schedule, $user);
        }
    }
    public static function echobtn($schedule, $user){
        echo '<a href="'.route('prereservation.show', ['schedule' => $schedule->id, 'user' => $user->id ]).'" class="btn table-btn text-uppercase">Reserve</a>';

    }
    public static function checkRes($reservation){
        if($reservation->active == 0){
            return "Pending";
        }else{
            return $reservation->role == "walkin" ? "Walk-in" : $reservation->name[0]."*****";
        }
    }
    public static function checkNR($schedule, $user){
        $schedule = Schedule::find($schedule);
        $user = User::find($user);
        $reservation = Reservation::where('reserved_date',now()->format('Y-m-d'))->where('schedule_id',$schedule->id+1)->where('therapist_id',$user->id)->first();

        return !empty($reservation) ? 1 : ($schedule->id>=Schedule::get()->count());
    }
    public static function getData($data, $type, $month){
        $expenses = $type !='total' ? Expenses::whereDate('date', now()->format('Y-m-d'))->get() : Expenses::whereMonth('date', $month)->get();
        $reservations = $type !='total' ? Reservation::where('reserved_date', now()->format('Y-m-d'))->get() : Reservation::whereMonth('reserved_date', $month)->get();
        $revenue = 0;
        $addon = 0;
        foreach($reservations as $reservation){
            $revenue += $reservation->service->price;
        }
        switch($data){

            case "expenses":
            return $expenses->sum('amount');
            break;

            case "revenue":
            
            return $revenue;
            break;

            case "income":
            return $revenue - $expenses->sum('amount');
            break;

        }
    }
    
}
