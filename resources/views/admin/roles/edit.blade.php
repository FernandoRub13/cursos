@extends('adminlte::page')

@section('title', 'Administración de Cursos')

@section('content_header')
    <h1>Editar rol</h1>
@stop

@section('content')
@if (session('success'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    <span class="sr-only">Close</span>
  </button>
  <strong>{{ session('success') }}</strong> 
</div>
    
@endif
<div class="card">
  <div class="card-body">
    {!!Form::model($role,['route'=> ['admin.roles.update', $role], 'method' => 'put']) !!}
    @include('admin.roles.partials.form')
    <div class="form-group">
      {!! Form::submit('Actualizar rol', ['class'=>'btn mt-2 btn-primary']) !!}
    </div>
    {!!Form::close() !!}
  </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop