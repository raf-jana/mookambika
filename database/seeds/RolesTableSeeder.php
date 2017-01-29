<?php

use App\Models\Role;
use Illuminate\Database\QueryException;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        // Truncate role
        Role::truncate();

        try {
            Role::create([
                'title' => 'Admin',
                'slug' => str_slug('Admin', '_'),
            ]);
            Role::create([
                'title' => 'Moderator',
                'slug' => str_slug('Moderator', '_'),
            ]);
            Role::create([
                'title' => 'User',
                'slug' => str_slug('User', '_'),
            ]);
        } catch (QueryException $e) {
            die('Some exception occured. <br/>' . $e->getMessage());
        }


        echo ' Roles successfully inserted' . PHP_EOL;
    }

}
