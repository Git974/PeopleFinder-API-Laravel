<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    //
    public function index()
    {
        return response()->json(User::paginate(10), 200);
    }

    public function show($id)
    {
        $user = User::find($id);
        if(is_null($user)){
            return response()->json(null, 404);
        }
        return response()->json(User::findOrFail($id), 200);
    }

    public function store(Request $request)
    {
        $rules = [
            'firstName' => 'required|max:20',
            'lastName' => 'required|max:20',
            'email' => 'required|email|max:45|unique:tbl_user,email',
            'username' => 'required|max:30|unique:tbl_user,username',
            'phone' => 'required|max:15|min:10',
            'address' => 'required',
            'password' => 'required|min:8'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $user = User::create($request->all());
        return response()->json($user, 201);
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'firstName' => 'required|max:20',
            'lastName' => 'required|max:20',
            'email' => 'required|email|max:45|unique:tbl_user,email,'.$user->id,
            'username' => 'required|max:30|unique:tbl_user,username,'.$user->id,
            'phone' => 'required|max:15|min:10',
            'address' => 'required',
            'password' => 'required|min:8'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $user->update($request->all());
        return response()->json($user, 200);
    }

    public function delete(Request $request, User $user)
    {
        $user->delete($request->all());
        return response()->json(null, 204);
    }

    public function notifications(Request $request, User $user){
        $notifications = $user->notifications;
        return response()->json($notifications, 200);
    }

    public function search_by_username($username){
        $user = new User();
        $users = $user->search_by_username($username);
        return response()->json($users, 200);
    }
}
