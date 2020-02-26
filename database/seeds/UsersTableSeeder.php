<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $assistanceRole = Role::where('name', 'assistance')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' =>  'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin')
        ]);

        $assistance = User::create([
            'name' =>  'Assistance',
            'email' => 'assistance@gmail.com',
            'password' => Hash::make('assistance')
        ]);

        $user = User::create([
            'name' =>  'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user')
        ]);

        $admin->roles()->attach($adminRole);
        $assistance->roles()->attach($assistanceRole);
        $user->roles()->attach($userRole);
    }
}
