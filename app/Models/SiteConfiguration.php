<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteConfiguration extends Model {

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'label',
        'key',
        'value',
        'sequence',
        'field_type',
        'editable'
    ];

}
