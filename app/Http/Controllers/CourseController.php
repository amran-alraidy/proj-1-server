<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
     public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','max:50'],
        ]);
 
        $course = new Course;
 
        $course->name = $request->name;
 
        $course->save();
 
        return response()->json([
            "message" => "Inserted Successfuly",
            "data" => $course
        ],201);
    }

     public function getCoursesStudents(){
        $data = Course::with('students')->get();
        return response()->json([
            "data" => $data
        ],200);
    }

    public function getCourseStudents($id){
        $course = Course::find($id);
        return response()->json([
            "name" => $course->name,
            "students" => $course->students
        ],200);
    }
}
