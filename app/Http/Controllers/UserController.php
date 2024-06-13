<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where("role","!=", "agent")->get();
        return view('admin.user.index_user', compact('users'));
    }
    //store membuat data baru
    public function store(Request $request)
    {
        $data = $request->except('_token');
        if ($request->input('checknik')) {
            $user = User::where('nik', $request->input('nik'))->exists();
            return response()->json($user);
        }
        $rule = [
            'nama' => 'required|string',
            'nik' => 'required|string',
            // 'password' => 'required|password',
            // 'avatar' => 'mimes:jpg,png,jpeg,gift|max:2000|required'
        ];

        $validate = Validator::make($data, $rule);
        if ($validate->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validate->errors()
            ]);
        }
        //buat upload gambar
        // if ($request->hasFile('avatar')) {
        //     if ($request->file('avatar')->isValid()) {
        //         $fileName = time() . '-' . date('M') . '.' . $request->file('avatar')->extension();
        //         $request->file('avatar')->move(public_path('assets/image/user'), $fileName);
        //         $data['avatar'] = "assets/image/user/$fileName";
        //     }
        // }
        $data['password'] = Hash::make($request->input('password'));

        $newUser = User::create([
            'nama' => $data['nama'],
            'nik' => $data['nik'],
            'password' => $data['password'],
            'role' => $data['level'],
            // 'nomer_tlpn' => $data['nomer_tlpn'],
            // 'avatar' => $data['avatar']
        ]);
        if ($newUser) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
    //
    public function show($id)
    {
        return response()->json(User::find($id));
    }
    public function update($id, Request $request)
    {
        $user = User::find($id);
        $rule = [
            'nama' => 'required|string',
            'nik' => 'required|nik',
            'password' => 'required|password',
            // 'avatar' => 'mimes:jpg,png,jpeg,gift|max:2000|required'
        ];
        $data = $request->except('_token');
        // $validate = Validator::make($data, $rule);
        // if ($validate->fails()) {
        //     return response()->json([
        //         'status' => 'error',
        //         'errors' => $validate->errors()
        //     ]);
        // // }
        // if ($request->hasFile('avatar')) {
        //     if ($request->file('avatar')->isValid()) {
        //         if (file_exists(public_path($user->avatar) && $user->avatar != null)) {
        //             unlink(public_path($user->avatar));
        //         }
        //         $fileName = time() . '-' . date('M') . '.' . $request->file('avatar')->extension();
        //         $request->file('avatar')->move(public_path('assets/image/user'), $fileName);
        //         $data['avatar'] = "assets/image/user/$fileName";
        //     }
        // }
        $user->fill($data);
        if ($user->save()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
    public function destroy($id)
    {
        $user = User::find($id);
        // unlink($user->avatar);
        if ($user) {
            $user->delete();
            return response()->json(true);
        } else {
            return response()->json(true);
        }
    }
    public function checkPassword(Request $request) {
        $user = User::find($request->input("user_id"));
        if($user) {
            $isMatch = Hash::check($request->input("password_lama"), $user->password);
            if($isMatch) {
                return response()->json(true);
            }else{
                return response()->json(false);
            }
        }
    }
    public function updatePassword(Request $request) {
        $data = $request->except("_token");
        $user = User::find($request->input("user_id"));
        $user->fill(["password" => bcrypt($data["password"])]);
        if ($user->save()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
    public function profile($id, Request $request) {
        $user = User::find($id);
        return view('admin.user.profile', compact('user'));
    }
}
