<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $role = Role::find(1);
        $now = Carbon::now();

        $users = [
            [
                'full_name' => config('blog.admin_full_name'),
                'email' => config('blog.admin_email'),
                'mobile_number' => config('blog.admin_mobile_number'),
                'password' => Hash::make('admin'),
                'status' => true,
                'activated_at' => $now->subMonths(3),
                'role_id' => $role->id,
                'role_title' => $role->title,
                'created_at' => $now->subMonths(3),
                'updated_at' => Carbon::now()
            ]
        ];

        DB::table('users')->insert($users);

        factory(User::class, 10)->create();
    }

}
