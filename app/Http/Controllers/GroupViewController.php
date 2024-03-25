<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Shift;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GroupViewController extends Controller
{
    //

    public function login()
    {
        return view('auth/login');
    }


   public function profile(){
    return view('profile.profile',[
            'shifts' => Shift::all(),

    ]);
   }

    public function dashboard()
    {
        $user = auth()->user()->attendances;
        $data = Attendance::whereDay('created_at', now()->day)->get();
        // $data1 = collect($user)->filter(function($s){
        //    return where('created_at', now()->day)->get()
        // });

        //  dd($data);

        return view('dashboard.index', [
            'users' => count(User::where('role', false)->get()),
        ]);
    }

    public function employee()
    {
        return view('employee.index', [
            'users' => User::where('role', false)->get(),
        ]);
    }

    public function employeeCreate()
    {
        return view('employee.create', [
            'shifts' => Shift::all(),
        ]);
    }

    public function employeeShow(User $user)
    {
        return view('employee.show', [
            'user' => $user,
            'attendance' => $user->with('attendances')->get(),
            'shifts' => Shift::all(),
        ]);
    }

    public function shift()
    {
        return view('attendance.shift.index', [
            'shifts' => Shift::all(),
        ]);
    }

    public function attendance()
    {
        return view('attendance.report.index', [
            'attendances' => Attendance::all(),
        ]);
    }
}
