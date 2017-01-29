<?php

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $reviews = factory(\App\Models\Review::class, 10)->create();
        foreach ($reviews as $review) {
            $tagIds = \App\Models\Tag::pluck('id')->random();
            $review->tags()->sync([$tagIds]);
        }
    }

}
