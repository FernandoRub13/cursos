<div class="form-group">
  {!! Form::label('name', 'Nombre') !!}
  {!! Form::text('name', null, ['class'=>'form-control '. ( $errors->has('name') ?  ' is-invalid' : '' ), 'placeholder'=> 'Escribe un nombre']) !!}
  @error('name')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>
<div class="p-2 {{$errors->has('permissions') ?  'border border-danger rounded' : ''}}">
  <strong>Permisos</strong>
  @foreach ($permissions as $permission)
  <div>
    <label  >
      {!! Form::checkbox('permissions[]', $permission->id, null, ['class'=>'mr-1']) !!} {{ $permission->name }}
    </label>
  </div>
  @endforeach
</div>
@error('permissions')
  <small class="text-danger " role="alert">
    <strong>{{ $message }}</strong>
  </small>
@enderror