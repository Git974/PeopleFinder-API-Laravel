<?php

namespace App\Http\Controllers;

use App\MissingPerson;
use App\Location;
use Illuminate\Http\Request;
use Validator;

class MissingPersonController extends Controller
{
    //
    public function index()
    {
        return response()->json(MissingPerson::get(), 200);
    }

    public function show($id)
    {
        $missingPerson = MissingPerson::find($id);
        if(is_null($missingPerson)){
            return response()->json(null, 404);
        }
        return response()->json(MissingPerson::findOrFail($id), 200);
    }

    public function store(Request $request)
    {
        $rules = [
            'firstName' => 'required|max:20',
            'lastName' => 'required|max:20',
            'age' => 'required',
            'cnic' => 'required|max:13|min:13|unique:tbl_missing_person,cnic',
            'phone' => 'required|max:15|min:10',
            'image' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $missingPerson = MissingPerson::create($request->all());
        return response()->json($missingPerson, 201);
    }

    public function update(Request $request, MissingPerson $missingPerson)
    {
        $rules = [
            'firstName' => 'required|max:20',
            'lastName' => 'required|max:20',
            'age' => 'required',
            'cnic' => 'required|max:13|min:13|unique:tbl_missing_person,cnic,'.$missingPerson->id,
            'phone' => 'required|max:15|min:10',
            'image' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $missingPerson->update($request->all());
        return response()->json($missingPerson, 200);
    }

    public function delete(Request $request, MissingPerson $missingPerson)
    {
        $missingPerson->delete($request->all());
        return response()->json(null, 204);
    }

    public function person_locations(Request $request, MissingPerson $missingPerson){
        $personLocations = $missingPerson->person_locations;
        $response = [];
        foreach($personLocations as $personLocation){
            $locationId = $personLocation->location;
            $location = Location::findOrFail($locationId);
            $data['detected'] = $personLocation;
            $data['location'] = $location;
            $response['personlocations'][] = $data;
        }
        return response()->json($response, 200);
    }

    public function search_by_name($name){
        $missingPerson = new MissingPerson();
        $missingPersons = $missingPerson->search_by_name($name);
        return response()->json($missingPersons, 200);
    }

    public function search_by_cnic($cnic){
        $missingPerson = new MissingPerson();
        $missingPersons = $missingPerson->search_by_cnic($cnic);
        return response()->json($missingPersons, 200);
    }

    public function search_by_age($age) {
        $missingPerson = new MissingPerson();
        $missingPersons = $missingPerson->search_by_age($age);
        return response()->json($missingPersons, 200);
    }

    public function image(Request $request, MissingPerson $missingPerson){
        $image = $missingPerson->image;
        return response()->json($image, 200);
    }
}
