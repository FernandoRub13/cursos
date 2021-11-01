<x-instructor-layout :course="$course" >

  <h1 class="text-2xl font-bold" >INFORMACIÓN DEL CURSO</h1>
  <hr class="mt-2 mb-6">

  {!! Form::model($course, ['route' => ['instructor.courses.update', $course], 'method' => 'put', 'files' =>
  true,'autocomplete'=>'off' ]) !!}

  @include('instructor.courses.partials.form')

  <div class="flex justify-end">
    {!! Form::submit('Actualizar información', ['class' => 'cursor-pointer btn btn-primary']) !!}
  </div>



  {!! Form::close() !!}
  <x-slot name="js">
    <script src="{{asset('js/tinyeditor.js')}}"></script>
    <script src="{{asset('js/instructor/courses/form.js')}}"></script>

  </x-slot>
</x-instructor-layout>