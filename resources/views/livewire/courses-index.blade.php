<div>
    <div class="bg-gray-200 py-4" >
        <div class="container flex" >
        {{-- Button --}}
        {{-- <p>category_id: {{$category_id}}</p>
        <p>level_id: {{$level_id}}</p> --}}
        <button wire:click='resetFilters' class="text-gray-700 bg-white shadow h-12 px-4 rounded-md mr-2" >
            <i class="fab fa-buffer text-md mr-2"></i>
            Borrar filtros
        </button> 
        {{-- Dropdown Categorias --}}
            <div x-data="{ dropdownOpen: false }">
                <div @click.away="dropdownOpen = false" x-on:click="dropdownOpen =! dropdownOpen " class=" mr-2 cursor-pointer relative text-gray-700 bg-white shadow h-12 px-4 rounded-md">
                    <button  class=" flexrelative z-10 block rounded-md w-full bg-white pt-3 focus:outline-none">
                       <i class="fas fa-tags" ></i>
                        Categorías
                        <i class="fas fa-angle-down ml-2"></i>
                    </button>
                    <div x-show="dropdownOpen" class="absolute right-0 w-40 mt-4 bg-white rounded-md shadow-xl z-20">
                        @foreach ($categories as $category)
                        <a wire:click="$set('category_id', {{$category->id}})" class=" cursor-pointer block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-700 hover:text-white">
                           {{$category->name}}
                        </a>
                        @endforeach
                            
                    </div>
                </div>
            </div>
        {{-- Dropdown Niveles --}}
            <div x-data="{ dropdownOpen: false }">
                <div  @click.away="dropdownOpen = false" x-on:click="dropdownOpen =! dropdownOpen " class="cursor-pointer relative text-gray-700 bg-white shadow h-12 px-4 rounded-md">
                    <button  class=" flexrelative z-10 block rounded-md w-full bg-white pt-3 focus:outline-none">
                       <i class="fas fa-tags" ></i>
                        Niveles
                        <i class="fas fa-angle-down ml-2"></i>
                    </button>
                    
                    <div x-show="dropdownOpen" class="absolute right-0 w-36 mt-4 bg-white rounded-md shadow-xl z-20">
                        @foreach ($levels as $level)
                        <a wire:click="$set('level_id', {{$level->id}})" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-700 hover:text-white">
                            {{$level->name}}
                        </a>
                        @endforeach
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Cursos --}}
    <div class="max-w-7xl mx-auto px-4 pt-16 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3  gap-x-6 gap-y-8" >
        @foreach ($courses as $course)
            <x-course-card :course="$course" />
        @endforeach
        </div >
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 " >
        {{$courses->links()}}
    </div>
</div>
