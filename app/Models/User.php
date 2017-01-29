<?php

namespace App\Models;

use App\Traits\SlugTrait;
use App\Scopes\StatusScope;
use App\Traits\DetectUser;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use HasApiTokens,
        Notifiable,
        SoftDeletes,
        DetectUser,
        SlugTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'mobile_number',
        'email',
        'password',
        'role_id',
        'role_title',
        'status',
        'activation_code',
        'activated_at',
        'avatar',
        'organization',
        'designation',
        'slug'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'activation_code',
        'updated_at',
        'deleted_at'
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    public static function boot() {
        parent::boot();

        static::addGlobalScope(new StatusScope());
    }

    /**
     * One to Many relation.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role() {
        return $this->belongsTo(env('APP_MODEL_NAMESPACE') . 'Role');
    }

    /**
     * Get user role.
     *
     * @return string
     */
    public function getRole() {
        return $this->role;
    }

    /**
     * Set the user's first name.
     *
     * @param  string  $value
     * @return void
     */
    public function setFullNameAttribute($value) {
        $this->attributes['full_name'] = ucwords(strtolower($value));
        $this->setUniqueSlug($value, '');
    }

}
