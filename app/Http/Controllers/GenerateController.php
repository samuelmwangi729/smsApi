<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenerateController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function generate(){
        $numbers=[];
        for($i=0;$i<100000;$i++){
            $numbers[$i]="+2547".rand(00000000,99999999);
        }
        return view('welcome')->with('numbers',$numbers);
    }
}
