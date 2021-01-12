<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    protected $fillable= [
        'expenses',
        'amount',
        'date',
        'therapist_id',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
