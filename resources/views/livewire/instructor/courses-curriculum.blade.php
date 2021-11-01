<div>
 
  <h1 class="text-2xl font-bold">LECCIONES DEL CURSO</h1>

  <hr class="mt-2 mb-6">
  {{-- {{$section}} Para saber el registro actual de la sección --}}
  @foreach ($course->sections as $item)
  <article class="card mb-6" x-data="{open:true}" >
    <div class="card-body bg-gray-100">
      @if ($section->id == $item->id)
      <form wire:submit.prevent='update'>
        <input wire:model='section.name' class="appearance-none border-2 border-gray-200 rounded
             w-full p-2" placeholder="Ingrese el nombre de la sección">
        @error('section.name')
        <span class="font-bold text-xs text-red-500">{{$message}}</span>
        @enderror
      </form>
      @else
      <header class="flex justify-between items-center">
        <h2 x-on:click="open =!open" class="cursor-pointer">Sección: {{$item->name}}</h2>
        <div>
          <i wire:click='edit({{$item}})' class="cursor-pointer text-blue-500 fas fa-edit"></i>
          <i wire:click='destroy({{$item}})' class="cursor-pointer text-red-500 fas ml-4 fa-eraser"></i>
        </div>
      </header>
      <div x-show="open" >
        @livewire('instructor.courses-lesson', ['section' => $item], key($item->id))
      </div>
      @endif
    </div>
  </article>
  @endforeach
  <div x-data="{open: false}">
    <a x-on:click="open = true" x-show="!open" class="flex items-center cursor-pointer">
      <i class="text-2xl far fa-plus-square mr-2 text-green-700 "></i>
      Agregar nueva sección
    </a>
    <article class="card" x-show="open">
      <div class="card-body bg-gray-100">
        <h2 class="text-xl font-bold">Agregar nueva sección</h2>
        <div>
          <input wire:model="name" class="appearance-none border-2 border-gray-200 rounded
        w-full p-2 my-2" placeholder="Ingrese el nombre de la sección">
          @error('name')
          <span class="font-bold text-xs text-red-500">{{$message}}</span>
          @enderror
        </div>
        <div class="flex justify-end">
          <button wire:click="store" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            Agregar
          </button>
        </div>
    </article>
  </div>

</div>