<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $primaryKey = 'user_id';

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
