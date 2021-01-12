<?php

namespace App;

use Carbon;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    public static function getPercent($data, $month){
        
        switch ($data){

            case 'today':
            $reservationx= Reservation::where('reserved_date',now()->format('Y-m-d'))->count();
            $reservationy= Reservation::where('active',1)->count();
            return $reservationy == 0 ? 0 : ($reservationx == 0 ? 0 : round((($reservationy - $reservationx) / $reservationx) * 100, 2));
            break;
            
            case 'total':
            $reservationx= Reservation::whereMonth('reserved_date', $month)->where('active',1)->count();
            $reservationy= Reservation::where('active',1)->count();
            return $reservationy == 0 ? 0 : ($reservationx == 0 ? 0 : round((($reservationy - $reservationx) / $reservationx) * 100, 2));

            break;
        }

    }
    public static function getAverage($data, $month){
        switch($data){

            case 'day':
            return round(Reservation::whereMonth('reserved_date', $month)->count() / Carbon::parse('2019-'.$month.'-01')->endOfMonth()->format('d'));
            break;

            case 'week':
            return round(Reservation::whereMonth('reserved_date', $month)->count() / 7);
            break;

            case 'year':
            return round(Reservation::whereBetween('reserved_date', 
                        [ Carbon::parse('2019-'.$month.'-01')->startOfYear(),  
                        Carbon::parse('2019-'.$month.'-01')->endOfYear()])
                        ->count()/12);
            break;

        }
    }
    
    public static function getCustomerPerDay(){

    }
}
