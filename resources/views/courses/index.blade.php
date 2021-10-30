<x-app-layout>
  <section class="bg-cover" style="background-image: url({{asset('img/home/img_cursos.jpg')}})" >
    <div class="container py-36 " >
         <div class="w-full md:w-3/4 lg:w-1/2" >
             <h1 class="text-white font-bold text-5xl" >Todos los cursos disponibles</h1>
             <p class=" bg-blue-900 text-white text-lg mt-2" >En esta sección encontraras el listado de todos los cursos</p>
             <!-- component -->
             @livewire('search')
         </div>
    </div>
 </section>
 @livewire('courses-index')
</x-app-layout>