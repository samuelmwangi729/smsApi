<?php

use Illuminate\Database\Seeder;
use App\Number;
use Illuminate\Support\Str;
class SmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numbers=Number::all()->take(5000);

        for($i=0;$i<count($numbers);$i++){
            App\SMS::create([
                'message'=>Str::random(32),
                'number'=>$numbers[$i]['number']
            ]);
        }
    }
}
