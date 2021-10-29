
<x-app-layout>
    {{-- Portada --}}
    <section class="bg-cover" style="background-image: url({{asset('img/home/img_background.jpg')}})" >
       <div class="container py-36 " >
            <div class="w-full md:w-3/4 lg:w-1/2" >
                <h1 class="text-white font-bold text-5xl" >Domina la tecnología web</h1>
                <p class=" bg-blue-900 text-white text-lg mt-2" >En este sitio encontraras cursos que te ayudaran a convertirte en un desarrollador</p>
                <!-- component search -->
                @livewire('search')
            </div>
       </div>
    </section>

    <section class="mt-24" >
        <h1 class="text-gray-700 text-center text-3xl mb-3 " >
            CONTENIDO
        </h1>
        <div class="max-w-7xl pt-11 mx-auto px-auto sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3  gap-x-6 gap-y-8" >
            <article class="px-5 sm:px-2" >
                <figure>
                    <img class=" shadow rounded h-48 w-full object-cover" src="{{asset('img/home/img_background.jpg')}}" alt="">
                </figure>
                <header class="mt-2" >
                    <h1 class=" text-center text-xl text-gray-700" >Cursos y porgramacion</h1>
                    <p class="text-sm text-gray-500" >Lorem ipsum dolor sit, amet consectetur adipisicing elit. Modi aliquid repudiandae tempore adipisci sapiente, error quod esse </p>
                </header>
            </article>
            <article class="px-5 sm:px-2" >
                <figure>
                    <img class=" shadow rounded h-48 w-full object-cover" src="{{asset('img/home/img_background.jpg')}}" alt="">
                </figure>
                <header class="mt-2" >
                    <h1 class=" text-center text-xl text-gray-700" >Cursos y porgramacion</h1>
                    <p class="text-sm text-gray-500" >Lorem ipsum dolor sit, amet consectetur adipisicing elit. Modi aliquid repudiandae tempore adipisci sapiente, error quod esse </p>
                </header>
            </article>
            <article class="px-5 sm:px-2" >
                <figure>
                    <img class=" shadow rounded h-48 w-full object-cover" src="{{asset('img/home/img_background.jpg')}}" alt="">
                </figure>
                <header class="mt-2" >
                    <h1 class=" text-center text-xl text-gray-700" >Cursos y porgramacion</h1>
                    <p class="text-sm text-gray-500" >Lorem ipsum dolor sit, amet consectetur adipisicing elit. Modi aliquid repudiandae tempore adipisci sapiente, error quod esse </p>
                </header>
            </article>
            <article class="px-5 sm:px-2" >
                <figure>
                    <img class=" shadow rounded h-48 w-full object-cover" src="{{asset('img/home/img_background.jpg')}}" alt="">
                </figure>
                <header class="mt-2" >
                    <h1 class=" text-center text-xl text-gray-700" >Cursos y porgramacion</h1>
                    <p class="text-sm text-gray-500" >Lorem ipsum dolor sit, amet consectetur adipisicing elit. Modi aliquid repudiandae tempore adipisci sapiente, error quod esse </p>
                </header>
            </article>
        </div>
    </section>

    <section class="mt-24 bg-gray-700 py-12 ">
        <h1 class="text-center text-white text-3xl" >¿No sabes qué curso llevar?</h1>
        <p class="text-center text-white" >Dirigete al catalogo de cursos y filtralos por categoría o por nivel</p>
        <div class="flex justify-center mt-5" >
            <a href="{{route('courses.index')}}" class=" text-center  bg-blue-900 font-semibold text-white p-2 w-64 rounded-full hover:bg-blue-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300">
                Catálogo de Cursos
            </a >
        </div>
    </section>

    <section class="mt-24" >
        <h1 class="text-center text-3xl text-gray-600 " >ÚLTIMOS CURSOS</h1>
        <div class="container py-36 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3  gap-x-6 gap-y-8" >
            @foreach ($courses as $course)
                <x-course-card :course="$course" />
            @endforeach
        </div>
    </section>

</x-app-layout>