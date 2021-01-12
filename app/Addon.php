<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
    protected $fillable= [
        'option',
        'price',
    ];
    public function reservation(){
        return $this->belongsToMany('App\Reservations', 'reservation_addon');
    }
}
