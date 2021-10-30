<div class="container py-8 ">
  <!-- This example requires Tailwind CSS v2.0+ -->
  <x-table-responsive>
    <div class="px-6 py-4 flex">
      <input wire:keydown='limpiar_page' wire:model='search'
        class="appearance-none border-2 mr-2 border-gray-200 rounded flex-1 shadow-sm  "
        placeholder="Buscar un curso por el nombre..." type="text">
      <a href="{{route('instructor.courses.create')}}">
      <button class="btn btn-danger" >Crear nuevo curso</button>
      </a>
    </div>
    @if ($courses->count())
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-50">
        <tr>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Nombre
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Alumnos
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Calificación
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Estatus
          </th>
          <th scope="col" class="relative px-6 py-3">
            <span class="sr-only">Edit</span>
          </th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($courses as $course)
        <tr>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="flex items-center">
              <div class="flex-shrink-0 h-10 w-10">
                @isset($course->image)
                  <img class="h-10 w-10 rounded-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">
                  @else
                  <img class="h-10 w-10 rounded-full object-cover" src="https://images.pexels.com/photos/5905522/pexels-photo-5905522.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260" alt="">

                  @endisset
              </div>
              <div class="ml-4">
                <div class="text-sm font-medium text-gray-900">
                  {{$course->title}}
                </div>
                <div class="text-sm text-gray-500">
                  {{$course->category->name}}
                </div>
              </div>
            </div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900">{{$course->students->count() }}</div>
            <div class="text-sm text-gray-500">Alumnos inscritos</div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="flex text-sm text-gray-900">
              {{$course->rating}}
              <ul title="Calificación exacta: {{$course->rating}}" class="flex ml-2 text-sm">
                <li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 1 ? 'yellow' : 'gray'}}-400"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 2 ? 'yellow' : 'gray'}}-400"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 3 ? 'yellow' : 'gray'}}-400"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 4 ? 'yellow' : 'gray'}}-400"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 5 ? 'yellow' : 'gray'}}-400"></i></li>
              </ul>
            </div>
            <div class="text-sm text-gray-500">Valoración</div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            @switch($course->status)
            @case(1)
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-200 text-gray-800">
              Borrador
            </span>
            @break
            @case(2)
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
              En revisión
            </span>
            @break
            @case(3)
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
              Publicado
            </span>
            @break
            @default

            @endswitch
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
            <a href="{{route('instructor.courses.edit', $course)}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
          </td>
        </tr>
        @endforeach
        <!-- More people... -->
      </tbody>
    </table>
    <div class="px-6 py-4">
      {{ $courses->links() }}
    </div>
    @else
    <div class="px-6 py-4">
      <div class="text-center text-gray-500">
        No hay cursos coincidentes
      </div>
    </div>
    @endif
  </x-table-responsive>

</div>