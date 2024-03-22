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
    public function dashboard()
    {
        $user = auth()->user()->id;
        $today = date('Y-m-d');
        $data = Attendance::where('created_at', $today)->get();

        // dd($data);

        return view('dashboard.index', [
            'users' => count(User::where('role', false)->get())
        ]);
    }

    public function employee()
    {
        return view('employee.index', [
            'users' => User::where('role', false)->get(),
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
