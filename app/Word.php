<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Word extends Model
{
    protected $fillable = ['word', 'category_id', 'creator_id'];
    protected $guarded = ['id'];
  	protected $table = 'words';


  	

  	public function category(){
  		//return $this->belongsTo('\App\Category')->withDefault();
  		return $this->belongsTo(Category::class);
  	}

  	public function gesture(){
  		return $this->hasOne(Gesture::class);
  	}

    public function user(){
      return $this->belongsTo(User::class);
    }
}
