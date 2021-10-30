
@extends('adminlte::page')

@section('title', 'Administración de Cursos')

@section('content_header')
    <h1>Lista de roles</h1>
@stop

@section('content')
  @if (session('success') || session('success-delete'))
  <div class="alert alert-{{(session('success') ? 'success' : 'danger' )}} alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      <span class="sr-only">Close</span>
    </button>
    <strong>{{ (session('success') ? session('success') : session('success-delete')) }}</strong> 
  </div>
      
  @endif

    <div class="card">
      <div class="card-header">
        <a class="btn btn-success" href="{{route('admin.roles.create')}}">Crear nuevo rol</a>
      </div>
      <div class="card-body">
        <table class="table table-striped" >
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th colspan="2" ></th>
            </tr>
          </thead>
          <tbody>
            @forelse ($roles as $role)
                <tr>
                  <td>{{ $role->id }}</td>
                  <td>{{ $role->name }}</td>
                  <td width="10px" >
                    <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-sm btn-primary">Editar</a>
                  </td>
                  <td width="10px" >
                    <form action="{{route('admin.roles.destroy', $role)}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                  </td>
                </tr>
            @empty
                <tr>
                  <td colspan="4" class="text-center">No hay roles registrados</td>
                </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop