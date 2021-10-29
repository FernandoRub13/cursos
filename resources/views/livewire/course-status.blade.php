<div class="mt-8">
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-8 ">
        <div class="lg:col-span-2">
            <div class="embed-responsive">
                {!!$current->iframe!!}
            </div>
            <h1 class="text-3xl text-gray-600 font-bold mt-4">
                {{$current->name}}
            </h1>
            @if ($current->description)
            <p class="text-gray-600 mt-2">
                {{$current->description->name}}
            </p>

            @endif

            <div class="card">
                <div class="text-gray-500 font-bold grid grid-cols-3 card-body text-center ">
                    @if ($this->previous)
                    <a class="cursor-pointer" wire:click="changeLesson({{$this->previous}})" >Tema anterior</a>
                        
                    @else
                        <div></div>
                    @endif
                    <div wire:click="completed" class=" cursor-pointer block h-full  items-center ">
                            <div class=" h-full cursor-pointer flex items-center" >
                                @if ($current->completed)
                                    <i class="transition-all duration-1000 text-blue-500 ml-auto fas fa-toggle-on text-2xl " ></i>
                                @else
                                    <i class="transition-all duration-1000 transform rotate-180 ml-auto fas fa-toggle-on text-2xl text-gray-600" ></i>
                                @endif
                               <p class="mr-auto text-sm ml-2" >Lección completada</p>
                           </div>
                    </div>
                    @if ($this->next)
                    <a class="cursor-pointer" wire:click="changeLesson({{$this->next}})" >Siguiente tema</a>
                        
                    @else
                        <div></div>
                    @endif
                    
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl leading-8 text-center mb-4" >{{$course->title}}</h1>
                <div class="flex items-center mb-4">
                    <figure>
                        <img class="w-12 h-12 object-cover rounded-full mr-4" src="{{$course->teacher->profile_photo_url}}" alt="">
                    </figure>

                    <div>
                        <p>{{$course->teacher->name}}</p>
                        <a class="text-blue-500 text-sm mb-4" href="">{{'@'. Str::slug($course->teacher->name,'' )}}</a>
                    </div>
                </div>
                <p class="text-gray-600 text-sm mt-2" >{{$this->advance}}% completado</p>
                <div class="relative pt-1">
                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-400">
                      <div style="width:{{$this->advance}}%" class=" transition-all duration-700 shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500"></div>
                    </div>
                  </div>

                <ul>
                    @foreach ($course->sections as $section)
                    <li class="text-gray-600 mb-4 text-base" >
                        <a class="font-bold" href="">{{$section->name}}</a>
                        <ul>
                            @foreach ($section->lessons as $lesson)
                            <li class="flex  " >
                                <div>
                                    <a class="cursor-pointer" wire:click="changeLesson({{$lesson}})">
                                    @if ($lesson->id == $current->id)
                                        @if ($lesson->completed)
                                        <i class="transition-all duration-1000 fas fa-map-marker-alt text-blue-500 mr-1"></i>
                                        @else
                                        <i class="transition-all duration-1000 fas fa-map-marker-alt text-gray-400 mr-1"></i>
                                        @endif  
                                    @else
                                        @if ($lesson->completed)
                                        <span class="transition-all duration-1000 inline-block w-4 h-4 text-blue-500  mr-3 mt-1 " ><i class="fas fa-check-circle"></i></span>
                                        @else
                                        <span class="transition-all duration-1000 inline-block w-4 h-4 bg-gray-400 rounded-full mr-3 mt-1 " ></span>
                                        @endif    
                                    @endif
                                    {{$lesson->name}}
                                    </a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>