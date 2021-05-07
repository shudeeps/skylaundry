<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public $timestamps = true;
    protected $fillable = [
        'pickUpDate', 'pickUpTime', 'description','user_id'
    ];

    // const CREATED_AT = 'creation_date';
    // const UPDATED_AT = 'updated_date';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id'
    ];

   
    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
