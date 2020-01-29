<?php

namespace App\Http\Controllers;
use App\Number;
use App\User;
use App\Sign;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $signExists=Sign::where('sign',$request->sign)->get()->first();
        //dd(json_encode($signExists->sign=='2aa2152eccb847278e8a9721939a6115'));
        if(is_null($signExists)){
            return response()->json('No data');
        }else{
            if($signExists->sign==$request->sign){
                $user=User::find($signExists->id);
                if($user->email==$request->user){
                   if($user->email==$request->user){
                       $number=Number::where('number',$request->phone)->get();
                       if($number[0]['number']==$request->phone){
                         $data=['user'=>$request->user,'time'=>$request->time,'phone'=>$request->phone,'status'=>'Found','res'=>'true'];
                         return response()->json([$data],200);
                       }else{
                             $data=['user'=>$request->user,'time'=>$request->time,'phone'=>$request->phone,'status'=>'Not Found','res'=>'true'];
                             return response()->json([$data],200);
                       }
                   }else{
                     $data=['res'=>'false','data:','User Error'];
                     return response()->json(['data'=>$data],200);
                   }
                }else{
                 $data=['res'=>'false','data:','User Error'];
                 return response()->json(['data'=>$data],200);
                }
             }else{
                 $data=['res'=>'false','data:','sign Error'];
                 return response()->json(['data'=>$data],200);
             }
             //if there is no sign
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
