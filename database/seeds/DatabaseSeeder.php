<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // Model::unguard();
        try {
            $this->call(RolesTableSeeder::class);
            $this->call(UsersTableSeeder::class);
            $this->call(TagsTableSeeder::class);
            $this->call(SectionsTableSeeder::class);
            $this->call(NewsTableSeeder::class);
            $this->call(ReviewsTableSeeder::class);
            $this->call(FaqsTableSeeder::class);
            $this->call(FootersTableSeeder::class);
            $this->call(SiteConfigTableSeeder::class);
            $this->call(PagesTableSeeder::class);
            //Model::guard();
        } catch (QueryException $e) {
            die('Some exception occured. <br/>' . $e->getMessage());
        }
    }

}
