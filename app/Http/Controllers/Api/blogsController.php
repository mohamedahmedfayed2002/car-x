<?php

namespace App\Http\Controllers\Api;
use App\Models\blogs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class blogsController extends Controller
{
    public function index(){

$blogs = blogs::all();
if($blogs->count() > 0){

return response()->json([
    'status' =>200,
    'blogs' =>$blogs
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
            'image' => 'required',
            'title' => 'required',
            'description' => 'required',
            'description2' => 'required',
            'description3' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>404,
                'error'=>$validator->messages()
            ],404);
        }else{

            $blogs = blogs::create([
                'image' => $request->image,
                'title' => $request->title,
                'description' => $request->description,
                'description2' => $request->description2,
                'description3' => $request->description3,
            ]);


            if($blogs){
                return response()->json([
                    'status' =>200,
                    'message' =>'blog created successfull'
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




