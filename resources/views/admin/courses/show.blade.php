<x-app-layout>

  {{-- Información pricipal del curso --}}
  <section class="bg-gray-700 py-12 mb-12 shadow-lg ">
    <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6 ">
      <figure>
        @if ($course->image)
        <img class="h-60 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="">
        @else
        <img class="h-60 w-full object-cover"
          src="https://images.pexels.com/photos/5905522/pexels-photo-5905522.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260"
          alt="">
        @endif
      </figure>
      <div class="text-white">
        <h1 class="text-4xl">
          {{$course->title}}
        </h1>
        <h2 class="text-xl mb-3">
          {{$course->subtitle}}
          <p class="mb-2"> <i class="fas fa-chart-line"> </i> Nivel: {{$course->level->name }}</p>
          <p class="mb-2"> <i class="fas fa-tag"> </i> Categoría: {{$course->category->name}} </p>
          <p class="mb-2"> <i class="fas fa-users"> </i> Matriculados: {{$course->students_count}} </p>
          <p> <i class="fas fa-star"> </i> Calificación: {{$course->rating}} </p>
        </h2>
      </div>
    </div>
  </section>

  {{-- Secciones: Metas: Lo que aprenderas, temario, requisitos y descripción --}}
  <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6">

    @if (session('info'))
    <div class="lg:col-span-3" x-data="{open: true}" x-show="open" >
      <div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
        <div class="flex justify-between">
          <div class="flex" >
            <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20">
                <path
                  d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
              </svg></div>
            <div>
              <p class="font-bold">{{ session('info') }}</p>
            </div>
          </div>
          {{-- A svg to close the alert --}}
          <div x-on:click="open = false" class=" cursor-pointer py-1"><svg class="fill-current h-6 w-6 text-red-900" xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20">
              <path
                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
            </svg></div>
        </div>
      </div>
    </div>
    @endif
    <div class="order-2 lg:col-span-2 lg:order-1">
      {{-- Metas: Lo que aprenderas --}}
      <section class="card mb-12">
        <div class="card-body">
          <h1 class="font-bold text-2xl mb-2">Lo que aprenderas</h1>
          <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
            @forelse ($course->goals as $goal)
            <li class="text-gray-700 mb-2"><i class="fas fa-check text-gray-600"></i> {{$goal->name}} </li>
            @empty
            <li class="text-gray-700 mb-2">Este curso no tiene asignado ningúna meta.</li>
            @endforelse
          </ul>
        </div>
      </section>
      {{-- Temario --}}
      <section class="mb-12">
        <h1 class="font-bold text-2xl mb-2">Temario</h1>
        @forelse ($course->sections as $section)
        <article class="mb-4 shadow-lg " @if ($loop->first)
          x-data="{ open:true }"
          @else
          x-data="{ open:false }"
          @endif
          >
          <header x-on:click="open = !open" class="border border-gray-200 px-4 py-2 cursor-pointer bg-gray-200">
            <h1 class="font-bold text-lg text-gray-600">{{$section->name}}</h1>
          </header>
          <div x-show="open" class="bg-white py-2 px-4">
            <ul class="grid grid-cols-1 gap-2">
              @foreach ($section->lessons as $lesson)
              <li class=" text-gray-700 text-base"> <a href="" class="text-gray-600"><i
                    class="fas fa-play-circle mr-2 text-gray-600"></i> {{$lesson->name}} </a> </li>
              @endforeach
            </ul>
          </div>
        </article>
        @empty
        <article class="card">
          <div class="card-body">
            <p class="text-gray-700">Este curso no tiene asignado ninguna sección.</p>
          </div>
        </article>
        @endforelse
      </section>
      {{-- Requisitos --}}
      <section class="mb-12">
        <div class="card">
          <div class="card-body">
            <h1 class="font-bold text-2xl mb-2">Requisitos</h1>
            <ul class="list-disc list-inside">
              @forelse ($course->requirements as $requirement)
              <li class="text-gray-700 mb-2">{{$requirement->name}} </li>
              @empty
              <li class="text-gray-700 mb-2">Este curso no tiene ningún requisito</li>
              @endforelse
            </ul>
          </div>
      </section>
      {{-- Descripción --}}
      <section class="font-bold ">
        <div class="card">
          <div class="card-body">
            <h1 class="font-bold text-2xl mb-2">Descripción</h1>
            <p class="text-gray-700  ">{!!$course->description!!}</p>
          </div>
      </section>
    </div>
    {{-- Sidebar para aprobar el curso al curso --}}
    <div class="order-1 lg:order-2">
      <section class="card mb-6">
        <div class="card-body">
          <div class="flex items-center">
            {{-- {{$course->teacher->profile_photo_url}} Manda a llamar a la api:
            https://ui-avatars.com/api/?name=Fernando+Rubio+Bailon&color=7F9CF5&background=EBF4FF --}}
            <img class="h12 w-12 object-cover rounded-full shadow-lg" src="{{$course->teacher->profile_photo_url}}"
              alt="{{$course->teacher->name}}">
            <div class="ml-4">
              <h1 class="font-bold text-gray-500 text-lg">Prof. {{$course->teacher->name}}</h1>
              <a class="text-blue-400 text-sm font-bold" href="">{{'@'.Str::slug($course->teacher->name, '')}}</a>
            </div>
          </div>
          <form action="{{route('admin.courses.approved', $course)}}" class="mt-4" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary w-full">Aprobar curso</button>
          </form>
          <a class="btn btn-danger w-full block text-center mt-2 " href="{{route('admin.courses.observation', $course)}}">Dar retroalimentación</a>
        </div>
      </section>

    </div>
  </div>
</x-app-layout>