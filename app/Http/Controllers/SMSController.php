<?php

namespace App\Http\Controllers;
use App\Number;
use App\User;
use App\Sign;
use App\SMS;
use Session;
use Illuminate\Http\Request;
class SMSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $signExists=Sign::where('sign',$request->sign)->first();
        if(is_null($signExists)){
            return response(json_encode([
                'data'=>'No Data Available'
            ]));
        }else{
            if($signExists->count()==1){
                $user=User::find($signExists->id);
                if($user->count()==1){
                   if($user->email==$request->user){
                       $number=Number::where('number',$request->phone)->get()->count();
                       if($number>0){
                        $message=SMS::where('number',$request->phone)->get()->last();
                        if(is_null($message)){
                            $data=['user'=>$request->user,'time'=>$request->time,'phone'=>$request->phone,'message'=>'null','res'=>'true'];
                            return response()->json([$data],200);
                        }else{
                            $msg=$message['message'];
                         $data=['user'=>$request->user,'time'=>$request->time,'phone'=>$request->phone,'message'=>$msg,'status'=>'Found','res'=>'true'];
                         return response()->json([$data],200);
                        }
                         
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
             $count=Number::where('number',$request->phone)->get()->count();
             if($count==0){
                 $data=['user'=>$request->user,'time'=>$request->time,'phone'=>$request->phone,'status'=>'Not Found','res'=>'false'];
                 return response()->json([$data],200);
             }else{
                 $data=['user'=>$request->user,'time'=>$request->time,'phone'=>$request->phone,'status'=>'Founds','res'=>'true'];
                 return response()->json([$data],200);
             }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('smsCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $signExists=Sign::where('sign',$request->sign)->first();
        if(is_null($signExists)){
            return response(json_encode(['data'=>'Signature error']));
        }else{
            if($signExists->count()==1){
                //thus the sign exists
                $user=User::find($signExists->user_id);
                if(is_null($user)){
                    return response(json_encode(['data'=>'error: User error. User Does Not Exist']));
                }else{
                    if($user->count()==1){
                       $number=Number::where('number',$request->phone);
                       if($number->count()==0){
                           return response(json_encode(['data'=>'error, NUmber not Found']));
                       }else{
                           //if the number is found, then we post the message 
                           SMS::create([
                               'number'=>$request->phone,
                               'message'=>$request->message
                           ]);
                           Session::flash('success','The Message Has been posted');
                           return redirect()->route('homes');
                       }
                    }
                }
                dd(json_encode($user));
            }
        }

        dd($signExists->count());
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
