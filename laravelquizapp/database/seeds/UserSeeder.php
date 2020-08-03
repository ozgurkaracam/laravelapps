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
           'password'=>\Illuminate\Support\Facades\Hash::make('password'),
            'is_admin'=>1
        ]);
        factory(\App\User::class,2)->create();
    }
}
