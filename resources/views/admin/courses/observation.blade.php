@extends('adminlte::page')

@section('title', 'Administración de Cursos')

@section('content_header')
<h1>Observaciones del curso: {{$course->title}}</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    {!! Form::open(['route'=>['admin.courses.reject', $course]]) !!}
      <div class="form-group">
        {!! Form::label('body', 'Observaciones del curso') !!}
        {!! Form::textarea('body', null) !!}
        @error('body')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      {!! Form::submit('Rechazar curso', ['class'=> 'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="{{asset('js/tinyeditor.js')}}"></script>
<script>
  tinymce.init({
  selector: 'textarea#body',
});
</script>
@stop