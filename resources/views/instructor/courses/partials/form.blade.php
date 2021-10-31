<div class="mb-4">
  {!! Form::label('title', 'Título del curso') !!}
  {!! Form::text('title', null, ['class'=>'appearance-none border-2 border-gray-200 rounded block w-full
  mt-1'.($errors->has('title') ? ' border-red-600' : '')])!!}
  @error('title')
  <strong class="text-sm text-red-600">{{ $message }}</strong>
  @enderror
</div>
<div class="mb-4">
  {!! Form::label('slug', 'Slug del curso') !!}
  {!! Form::text('slug', null, ['readonly' => 'readonly','class'=>'appearance-none text-gray-400 border-2
  border-gray-200 rounded block w-full
  mt-1'.($errors->has('slug') ? ' border-red-600' : '')])!!}
  @error('slug')
  <strong class="text-sm text-red-600">{{ $message }}</strong>
  @enderror
</div>
<div class="mb-4">
  {!! Form::label('subtitle', 'Subtitulo del curso') !!}
  {!! Form::text('subtitle', null, ['class'=>'appearance-none border-2 border-gray-200 rounded block
  w-fullmt-1'.($errors->has('subtitle') ? ' border-red-600' : '')]) !!}
  @error('subtitle')
  <strong class="text-sm text-red-600">{{ $message }}</strong>
  @enderror
</div>
<div class="mb-4">
  {!! Form::label('description', 'Descripción del curso') !!}
  <div class="appearance-none border-2 border-gray-100 rounded
  blockw-full  {{($errors->has('description') ? ' border-red-600' : '')}}">

    {!! Form::textarea('description', null, ['class'=>'appearance-none border-2 border-gray-200 rounded
    blockw-full mt-1']) !!}
  </div>
  @error('description')
  <strong class="text-sm text-red-600">{{ $message }}</strong>
  @enderror
</div>
<div class="grid grid-cols-3 gap-4">
  <div>
    {!! Form::label('category_id', 'Categoría') !!}
    {!! Form::select('category_id', $categories, null, ['class'=>'appearance-none border-2 border-gray-200
    rounded
    w-full mt-1']) !!}
    @error('category_id')
    <strong class="text-sm text-red-600">{{ $message }}</strong>
    @enderror
  </div>
  <div>
    {!! Form::label('level_id', 'Niveles') !!}
    {!! Form::select('level_id', $levels, null, ['class'=>'appearance-none border-2 border-gray-200 rounded
    w-full mt-1']) !!}
    @error('level_id')
    <strong class="text-sm text-red-600">{{ $message }}</strong>
    @enderror

  </div>
  <div>
    {!! Form::label('price_id', 'Precio') !!}
    {!! Form::select('price_id', $prices, null, ['class'=>'appearance-none border-2 border-gray-200 rounded
    w-full mt-1']) !!}
    @error('prices_id')
    <strong class="text-sm text-red-600">{{ $message }}</strong>
    @enderror

  </div>
</div>

<h1 class="text-2xl font-bold mt-8 mb-2">Imagen del curso</h1>


<div class="grid grid-cols-2 gap-4">
  <figure>
    @isset($course->image)
    <img id="picture" src="{{Storage::url($course->image->url)}}"
      class="rounded w-full h-64 object-center object-cover " alt="">
    @else
    <img id="picture"
      src="https://images.pexels.com/photos/5905522/pexels-photo-5905522.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260"
      class="rounded w-full h-64 object-center object-cover " alt="">
    @endisset
  </figure>
  <div>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At ratione voluptatibus doloribus in non
      pariatur maiores impedit recusandae nemo sunt nam quisquam quos explicabo nihil mollitia, veniam animi
      error alias!</p>

      {!! Form::file('file', ['class' => 'appearance-none border-2 border-gray-200 rounded
      w-full mt-1'.($errors->has('file') ? ' border-red-600' : ''), 'id' => 'file', 'accept' => 'image/*']) !!}

    @error('file')
    <strong class="text-sm text-red-600">{{ $message }}</strong>
    @enderror
  </div>
  
</div>
