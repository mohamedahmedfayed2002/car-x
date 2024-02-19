<?php

namespace App\Http\Controllers\Api;
use App\Models\feedback;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class feedbackController extends Controller
{


    public function index(){

        $feedback = feedback::all();
        if($feedback->count() > 0){

        return response()->json([
            'status' =>200,
            'feedback' =>$feedback
        ],200);

        }else{
            return response()->json([
                'status' =>404,
                'message' =>'NO Record Found'
                ],404);
        }
            }



            public function store(Request $request){

                $validator = validator::make($request->all(),[
                    'name' => 'required',
                    'description' => 'required',
                ]);

                if($validator->fails()){
                    return response()->json([
                        'status'=>404,
                        'error'=>$validator->messages()
                    ],404);
                }else{

                    $feedback = feedback::create([
                        'name' => $request->name,
                        'description' => $request->description,
                    ]);



                    if($feedback){
                        return response()->json([
                            'status' =>200,
                            'message' =>'Feedback created successfull'
                        ],200);
                    }else{
                        return response()->json([
                            'status' =>404,
                            'message' =>'wrong'
                        ],404);

                    }
                }

                    }

                    public function show($id)
                    {
                        $user = User::find($id);
                        if($user){

                            return response()->json([
                                'status' =>200,
                                'user' =>$user
                            ],200);

                        }else{
                            return response()->json([
                                'status' =>404,
                                'message' =>"No Blogs Found!"
                            ],404);

                        }



                }
            }
