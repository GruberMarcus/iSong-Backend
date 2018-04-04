<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'title', 'length', 'data', 'artist', 'user_id'
  ];

  public function user(){
    return $this->belongsTo('App\User');
  }

}
