<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model {

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Many to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongToMany
     */
    public function pages() {
        return $this->belongsToMany(Page::class)->withPivot('section_title', 'sequence', 'mobile_enabled')->withTimestamps();
    }

}
