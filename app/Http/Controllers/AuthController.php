<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\HasApiTokens;

class AuthController extends Controller
{
    use HasApiTokens, HasFactory, Notifiable;

    public function register(StoreUserRequest $request)
    {

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'nrp' => $request->nrp,
            'role' => $request->role ?? false,
            'image' => $request->image,
            'department' => $request->department,
            'position' => $request->position,
            'shift_id' => $request->shift_id,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;
        return response()
            ->json([
                'status' => 'success',
                'data' => $user,
                'access_token' => $token,
                'token_type' => 'Bearer',
            ], 200);
    }

    public function user()
    {
        try {
            $allUser = User::all();
            return response()->json([
                'status' => 'success',
                'data' => $allUser,
            ], 200);
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function login(Request $request)
    {
        try {
            if (!Auth::attempt($request->only('username', 'password'))) {
                return response()->json([
                    'message' => 'Unauthorized'
                ], 401);
            }

            $user = User::where('username', $request->username)->firstOrFail();

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'message' => 'Login success',
                'access_token' => $token,
                'token_type' => 'Bearer'
            ]);
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function profile()
    {
        try {
            $me = auth()->user();
            $find = User::find($me->id);
            $token = $find->tokens;
            return response()->json([
                'status' => 'success',
                'data' => $me,
                'token' => $token,
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'token expired',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function logout()
    {
        try {
            // dd(auth()->user());
            auth()->user()->tokens()->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'You have successfully logged out and the token was successfully deleted'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'erorr' => $th->getMessage(),
            ]);
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'You have successfully delete user ' . $user->name
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'erorr' => $th->getMessage(),
            ]);
        }
    }
}
