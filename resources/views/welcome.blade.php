
<x-app-layout>
    {{-- Portada --}}
    <section class="bg-cover" style="background-image: url({{asset('img/home/img_background.jpg')}})" >
       <div class="container py-36 " >
            <div class="w-full md:w-3/4 lg:w-1/2" >
                <h1 class="text-white font-bold text-5xl" >Domina la tecnología web</h1>
                <p class=" bg-blue-900 text-white text-lg mt-2" >En este sitio encontraras cursos que te ayudaran a convertirte en un desarrollador</p>
                <!-- component -->
                <div title="Search" class=" w-full mt-4 relative text-gray-600">
                    <input type="search" name="serch" placeholder="Search" class="w-full bg-white h-10 px-5 pr-10 rounded-full text-sm focus:ring-offset-purple-900">
                    {{-- <button type="submit" class=" absolute right-0 top-0 mt-3 mr-4"> --}}
                    {{-- <svg class="h-4 w-4  fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                        <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
                    </svg> --}}
                        <button type="submit"
                        class=" right-0 top-0  absolute btn btn-primary">
                       Search
                      </button>
                    {{-- </button> --}}
                </div>
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