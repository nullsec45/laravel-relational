<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index(){
        $courses=Course::all();
        return view("course.index", compact("courses"));
    }

    public function join($id){
        $course=Course::find($id);
        $user=Auth::user();
        // toggle memeriksa, jika tidak ada maka attach, tidak ada detach
        $user->courses()->toggle($id);

        return redirect("/course");
    }
}
