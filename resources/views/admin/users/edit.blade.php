@extends('adminlte::page')

@section('title', 'Administración de Cursos')

@section('content_header')
    <h1>Administración de Cursos</h1>
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
        <h1 class="h5" >Nombre:  </h1>
        <p class="form-control" >{{$user->name}}</p>
        <h1 class="h5" >Lista de roles</h1>
        {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
        <div class="form-group">

            @foreach($roles as $role)
              <div>
                <label>
                  {!! Form::checkbox('roles[]', $role->id, null, ['class'=>'mr-1']) !!}
                  {{ $role->name }}
                </label>
              </div>
            @endforeach

        </div>
        {!! Form::submit('Actualizar roles', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
      </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop