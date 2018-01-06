<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Context extends Model
{
    protected $fillable = ['contDescription','contName'];
    protected $guarded = ["id"];
    protected $table = 'contexts';


    public function category(){
    	//return $this->belongsToMany('\App\Category');
    	return $this->hasMany(Category::class);
    }
}
