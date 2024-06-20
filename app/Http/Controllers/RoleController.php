<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.role.index_role', compact('roles'));
    }
    //store membuat data baru
    public function store(Request $request)
    {
        $data = $request->except('_token');

        $rule = [
            'nama' => 'required|string',
            'role' => 'required|string',
        ];

        $validate = Validator::make($data, $rule);
        if ($validate->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validate->errors()
            ]);
        }

        $newrole = Role::create($data);
        if ($newrole) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
    //
    public function show($id)
    {
        return response()->json(role::find($id));
    }
    public function update($id, Request $request)
    {
        $role = Role::find($id);
        $rule = [
            'nama' => 'required|string',
            'role' => 'required|string',
            // 'avatar' => 'mimes:jpg,png,jpeg,gift|max:2000|required'
        ];
        $data = $request->except('_token');

        $role->fill($data);
        if ($role->save()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
    public function destroy($id)
    {
        $role = Role::find($id);
        // unlink($role->avatar);
        if ($role) {
            $role->delete();
            return response()->json(true);
        } else {
            return response()->json(true);
        }
    }

    public function profile($id, Request $request) {
        $role = Role::find($id);
        return view('admin.role.profile', compact('role'));
    }
}
