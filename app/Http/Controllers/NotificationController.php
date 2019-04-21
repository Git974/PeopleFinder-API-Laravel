<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;
use Validator;

class NotificationController extends Controller
{
    //
    public function index()
    {
        return response()->json(Notification::paginate(10), 200);
    }

    public function show($id)
    {
        $notification = Notification::find($id);
        if(is_null($notification)){
            return response()->json(null, 404);
        }
        return response()->json(Notification::findOrFail($id), 200);
    }

    public function store(Request $request)
    {
        $rules = [
            'user' => 'required',
            'subject' => 'required|max:45'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $notification = Notification::create($request->all());
        return response()->json($notification, 201);
    }

    public function update(Request $request, Notification $notification)
    {
        $rules = [
            'user' => 'required',
            'subject' => 'required|max:45'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $notification->update($request->all());
        return response()->json($notification, 200);
    }

    public function delete(Request $request, Notification $notification)
    {
        $notification->delete($request->all());
        return response()->json(null, 204);
    }
}

