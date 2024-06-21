<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Jobs\SendMailJob;
use App\Mail\SendEmail;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if(auth()->user()->role == "agent"){
        //     $agents = Agent::with("user")->where("user_id", auth()->user()->id)->get();
        // }else{
            
        // }
        $users = User::with("roleUser")->get();
        // dd($users);
        $roles = Role::all();
       
        return view('admin.user.index', compact('users','roles'));
    }

    public function store(Request $request)
    {
        if ($request->input('checknik')) {
            $role = User::where('nik', $request->input('nik'))->exists();
            return response()->json($role);
        }

        try {
            DB::beginTransaction();
            $password = Str::random(8);
            $data = $request->except('_token');

                    //buat upload gambar
            if ($request->hasFile('avatar')) {
                if ($request->file('avatar')->isValid()) {
                    $fileName = time() . '-' . date('M') . '.' . $request->file('avatar')->extension();
                    $request->file('avatar')->move(public_path('assets/image/user'), $fileName);
                    $data['avatar'] = "assets/image/user/$fileName";
                }
            }
            $data["role_id"] = $data["role"];
            $data["password"] = bcrypt($password);
            $data["manajer"] = $data["manager"];
            $create = User::create($data);
            DB::commit();

            $data["password"] = $password;
            //send email
            // dispatch(new SendMailJob($data));
            Mail::to($data["email"])->send(new SendEmail($data));
            
            return response()->json(true);
    } catch (\Throwable $th) {
        DB::rollback();
        // return response()->json(false);
        return response()->json($th->getMessage());
        // throw $th->getMessage();
    }
    }
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            User::find($id)->delete();
            $user->delete();
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
    public function show($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }
    public function update($id, Request $request)
    {
        $user = User::find($id);
        $data = $request->except('_token');

         if ($request->hasFile('avatar')) {
            if ($request->file('avatar')->isValid()) {
                if (file_exists(public_path($user->avatar) && $user->avatar != null)) {
                    unlink(public_path($user->avatar));
                }
                $fileName = time() . '-' . date('M') . '.' . $request->file('avatar')->extension();
                $request->file('avatar')->move(public_path('assets/image/user'), $fileName);
                $data['avatar'] = "assets/image/user/$fileName";
            }
        }
        $data["manajer"] = $data["manager"];
        $user->fill($data);
        if ($user->save()) {
            return response()->json(true);
        } else {
            return response()->json(false);
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
