<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'DeepikaKangne',
            'email' => 'deepika.kangne2095@gmail.com',
            'email_verified_at' => '2021-04-01 11:13:12',
            'password' => '$2y$12$uDJ.ogtw1NJCxzaju13QFep95iylgynXdqnrX.obKL0LoqbnXyZ8y',
            'user_type' => 'admin',
            'remember_token' => Str::random(32),
        ]);
    }
}
