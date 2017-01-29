<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug'
    ];

    /**
     * One to Many relation.
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function users() {
        return $this->hasMany(env('APP_MODEL_NAMESPACE') . 'User');
    }

}
