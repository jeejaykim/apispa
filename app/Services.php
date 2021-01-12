<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Services extends Model
{

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    protected $gaurded = ['id'];

    protected $fillable= [
        'name',
        'minutes',
        'price',
        'category_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function reservation(){
        return $this->hasMany(Reservation::class);
    }

} 

