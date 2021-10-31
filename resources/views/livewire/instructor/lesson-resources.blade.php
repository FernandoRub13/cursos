<div  class="card" x-data="{open:false}" >
    <div class="card-body bg-gray-100">
        <header>
            <h1 x-on:click="open=!open" class="mb-2 cursor-pointer " >Recursos de la lección</h1>
        </header>
        <div x-show="open" >
            @if ($lesson->resource)
                <div class="flex justify-between items-center" >
                    <p><i wire:click="download" class="fas fa-download text-gray-500 mr-2 cursor-pointer"></i> {{$lesson->resource->url}}</p>
                    <i wire:click="destroy" class="fas fa-trash text-red-500 cursor-pointer"></i>
                </div>
            @else
                <form wire:submit.prevent='save'>
                    <div class="flex items-center" >
                        <input wire:model="file" class="appearance-none border-2 border-gray-200 roundedw-full p-1 flex-1 mr-2" type="file">
                        <button class="btn btn-primary text-sm" type="submit">Guardar</button>
                    </div>
                    <div class="text-blue-500 font-bold mt-1" wire:loading wire:target='file' >
                        Cargando...
                    </div>
                    @error('file')
                        <div class="text-red-500 text-xs mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </form>
            @endif
        </div>
    </div>
</div  >
