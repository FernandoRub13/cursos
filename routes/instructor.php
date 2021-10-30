<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
// use App\Http\Livewire\InstructorCourse;
use App\Http\Controllers\Instructor\CourseController;

Route::redirect('', '/instructor/courses');

// Route::get('courses', InstructorCourse::class )->middleware('can:Leer cursos')->name('courses.index');

Route::resource('courses', CourseController::class)->names('courses');