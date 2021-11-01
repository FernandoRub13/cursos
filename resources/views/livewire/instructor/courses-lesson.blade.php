<div>
  @foreach ($section->lessons as $item)
  <article x-data="{open: false}" class="card mt-4">
    <div class="card-body">
      @if ($lesson->id == $item->id)
        <form wire:submit.prevent='update'>
          <div class="flex itmes-center">
            <label class="w-32">Nombre</label>
            <input class="appearance-none border-2 border-gray-200 roundedw-full p-1 w-full " wire:model="lesson.name">
          </div>
          @error('lesson.name')
          <span class="font-bold text-xs text-red-500">{{$message}}</span>
          @enderror
          <div class="flex items-center mt-4">
            <label class="w-32">Plataforma</label>
            <select class="appearance-none border-2 border-gray-200 roundedw-full p-1 w-full"
              wire:model="lesson.platform_id">
              @foreach ($platforms as $item)
              <option value="{{$item->id}}">{{$item->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="flex itmes-center mt-2">
            <label class="w-32">URL</label>
            <input class="appearance-none border-2 border-gray-200 roundedw-full p-1 w-full " wire:model="lesson.url">
          </div>
          @error('lesson.url')
          <span class="font-bold text-xs text-red-500">{{$message}}</span>
          @enderror
          <div class="mt-4 flex justify-end">
            <button wire:click="cancel" class="btn btn-danger">Cancelar</button>
            <button wire:click="update" class="btn btn-primary">Actualizar</button>
          </div>
        </form>
      @else
      <header>
        <h1 class="cursor-pointer" x-on:click="open=!open" ><i class="far fa-play-circle text-blue-500 mr-1"></i> Lección: {{$item->name}}</h1>
      </header>
      <div x-show="open" >
        <hr class="my-2">
        <p class="text-sm">Plataforma: {{$item->platform->name}}</p>
        <p class="text-sm">Enlace: <a class="text-blue-600" href="$item->url" target="_blank">{{$item->url}}</a>
        </p>
        <div class="my-2">
          <button type="button" wire:click="edit({{$item}})" class="btn btn-primary text-sm">Editar</button>
          <button type="submit" wire:click="destroy({{$item}})" class="btn btn-danger text-sm">Eliminar</button>
        </div>
        <div class="mb-4" >
          @livewire('instructor.lesson-description', ['lesson' => $item], key('lesson-description'.$item->id))
        </div>
        <div>
          @livewire('instructor.lesson-resources', ['lesson' => $item], key('lesson-resources'.$item->id))
        </div>

      </div>
      @endif
    </div>
  </article>
  @endforeach
  <div class="mt-4" x-data="{open: false}">
    <a x-on:click="open = true" x-show="!open" class="flex items-center cursor-pointer">
      <i class="text-2xl far fa-plus-square mr-2 text-green-700 "></i>
      Agregar nueva lección
    </a>
    <article class="card" x-show="open">
      <div class="card-body">
        <h2 class="text-xl font-bold">Agregar nueva lección</h2>
        <div>
          <div class="flex itmes-center"> 
            <label class="w-32">Nombre</label>
            <input class="appearance-none border-2 border-gray-200 roundedw-full p-1 w-full " wire:model="name">
          </div>
          @error('name')
          <span class="font-bold text-xs text-red-500">{{$message}}</span>
          @enderror
          <div class="flex items-center mt-4">
            <label class="w-32">Plataforma</label>
            <select class="appearance-none border-2 border-gray-200 roundedw-full p-1 w-full" wire:model="platform_id">
              @foreach ($platforms as $item)
              <option value="{{$item->id}}">{{$item->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="flex itmes-center mt-2">
            <label class="w-32">URL</label>
            <input class="appearance-none border-2 border-gray-200 roundedw-full p-1 w-full " wire:model="url">
          </div>
          @error('url')
          <span class="font-bold text-xs text-red-500">{{$message}}</span>
          @enderror
          <div class="mt-4 flex justify-end">
            <button x-on:click="open = false" class="btn btn-danger mr-2">Cancelar</button>
            <button wire:click="store" class="btn btn-primary">Agregar</button>
          </div>
        </div>
    </article>
  </div>
</div>