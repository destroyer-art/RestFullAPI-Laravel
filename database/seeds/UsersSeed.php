<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use App\User;

class UsersSeed extends Seeder
{
    public function run()
    {
       $this->createUsers();
    }

    private function createUsers(){
        $max = rand(50, 60);
        for($i=0; $i < $max; $i++):
            $this->newUsers($i);
        endfor;
        $this->command->info($max . ' demo users created');
    }

    private function newUsers($index){
        User::create([
            'name' => 'User '. $index,
            'email' => 'teste'.$index.'@gmail.com',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'verified' => $verified = 'as',
            'verification_token' => $verified == \App\User::VERIFIED_USER ? null : User::generateVerificationCode(),
            'admin' => $verified = 'false',
        ]);
    }
}
