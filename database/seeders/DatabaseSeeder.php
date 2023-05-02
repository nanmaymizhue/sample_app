<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleAndPermissionSeeder::class);
        $this->call(AdminSeeder::class);

       Author::create(['name'=>'Sayar Bo']);
       Author::create(['name'=>'Sayar AKyiTaw']);
       Author::create(['name'=>'Sayar Aung']);
      
        // \App\Models\User::factory(10)->create();
    }
}
