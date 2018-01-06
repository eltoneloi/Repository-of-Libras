<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['catDescription', 'catName','context_id'];
    protected $guarded = ['id'];
    protected $table = 'categories';

    public function word(){
    	//return $this->hasMany('\App\Word');
    	return $this->hasMany(Word::class);
    }

    public function context(){
    	//return $this->belongsToMany('\App\Context');
    	return $this->belongsTo(Context::class);
    }
}
