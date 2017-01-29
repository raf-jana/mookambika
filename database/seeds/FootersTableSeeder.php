<?php

use Illuminate\Database\Seeder;

class FootersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(\App\Models\Footer::class, 10)->create();
    }

}
