<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Alexis Chata";
        $user->email = "alexizz.19.ac@gmail.com";
        $user->password = bcrypt("989785058");
        $user->save();
    }
}
