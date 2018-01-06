<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Gesture extends Model
{
    protected $fillable = ['gestFile','word_id'];
    protected $guarded = ["id"];
    protected $table = 'gestures';

    public function word(){
    	return $this->hasOne(Word::class);
    }

    public function evaluation(){
    	return $this->hasMany(Evaluation::class);
    }
}
