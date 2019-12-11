<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = [];
        $teachers = Teacher::with('user')->get();
        return view('teacher', compact('teachers'));
    }

    public function store(Request $request)
    {
        $teacher = new Teacher;
        $teacher->user_id = Auth::user()->id;
        $teacher->sunday = date("Y-m-d H:i:s", strtotime("$request->sunday +0 day"));
        $teacher->monday = date("Y-m-d H:i:s", strtotime("$request->monday +1 day"));
        $teacher->tuesday = date("Y-m-d H:i:s", strtotime("$request->tuesday +2 day"));
        $teacher->wednesday = date("Y-m-d H:i:s", strtotime("$request->wednesday +3 day"));
        $teacher->thursday =  date("Y-m-d H:i:s", strtotime("$request->thursday +4 day"));
        $teacher->friday = date("Y-m-d H:i:s", strtotime("$request->friday +5 day"));
        // return $teacher;
        $teacher->save();
        return back();
    }

    public function combine($day, $time)
    {
        $sunday =  date('Y-m-d', strtotime("last $day", strtotime(Carbon::parse($time))));
        $combinedDT = date('Y-m-d H:i:s', strtotime("$sunday $time"));
        return $combinedDT;
    }
}
