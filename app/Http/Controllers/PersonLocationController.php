<?php

namespace App\Http\Controllers;

use App\PersonLocation;
use Illuminate\Http\Request;
use Validator;

class PersonLocationController extends Controller
{
    //
    public function index()
    {
        return response()->json(PersonLocation::get(), 200);
    }

    public function show($id)
    {
        $personLocation = PersonLocation::find($id);
        if(is_null($personLocation)){
            return response()->json(null, 404);
        }
        return response()->json(PersonLocation::findOrFail($id), 200);
    }

    public function store(Request $request)
    {
        $rules = [
            'location' => 'required',
            'missingPerson' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $personLocation = PersonLocation::create($request->all());
        return response()->json($personLocation, 201);
    }

    public function update(Request $request, PersonLocation $personLocation)
    {
        $rules = [
            'location' => 'required',
            'missingPerson' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $personLocation->update($request->all());
        return response()->json($personLocation, 200);
    }

    public function delete(Request $request, PersonLocation $personLocation)
    {
        $personLocation->delete($request->all());
        return response()->json(null, 204);
    }
}
