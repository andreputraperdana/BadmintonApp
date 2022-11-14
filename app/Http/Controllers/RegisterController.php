<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function getindex()
    {
        return view('register');
    }

    public function inputdata(Request $request)
    {
        $hasil = $request->input();
        // dd($hasil);
        $register = new User();
        $register->username = $hasil['username'];
        $register->password = Hash::make($hasil['password']);
        $register->role_id = $hasil['roleid'];
        $register->save();

        return response()->json(['stats' => 200, 'errors' => 'Test']);
    }
}
