<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HttpRequestLog extends Model {

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'http_request_logs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'ip',
        'url',
        'user_id',
        'request_body',
        'request_method',
        'responded_with',
        'user_agent',
        'success'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

}
