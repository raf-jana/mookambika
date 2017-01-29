<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'mobile_number',
        'subject',
        'message'
    ];

}
