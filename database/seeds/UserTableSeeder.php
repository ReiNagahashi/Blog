<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'=>'Rei Nagahashi',
            'email'=>'Rei@hhh.com',
            'password'=>bcrypt('password'),
            'admin'=>1
        ]);

        Profile::create([
            'user_id'=>$user->id,
            'avatar'=>'uploads/avatars/sample.jpg',
            'about'=>'自己紹介についてです okonanounoponyo',
            'facebook'=>'https://www.facebook.com/Rei'
        ]);
    }
}
