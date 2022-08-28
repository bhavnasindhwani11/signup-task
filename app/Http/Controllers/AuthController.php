<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use PHPOpenSourceSaver\JWTAuth;
// use Jenssegers\Agent\Agent;
class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['login','register']]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');

        $token = Auth::attempt($credentials);

        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = Auth::user();
        // Cookie::set()
        return redirect()->route('dashboard')->withCookie(cookie('token', $user->createToken($request->email)->plainTextToken));
        // return response()->json([
        //         'status' => 'success',
        //         'user' => $user,
        //         'authorisation' => [
        //             'token' => $token,
        //             'type' => 'bearer',
        //         ]
        //     ]);

    }

    public function register(Request $request){
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|unique:users,phone',
            'otp' => 'required|max:7',
            'password' => 'required|string|min:6',
        ]);
        // $agent = new Agent();
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'otp' => $request->otp,
            'device' => $request->header('sec-ch-ua-platform'),
            'password' => Hash::make($request->password),
        ]);

        $token = Auth::login($user);
        return redirect()->route('dashboard')->with(['token'=> $token]);

        // return response()->json([
        //     'status' => 'success',
        //     'message' => 'User created successfully',
        //     'user' => $user,
        //     'authorisation' => [
        //         'token' => $token,
        //         'type' => 'bearer',
        //     ]
        // ]);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }
}
