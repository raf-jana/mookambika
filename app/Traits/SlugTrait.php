<?php

namespace App\Traits;

trait SlugTrait {

    /**
     * Set the unique slug.
     *
     * @param $value
     * @param $extra
     */
    public function setUniqueSlug($value, $extra) {
        $slug = str_slug($value . '-' . $extra);
        if (static::whereSlug($slug)->exists()) {
            $this->setUniqueSlug($slug, $extra + 1);
            return;
        }
        $this->attributes['slug'] = $slug;
    }

}
