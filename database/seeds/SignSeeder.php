<?php

use Illuminate\Database\Seeder;

class SignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name'=>'admin',
            'email'=>'samples@sample.com',
            'sign'=>md5(Hash::make('P!@#four5sam')),
            'password'=>'P!@#four5sam'
        ]);
        App\Sign::create([
            'user_id'=>1,
            'sign'=>md5(Hash::make('P!@#four5sam'))
        ]);
    }
}
