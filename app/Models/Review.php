<?php

namespace App\Models;

use App\Scopes\StatusScope;
use App\Mutators\ContentMutator;
use App\Presenters\DatePresenter;
use Illuminate\Database\Eloquent\Model;

class Review extends Model {

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'last_user_id',
        'reviewer_name',
        'reviewer_picture_uri',
        'reviewer_designation',
        'reviewer_organization',
        'reviewer_location',
        'content',
        'rating',
        'status'
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
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the tags for the blog article.
     *
     * @return \Illuminate\Database\Eloquent\Relations\morphToMany
     */
    public function tags() {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /**
     * Set the title and the readable slug.
     * 
     * @param string $value
     */
    public function setReviewerNameAttribute($value) {
        $this->attributes['reviewer_name'] = ucwords($value);
    }

}
