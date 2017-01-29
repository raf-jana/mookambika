<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model {

    use SoftDeletes;

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
        'tag', 'meta_description'
    ];

    /**
     * Get all of the articles that are assigned this tag.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorpheByMany
     */
    public function reviews() {
        return $this->morphedByMany(Review::class, 'taggable');
    }

    /**
     * Get all of the discussions that are assigned this tag.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorpheBymany
     */
    public function news() {
        return $this->morphedByMany(News::class, 'taggable');
    }

    /**
     * Get all of the discussions that are assigned this tag.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorpheBymany
     */
    public function faqs() {
        return $this->morphedByMany(Faq::class, 'taggable');
    }

}
