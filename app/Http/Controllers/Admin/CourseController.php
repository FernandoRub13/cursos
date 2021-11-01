<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ApprovedCourse;
use App\Mail\RejectCourse;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::where('status', 2)->paginate();
        return view('admin.courses.index', compact('courses'));
    }
    public function show(Course $course){
        $this->authorize('revision', $course);
        return view('admin.courses.show', compact('course'));
    }
    public function approved(Course $course){

        if (!$course->lessons || !$course->goals || !$course->requirements || !$course->image ) {
            return back()->with('info', 'No se puede publicar un curso incompleto');
        }
        $course->status = Course::PUBLICADO; // Se aprueba el curso con el status publicado
        $course->save(); // Se guarda el curso con el status publicado en la base de datos

        $mail = new ApprovedCourse($course); // Se crea una instancia de la clase ApprovedCourse
        Mail::to($course->teacher->email)->queue($mail); // Se envia un correo al usuario que creo el curso

        return redirect()->route('admin.courses.index')->with('info', 'El curso se publicó con éxito' ) ; // Se redirecciona a la ruta de index del administrador 
    }
    public function observation(Course $course){
        return view('admin.courses.observation', compact('course'));
    }
    public function reject(Request $request, Course $course){

        $request->validate([
            'body' => 'required',
        ]);

        $course->observation()->create($request->all()); // Se crea una observación con los datos del formulario

        $course->status = Course::BORRADOR; // Se rechaza el curso con el status borrador
        $course->save(); // Se guarda el curso con el status rechazado en la base de datos

        $mail = new RejectCourse($course); // Se crea una instancia de la clase RejectCourse
        Mail::to($course->teacher->email)->queue($mail); // Se envia un correo al usuario que creo el curso

        return redirect()->route('admin.courses.index')->with('info', 'El curso se rechazó con éxito' ) ; // Se redirecciona a la ruta de index del administrador 
    }

    
}
