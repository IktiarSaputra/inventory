<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'app_name' => 'Inventory',
               'name'=>'Admin',
               'email'=>'admin@inventory.com',
               'level'=>'1',
               'password'=> bcrypt('secret123'),
            ]
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
