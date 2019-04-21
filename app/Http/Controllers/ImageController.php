<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Validator;

class ImageController extends Controller
{
    //
    public function index()
    {
        return response()->json(Image::paginate(10), 200);
    }

    public function show($id)
    {
        $image = Image::find($id);
        if(is_null($image)){
            return response()->json(null, 404);
        }
        return response()->json(Image::findOrFail($id), 200);
    }

    public function store(Request $request)
    {
        $rules = [
            'folder' => 'required|max:45|unique:tbl_image,folder',
            'count' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $image = Image::create($request->all());
        return response()->json($image, 201);
    }

    public function update(Request $request, Image $image)
    {
        $rules = [
            'folder' => 'required|max:45|unique:tbl_image,folder,'.$image->id,
            'count' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $image->update($request->all());
        return response()->json($image, 200);
    }

    public function delete(Request $request, Image $image)
    {
        $image->delete($request->all());
        return response()->json(null, 204);
    }
}
