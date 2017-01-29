<?php

use App\Models\Tag;
use App\Models\News;
use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $news = factory(News::class, 100)->create();
        foreach ($news as $piece) {
            $tagIds = Tag::pluck('id')->random();
            $piece->tags()->sync([$tagIds]);
        }
    }

}
