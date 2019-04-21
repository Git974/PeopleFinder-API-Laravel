<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use Validator;

class LocationController extends Controller
{
    //
    public function index()
    {
        return response()->json(Location::paginate(10), 200);
    }

    public function show($id)
    {
        $location = Location::find($id);
        if(is_null($location)){
            return response()->json(null, 404);
        }
        return response()->json(Location::findOrFail($id), 200);
    }

    public function store(Request $request)
    {
        $rules = [
            'latitude' => 'required',
            'longitude' => 'required',
            'name' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $location = Location::create($request->all());
        return response()->json($location, 201);
    }

    public function update(Request $request, Location $location)
    {
        $rules = [
            'latitude' => 'required',
            'longitude' => 'required',
            'name' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $location->update($request->all());
        return response()->json($location, 200);
    }

    public function delete(Request $request, Location $location)
    {
        $location->delete($request->all());
        return response()->json(null, 204);
    }
}
