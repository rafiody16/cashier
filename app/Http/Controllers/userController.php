<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class userController extends Controller
{

    public function insert(Request $req)
    {
        $validator = Validator::make($req -> all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:50|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator -> fails())
        {
            return response() -> json([
                'success' => false,
                'message' => $validator -> errors()
            ]);
        }

        $user = new User();
        $user -> name       = $req -> name;
        $user -> email      = $req -> email;
        $user -> role       = 'admin';
        $user -> password   = Hash::make($req -> password);
        $user -> save();

        $data = User::where('name', '=', $req -> name) -> first();
        return response() -> json([
            'success' => true,
            'message' => 'berhasil menambahkan user',
            'data' => $data
        ]);
    }

    public function login(Request $req)
    {
        $validator = Validator::make($req -> all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6'
        ]);

        if ($validator -> fails())
        {
            return response() -> json([
                'success' => false,
                'message' => $validator -> errors()
            ]);
        }

        $credentials = $req -> only('email', 'password');

        if (Auth::attempt($credentials))
        {
            $user   = Auth::user();
            $token  = $user -> createToken('AuthToken')->plainTextToken;
        }
    }

}
