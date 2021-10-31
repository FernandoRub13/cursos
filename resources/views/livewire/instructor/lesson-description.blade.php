<div>
    <article class="card" x-data="{open:false}" >
        <div class="card-body bg-gray-100" >
            <header>
                <h1 x-on:click="open=!open" class="cursor-pointer mb-2" > Descripción de la lección</h1>
            </header>
            <div x-show="open" >
                @if ($lesson->description)
                <form wire:submit.prevent='update' >
                    <textarea wire:model="description.name" class="appearance-none border-2 border-gray-200 roundedw-full p-1 w-full " ></textarea>
                    @error('description.name')
                        <span class="text-sm text-red-500">{{$message}}</span>
                    @enderror
                    <div class="flex justify-end" >
                        <button wire:click="destroy" type="button" class="btn btn-danger text-sm">Eliminar</button>
                        <button type="submit" class="btn btn-primary text-sm">Actualizar</button>
                    </div>
                </form>
                @else
                <div  >
                    <textarea wire:model="name" placeholder="Escribe una descripción de la lección" class="appearance-none border-2 border-gray-200 roundedw-full p-1 w-full " ></textarea>
                    @error('name')
                        <span class="text-sm text-red-500">{{$message}}</span>
                    @enderror
                    <div class="flex justify-end" >
                    <button wire:click="store" class="btn btn-primary text-sm">Agregar</button>
                    </div>
                </div>

                    
                @endif
            </div>
        </div>
    </article>
</div>
