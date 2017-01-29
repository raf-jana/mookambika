<?php

namespace App\Models;

use App\Scopes\StatusScope;
use App\Mutators\ContentMutator;
use App\Presenters\DatePresenter;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model {

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'faqs';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'published_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'last_user_id',
        'title',
        'content',
        'meta_description',
        'published_at',
        'status',
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
     * Get the user for the discussion.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Many to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongToMany
     */
    public function tags() {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /**
     * Set the title and the readable slug.
     * 
     * @param string $value
     */
    public function setTitleAttribute($value) {
        $this->attributes['title'] = $value;
    }

}
