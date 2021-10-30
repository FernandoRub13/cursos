@extends('adminlte::page')

@section('title', 'Administración de Cursos')

@section('content_header')
    <h1>Lista de usuarios</h1>
@stop

@section('content')
@if (session('success') )
<div class="alert alert-primary alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    <span class="sr-only">Close</span>
  </button>
  <strong>{{ (session('success')</strong> 
</div>
    
@endif
  @livewire('admin.admin-users')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop