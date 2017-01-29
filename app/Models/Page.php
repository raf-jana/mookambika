<?php

namespace App\Models;

use Carbon;
use App\Scopes\StatusScope;
use App\Mutators\TitleMutator;
use App\Presenters\DatePresenter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model {

    use TitleMutator,
    //DatePresenter,
        SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['published_at', 'created_at', 'deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'last_user_id',
        'layout',
        'type',
        'title',
        'footer_id',
        'footer_title',
        'color',
        'seo_title',
        'meta_keywords',
        'meta_description',
        'slug',
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
     * Many to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongToMany
     */
    public function sections() {
        return $this->belongsToMany(Section::class)->withPivot('section_title', 'sequence', 'mobile_enabled')->withTimestamps();
    }

    /**
     * Get the footer record associated with the page.
     */
    public function footer() {
        return $this->hasOne(Footer::class);
    }

    /**
     * Scope a query to only include publised pages.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query        	
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query) {
        return $query->where('status', 1)->where('published_at', '<=', Carbon::now());
    }

    /**
     * Scope a query to only include unpublised pages.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query        	
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUnpublished($query) {
        return $query->where('status', 0)->where('published_at', '>', Carbon::now());
    }

    /* public function setPublishedAtAttribute($date) {
      $this->attributes ['published_at'] = Carbon::parse($date)->format('Y-m-d H:i:s');
      } */
}
