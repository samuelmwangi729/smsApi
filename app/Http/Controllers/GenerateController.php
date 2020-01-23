<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Number;
use DB;

class GenerateController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function generate(){
        $number=DB::table('numbers')->paginate(1000);
        return view('welcome')->with('numbers',$number);
    }
}
