<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['admin', 'marketing', 'hr'];

        foreach ($roles as $role) {
            Role::create([
                'name' => $role
            ]);
        }

        if (app()->environment('local')) {
            // Create users with fake emails
            $admin = User::create([
                'name' => 'Test Admin',
                'email' => 'admin@test.com',
                'password' => bcrypt('password')
            ]);

            $admin->roles()->attach(Role::find([1, 2, 3]));

            $marketing = User::create([
                'name' => 'Test Marketing',
                'email' => 'marketing@test.com',
                'password' => bcrypt('password')
            ]);

            $marketing->roles()->attach(Role::find(2));

            $hr = User::create([
                'name' => 'Test HR',
                'email' => 'hr@test.com',
                'password' => bcrypt('password')
            ]);

            $hr->roles()->attach(Role::find(3));
        } else {
            // Create users with real emails
        }
    }
}
