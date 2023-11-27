<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use illuminate\Support\Str;

class BrandController extends Controller
{
    //
    function index()
    {
        $brand=Brand::all();
        $data=[
            'status' => true,
            'message' => 'Success.',
            'brands'=>$brand,
        ];
        return response()->json($data);
    }

    //get show id
    function show($id)
    {
        $brand=Brand::find($id);
        if ($brand==null)
        {
            $data=[
                'status' => false,
                'message' => 'Error.',
                'brands'=>null,
            ];
            return response()->json($data,404);
        }
        $data=[
            'status' => true,
            'message' => 'Success.',
            'brands'=>$brand,
        ];
        return response()->json($data);
    }

    function store(Request $request){
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug= Str::of($request->name)->slug('-');
        $brand->description = $request->description;    
        $brand->image = $request->image;
        $brand->sort_order = $request->sort_order;  
        $brand->status= $request->status;
        $brand->created_at = date('Y-m-d H:i:s');
        $brand->created_by = 1;
        $image=request()->image;
        if($image!=null){
            $extension= $image->getClientOriginalExtension();
            if(in_array($extension,['png','jpg','gif','webp'])){
                $fileName= date('ymdHis')  .'.'. $extension;
                $image->move(public_path('images/brand'), $fileName);
                $brand->image = $fileName;
            }
        }

        if($brand->save()==true){
            $data = [
                'status'=>true,
                'message'=>'Success',
                'brand'=>$brand
            ] ;
            return response()->json($data);
        }
    }
}
