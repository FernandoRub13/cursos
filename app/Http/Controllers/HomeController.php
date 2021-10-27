<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $courses = Course::where('status', '3')->latest('id')->get()->take(12);

        // return $course; Retorna un JSON
        return view('welcome', compact('courses'));
    }
}
