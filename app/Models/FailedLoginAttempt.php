<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FailedLoginAttempt extends Model {

    protected $fillable = [
        'user_id',
        'login_id',
        'ip_address'
    ];

    public static function record($user = null, $loginId, $ip) {
        return static::create([
                    'user_id' => is_null($user) ? null : $user->id,
                    'login_id' => $loginId,
                    'ip_address' => $ip
        ]);
    }

}
