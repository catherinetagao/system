<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;
use Spatie\Permission\Traits\HasRoles;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
     
    use HasRoles;
     
    public function register(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        
        $user = new User();
 
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->assignRole('customer');
 
        if($user->save()){
            return response()->json(['message'=>'User created successfully'], 201);
        }else{
            return response()->json(['message'=>'User not created'], 500);
        }
    } 
     
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            $token = $user->createToken('API Token')->plainTextToken;

            return response()->json(['message' => 'Login successful', 'user' => $user, 'api_token' => $token]);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }
    
    public function logout(Request $request)
    {
        $token = PersonalAccessToken::find($request->tokenId);

        if ($token) {
            $token->delete();
            return response()->json(['message' => 'Token revoked successfully']);
        } else {
            return response()->json(['error' => 'Token not found'], 404);
        }
    }
    
}