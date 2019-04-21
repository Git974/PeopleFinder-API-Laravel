<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Validator;

class AdminController extends Controller
{
    //
    public function index()
    {
        return response()->json(Admin::paginate(10), 200);
    }

    public function show($id)
    {
        $admin = Admin::find($id);
        if(is_null($admin)){
            return response()->json(null, 404);
        }
        return response()->json(Admin::findOrFail($id), 200);
    }

    public function store(Request $request)
    {
        $rules = [
            'firstName' => 'required|max:20',
            'lastName' => 'required|max:20',
            'username' => 'required|max:30|unique:tbl_admin,username',
            'password' => 'required|min:8'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $admin = Admin::create($request->all());
        return response()->json($admin, 201);
    }

    public function update(Request $request, Admin $admin)
    {
        $rules = [
            'firstName' => 'required|max:20',
            'lastName' => 'required|max:20',
            'username' => 'required|max:30|unique:tbl_admin,username,'.$admin->id,
            'password' => 'required|min:8'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $admin->update($request->all());
        return response()->json($admin, 200);
    }


    public function delete(Request $request, Admin $admin)
    {
        $admin->delete($request->all());
        return response()->json(null, 204);
    }
}
