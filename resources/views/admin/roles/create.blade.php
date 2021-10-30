@extends('adminlte::page')

@section('title', 'Administración de Cursos')

@section('content_header')
<h1>Crear nuevo rol</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    {!!Form::open(['route'=> 'admin.roles.store']) !!}
    @include('admin.roles.partials.form')
    <div class="form-group">
      {!! Form::submit('Crear rol', ['class'=>'btn mt-2 btn-success']) !!}
    </div>
    {!!Form::close() !!}
  </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
  console.log('Hi!'); 
</script>
@stop