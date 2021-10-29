<x-app-layout>
  <section class="bg-gray-700 py-12 mb-12 shadow-lg " >
    <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6 ">
      <figure>
        <img class="h-60 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="">
      </figure>
      <div class="text-white" >
        <h1 class="text-4xl" >
          {{$course->title}}
        </h1>
        <h2 class="text-xl mb-3" >
          {{$course->subtitle}}
          <p class="mb-2" > <i class="fas fa-chart-line" > </i> Nivel: {{$course->level->name }}</p>
          <p class="mb-2" > <i class="fas fa-tag" > </i> Categoría: {{$course->category->name}} </p>
          <p class="mb-2" > <i class="fas fa-users" > </i> Matriculados: {{$course->students_count}} </p>
          <p > <i class="fas fa-star" > </i> Calificación: {{$course->rating}} </p>
        </h2>
      </div>
    </div>
  </section>
  <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6" >
    <div class="order-2 lg:col-span-2 lg:order-1" >
      <section class="card mb-12" >
        <div class="card-body" >
          <h1 class="font-bold text-2xl mb-2" >Lo que aprenderas</h1>
          <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2" >
            @foreach ($course->goals as &$goal)
            <li class="text-gray-700 mb-2" ><i class="fas fa-check text-gray-600" ></i> {{$goal->name}} </li>
            
            @endforeach
          </ul>
        </div>
      </section>
      <section class="mb-12" >
        <h1 class="font-bold text-2xl mb-2" >Temario</h1>
        @foreach ($course->sections as $section)
            <article  class="mb-4 shadow-lg " 
            @if ($loop->first)
              x-data="{ open:true }"
              @else
              x-data="{ open:false }"
            @endif
            >
              <header x-on:click="open = !open" class="border border-gray-200 px-4 py-2 cursor-pointer bg-gray-200" >
                <h1 class="font-bold text-lg text-gray-600" >{{$section->name}}</h1>
              </header>
              <div x-show="open" class="bg-white py-2 px-4" >
                <ul class="grid grid-cols-1 gap-2" >
                  @foreach ($section->lessons as $lesson)
                      <li class=" text-gray-700 text-base"  >  <a href="" class="text-gray-600" ><i class="fas fa-play-circle mr-2 text-gray-600" ></i> {{$lesson->name}} </a> </li>
                  @endforeach
                </ul>
              </div>
            </article>
        @endforeach
      </section>
      <section class="mb-12" >
        <div class="card" >
          <div class="card-body" >
            <h1 class="font-bold text-2xl mb-2" >Requisitos</h1>
        <ul class="list-disc list-inside" >
          @foreach ($course->requirements as $requirement)
            <li class="text-gray-700 mb-2" >{{$requirement->name}} </li>
              
          @endforeach
        </ul>
          </div>
      </section>
      <section class="font-bold ">
        <div class="card" >
          <div class="card-body" >
            <h1 class="font-bold text-2xl mb-2" >Descripción</h1>
            <p class="text-gray-700  " >{{$course->description}}</p>
          </div>
      </section>
    </div>
    <div class="order-1 lg:order-2" >
      <section class="card mb-6" >
        <div class="card-body" >
          <div class="flex items-center">
            {{-- {{$course->teacher->profile_photo_url}} Manda a llamar a la api: https://ui-avatars.com/api/?name=Fernando+Rubio+Bailon&color=7F9CF5&background=EBF4FF --}}
            <img class="h12 w-12 object-cover rounded-full shadow-lg" src="{{$course->teacher->profile_photo_url}}" alt="{{$course->teacher->name}}">
            <div class="ml-4" >
              <h1 class="font-bold text-gray-500 text-lg" >Prof. {{$course->teacher->name}}</h1>
              <a class="text-blue-400 text-sm font-bold" href="">{{'@'.Str::slug($course->teacher->name, '')}}</a>
            </div>
          </div>
          @can('enrolled', $course)
          <a href="{{route('courses.status', $course)}}" class="btn btn-primary mt-4  block text-center w-full " >Reanudar el curso</a>
          @else
          
          <form method="POST" action="{{route('courses.enrolled', $course )}}">
            @csrf
            <button type="submit"  class="btn btn-danger mt-4  block text-center w-full " >Inscribirse al curso</button>
          </form>
              
          @endcan
        </div>
      </section>
      <aside class="hidden lg:block" >
        <h1 class="font-bold text-2xl mb-2" >Otros cursos</h1>
        @foreach ($similarCourses as $similar)
        <article class="flex mb-6 hover:bg-gray-200 rounded" >
          <a href="{{route('courses.show', $similar)}}" class="flex " >
            <img class="h-32 w-40 object-cover" src="{{ Storage::url($similar->image->url) }}" alt="">
            <div>
              <h1 class="ml-4 text-gray-700 text-lg font-bold" >{{Str::limit($similar->title, 40)}}</h1>
             <div class="flex items-center" >
              <img class="ml-4  h-8 w-8 inline object-cover rounded-full shadow-lg" src="{{$similar->teacher->profile_photo_url}}" alt="{{$similar->teacher->name}}">  
              <p class="text-gray-700 text-sm ml-2" >{{$similar->teacher->name }}</p>
             </div>
             <div class="flex justify-end pr-5" >
                <p class="text-sm " ><i class="fas fa-star mr-2 text-yellow-300 " ></i>{{$similar->rating}}</p>
             </div>
            </div>  
          </a>
        </article>
            
        @endforeach
      </aside>
    </div>
  </div>
</x-app-layout>