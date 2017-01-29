<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model {

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the page that owns the footer.
     */
    public function page() {
        return $this->belongsToMany(Page::class);
    }

}
