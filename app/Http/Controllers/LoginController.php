<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|string',
            'nik' => 'required|string'
        ]);
        if (!auth()->attempt([
            "password" => htmlspecialchars(trim($request->password)),
            "nik" => htmlspecialchars(trim(strtolower(($request->nik))))
        ])) {
            return back()->with('pesan', 'Invalid Credentials');
        }
        $data = auth()->user();
        if ($data->status_aktif === 'tidak') {
            return back()->with('pesan', 'Your Account Is Not Active');
        }
        return redirect()->route('dashboard');
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
