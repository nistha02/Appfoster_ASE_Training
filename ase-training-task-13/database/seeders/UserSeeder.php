<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=0 ; $i<5 ; $i++)
        {
            $user=new User;
            $user->name=fake()->name;
            $user->email=fake()->safeEmail;
            $user->save();
        }
    }
}
