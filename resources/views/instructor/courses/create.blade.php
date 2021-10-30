<x-app-layout>
  <div class="container py-8 grid grid-cols-5">
    {{-- <aside>
      <h1 class="font-bold text-lg mb-4">Creación del curso</h1>
      <ul class="text-sm text-gray-600">
        <li class="pl-2 leading-7 mb-1 border-l-4 border-indigo-400"><a href="">Información del curso</a></li>
        <li class="pl-2 leading-7 mb-1 border-l-4 border-transparent"><a href="">Lecciones del curso</a></li>
        <li class="pl-2 leading-7 mb-1 border-l-4 border-transparent"><a href="">Metas del curso</a></li>
        <li class="pl-2 leading-7 mb-1 border-l-4 border-transparent"><a href="">Estudiantes del curso</a></li>
      </ul>
    </aside> --}}
    <div class="col-span-4 card">

      <div class="card-body text-gray-600">
        <h1 class="text-2xl font-bold">CREAR NUEVO CURSO</h1>
        <hr class="mt-2 mb-6">

        {!! Form::open( ['route' => ['instructor.courses.store'], 'files' => true, 'autocomplete'=>'off' ]) !!}

        {!! Form::hidden('user_id', auth()->user()->id) !!}
        @include('instructor.courses.partials.form')

        <div class="flex justify-end">
          {!! Form::submit('Crear nuevo curso', ['class' => 'cursor-pointer btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
      </div>

    </div>
  </div>

  <x-slot name="js">
    <script src="{{asset('js/tinyeditor.js')}}"></script>
    <script src="{{asset('js/instructor/courses/form.js')}}"></script>

  </x-slot>
</x-app-layout>