<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AuthController;





Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/greeting', function () {
    return 'Hello World';
});

Route::get('/welcome',[TaskController::class,'welcome']);

Route::get('/check/{n}',[TaskController::class,'isEven']);

Route::get('/hello/{name}',[TaskController::class,'sayhello']);

Route::get('/getuser',[TaskController::class,'getUser']);

Route::get('/gettasks',[TaskController::class,'index']);

Route::get('/gettask/{id}',[TaskController::class,'show']);

Route::post('/store/task',[TaskController::class,'store']);

Route::patch('/update/{id}',[TaskController::class,'update']);

Route::delete('/delete/{id}',[TaskController::class,'destroy']);

Route::get('/task/{id}/user',[TaskController::class,'getTaskUser']);


// CRUD Operations (Create, Read, Update, Delete)

// CardController 

Route::post('/store/card',[CardController::class,'store']);

Route::get('/card/{id}/user',[CardController::class,'getCardUser']);


// UserController 

Route::get('/user/{id}/card',[UserController::class,'getUserCard']);
Route::get('/user/{id}/tasks',[UserController::class,'getUserTasks']);

// Sudent
Route::post('/student/store',[StudentController::class,'store']);
Route::post('/student/{id}/enroll',[StudentController::class,'enroll']);
Route::post('/student/{id}/unenroll',[StudentController::class,'unEnroll']);
Route::get('/students/courses',[StudentController::class,'getStudentsCourses']);
Route::get('/student/{id}/courses',[StudentController::class,'getStudentCourses']);




// Course
Route::post('/course/store',[CourseController::class,'store']);

// AuthController
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth:sanctum');




