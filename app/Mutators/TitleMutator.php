<?php

namespace App\Mutators;

use Carbon\Carbon;
use App\Traits\SlugTrait;

trait TitleMutator {

    use SlugTrait;

    /**
     * Set the title and the readable slug.
     * 
     * @param string $value
     */
    public function setTitleAttribute($value) {
        $this->attributes['title'] = $value;
        $this->setUniqueSlug($value, '');
    }

}
