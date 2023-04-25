<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $admin =User::create([
            'name'=>'Mi Zhue',
            'email'=>'mizhue@gmail.com',
            'password'=>Hash::make('password')
        ]);
        $editor =User::create([
            'name'=>'Editor',
            'email'=>'editor@gmail.com',
            'password'=>Hash::make('password')
        ]);

        $admin->assignRole('SuperAdmin');
        $editor->assignRole('Editor');


    }
}
