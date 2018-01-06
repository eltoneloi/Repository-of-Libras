<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Evaluation extends Model
{
    protected $fillable = ['liked_it','user_id', 'gesture_id'];
    protected $guarded = ["id"];
    protected $table = 'evaluations';


    public function user(){
    	return $this->belongTo(User::class);
    }

    public function gesture(){
    	return $this->belongTo(Gesture::class);
    }
}
