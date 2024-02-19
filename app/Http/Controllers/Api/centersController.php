<?php

namespace App\Http\Controllers\Api;
use App\Models\centers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class centersController extends Controller
{


    public function index(){

        $centers = centers::all();
        if($centers->count() > 0){

        return response()->json([
            'status' =>200,
            'centers' =>$centers
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
                    'phone' => 'required',
                    'image' => 'required',
                    'address' => 'required',
                    'works' => 'required',
                ]);

                if($validator->fails()){
                    return response()->json([
                        'status'=>404,
                        'error'=>$validator->messages()
                    ],404);
                }else{

                    $centers = centers::create([
                        'name' => $request->name,
                        'phone' => $request->phone,
                        'image' => $request->image,
                        'address' => $request->address,
                        'works' => $request->works,
                    ]);


                    if($centers){
                        return response()->json([
                            'status' =>200,
                            'message' =>'center created successfull'
                        ],200);
                    }else{
                        return response()->json([
                            'status' =>404,
                            'message' =>'wrong'
                        ],404);

                    }
                }
                    }

}
