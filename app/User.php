<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

use Carbon;
use App\Reservation;

class User extends Authenticatable
{
    use Notifiable;
    
    protected $fillable = [
        'username','name', 'email','contact_number', 'role', 'password','avatar'
    ];
    
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /*
    * Relationship
    */
    
    public function reservationstaff(){
        return $this->hasMany(Reservation::class, 'staff_id');
    }
    
    public function reservationtherapist(){
        return $this->hasMany(Reservation::class, 'therapist_id');
    }
    public function expense(){
        return $this->hasMany(Expenses::class);
    }
    public function attendances(){
        return $this->hasMany(Attendance::class);
    }
    /*
    * Functions
    */
    public function getProfilePic() {
        return $this->avatar == "default.jpg" ? 'images/default.jpg' : '/storage/avatars/'.$this->avatar ;
    }
    

 
    public function countData($dt, $type){
        $dt = $dt->format('Y-m-d');
        $total_reservation = Reservation::where('active',1)->where('therapist_id',$this->id)->get();
        $reservation = $total_reservation->where('reserved_date',$dt);
        $total_expenses = Expenses::where('user_id',$this->id)->get();
        $expenses = Expenses::where('user_id',$this->id)->whereDate('created_at', $dt)->get();
        
        $sales = 0;
        $total_sales = 0;
        
        foreach($reservation as $res){
            $sales = $sales + $res->service->price;
        }
        
        foreach($total_reservation as $total_res){
            $total_sales = $total_sales + $total_res->service->price;
        }
        
        switch ($type){
            
            case "customers":
            return $reservation->count();
            break;
            
            case "sales":
            return empty($reservation->count()) ? "No Reservation" : $sales;
            break;
            
            case "expenses":
            return $expenses->sum('amount');
            break;
            
            case "total":
            return $sales - $expenses->sum('amount');
            break;
            
            case "served":
            return $total_reservation->count();
            break;
            
            case "total_reservation":
            return $total_sales;
            break;
            
            case "total_expenses":
            return $total_expenses->sum('amount');
            break;
            
            case "total_income":
            return $total_sales - $total_expenses->sum('amount');
            break;
        }        
    }
    public function getExpense(){
        $expenses = Expenses::where('user_id',$this->id)->whereDate('date', now()->format('Y-m-d'))->get();
        return $expenses->sum('amount');
    }
    
    public function getExpenses(){
        return Expenses::where('user_id',$this->id)->whereDate('date', now()->format('Y-m-d'))->get();
    }
}
