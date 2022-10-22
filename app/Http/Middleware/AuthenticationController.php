<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;

class AuthenticationController
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 200);
        }

        try {
            if(! $token = JWTAuth::attempt($credentials)){
                return response()->json([
                    'success' => false,
                    'message' => 'login credentials are invalid',
                ], 400);

            }
        } catch (JWTException $e) {
            return $credentials;
            return response()->json([
                'success' => false,
                'message' => 'could not create token',
            ], 500);
        }
        return response()->json([
            'success' => true,
            'code' => 1,
            'user_details' => $credentials['email'],
            'id' => Auth::id(),
            'token' => $token
        ]);
    }
    public function register(Request $request)
    {
        # code...
        $data = $request->only('first_name', 'last_name', 'email', 'password');
        $validator = Validator::make($data, [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 200);
        }

        $user = User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'user_type' => 2,
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        if ($user) {
            return response()->json([
                'success' => true,
                'code' => 1,
                'message' => 'user created successful',
                'data' => $user
            ], Response::HTTP_OK);
        }
    }
    public function logout()
    {
        # code...
    }
}
