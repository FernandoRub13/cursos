<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Level;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('instructor.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $prices = Price::pluck('name', 'id');
        $levels = Level::pluck('name', 'id');

        return view('instructor.courses.create', compact( 'categories', 'prices', 'levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:courses',
            'subtitle' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'level_id' => 'required',
            'price_id' => 'required',
            'file' => 'nullable|mimes:jpeg,jpg,png,svg|max:2048',
        ]);

        $course = Course::create($request->all()); //Creamos el usuario

        
        if ($request->file('file')) {
            $url = Storage::put('courses', $request->file('file')  ); // Guarda el archivo en la carpeta cursos y devuelve la url del archivo guardado
            $course->image()->create(['url' => $url]); //Almacenamos la url del curso en la relacion con la tabla images
        }
        
        return redirect()->route('instructor.courses.edit', $course); //Redireccionamos al usuario creado
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('instructor.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $categories = Category::pluck('name', 'id');
        $prices = Price::pluck('name', 'id');
        $levels = Level::pluck('name', 'id');

        return view('instructor.courses.edit', compact('course', 'categories', 'prices', 'levels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:courses,slug,'.$course->id,
            'subtitle' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'level_id' => 'required',
            'price_id' => 'required',
            'file' => 'nullable|mimes:jpeg,jpg,png,svg|max:2048',
        ]);
        $course->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('courses', $request->file('file')  ); // Guarda el archivo en la carpeta cursos y devuelve la url del archivo guardado
            if ($course->image) {
            
                Storage::delete($course->image->url); //Borramos el archivo anterior
                $course->image->update(['url' => $url]); //Actualizamos la url del curso en la relacion con la tabla images
            
            }else{
                $course->image()->create(['url' => $url]); //Almacenamos la url del curso en la relacion con la tabla images
            }
        }

        return redirect()->route('instructor.courses.edit', $course);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
