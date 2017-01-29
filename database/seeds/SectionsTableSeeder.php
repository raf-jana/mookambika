<?php

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $sections = [
            ['title' => 'Banner'
            ],
            [
                'title' => 'Text'
            ],
            [
                'title' => 'Widget_Services'
            ],
            [
                'title' => 'Reviews'
            ],
            [
                'title' => 'FAQs'
            ],
            [
                'title' => 'News'
            ],
            [
                'title' => 'Features'
            ],
            [
                'title' => 'Photos'
            ],
            [
                'title' => 'Maps'
            ],
            [
                'title' => 'HTML'
            ],
            [
                'title' => 'Widget_3Steps'
            ],
            [
                'title' => 'Widget_CTA'
            ],
            [
                'title' => 'Widget_CTA_Form'
            ]
        ];

        DB::table('sections')->insert($sections);
    }

}
