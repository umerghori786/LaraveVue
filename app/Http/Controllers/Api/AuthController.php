<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * store the specific data in table
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function Register(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string',
            'email'=>'required|string|email|unique:users,email|unique:users,email',
            'password'=>'required',
        ]);

        $user = User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>\Hash::make($data['password'])
        ]);
        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response()->json($response,201);
    }
    /**
     * match the specific data in table
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function Login(Request $request)
    {
        $request->validate([
            'email'=>'required|string|email',
            'password'=>'required|min:8'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !\Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response()->json($response,201);
    }
    /**
     * check auth
     * 
     * @return \Illuminate\http\Response
     */
    public function checkAuth()
    {
        $status = \Auth::check() ? true : false;

        $response = [
            'status' => $status,
        ];
        return response()->json($response,200);
    }
    /**
     * logout user and token delete
     * 
     * return \Illuminate\http\response Json
     */
    public function logout()
    {
        //auth()->user()->tokens()->delete();

        $response = [

            'message' => 'logged out',
        ];

        return response()->json($response);
    }
}
