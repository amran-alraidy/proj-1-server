<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
     public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','max:50'],
            'phone' => ['string']
        ]);
 
        $student = new Student;
 
        $student->name = $request->name;
        $student->phone = $request->phone;
 
        $student->save();
 
        return response()->json([
            "message" => "Inserted Successfuly",
            "data" => $student
        ],201);
    }

    public function enroll(Request $request, $id){
        $student = Student::find($id);
        $student->courses()->attach($request->course_id);

        return response()->json([
            "message" => "Enrollment Successfuly",
        ],201);

    }

    public function unEnroll(Request $request, $id){
        $student = Student::find($id);
        $student->courses()->detach($request->course_id);

        return response()->json([
            "message" => "UnEnrollment Successfuly",
        ],201);

    }

    public function getStudentsCourses(){
        $data = Student::with('courses')->get();
        return response()->json([
            "data" => $data
        ],200);
    }

    public function getStudentCourses($id){
        $student = Student::find($id);
        return response()->json([
            "name" => $student->name,
            "courses" => $student->courses
        ],200);
    }


}
