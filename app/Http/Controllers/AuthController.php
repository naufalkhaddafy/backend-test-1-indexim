<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\HasApiTokens;

class AuthController extends Controller
{
    use HasFactory, Notifiable;


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
        return redirect()->route('employee')->with('success', 'Berhasil Menambahkan Data Karyawan ' . $request->name);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'nrp' => $request->nrp,
            'role' => $request->role ?? false,
            'image' => $request->image,
            'department' => $request->department,
            'position' => $request->position,
            'shift_id' => $request->shift_id,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->back()->with('success', 'Berhasil Mengubah Data Pribadi ' . $request->name);
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return response()->json([
                'status' => 'success',
                'data' => $user
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
            ]);
        }
    }

    public function LoginWeb(Request $request)
    {
        $validatelogin = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username Harus di Isi',
            'password.required' => 'Password harus di Isi',
        ]);
        if (Auth::attempt($validatelogin)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        return back()->with('gagal', 'Periksa Kembali Username dan Password');
    }
    
    // Logout user
    public function logoutWeb(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
        // Auth::logout();
    }
}
