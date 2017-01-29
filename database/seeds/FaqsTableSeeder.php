<?php

use Illuminate\Database\Seeder;

class FaqsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $faqs = factory(\App\Models\Faq::class, 20)->create();
        foreach ($faqs as $faq) {
            $tagIds = \App\Models\Tag::pluck('id')->random();
            $faq->tags()->sync([$tagIds]);
        }
    }

}
