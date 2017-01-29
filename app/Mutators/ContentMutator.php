<?php

namespace App\Mutators;

use App\Services\Markdowner;

trait ContentMutator {

    /**
     * Set the content attribute.
     *
     * @param $value
     */
    public function setContentAttribute($value) {
        $data = [
            'raw' => $value,
            'html' => (new Markdowner)->convertMarkdownToHtml($value)
        ];

        $this->attributes['content'] = json_encode($data);
    }

}
