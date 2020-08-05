<?php

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
        \App\User::create([
           'name'=>'ozgurkrcm',
           'email'=>'test@test.com',
           'email_verified_at'=>now(),
           'password'=>\Illuminate\Support\Facades\Hash::make('password'),
            'is_admin'=>1,
            'remember_token' => Str::random(10)
        ]);
        factory(\App\User::class,15)->create();
    }
}
