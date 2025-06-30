<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('build/assets/app-da32ce76.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/app-64a78070.css') }}">

    <script src="{{ asset('build/assets/app-56df689c.js') }}" defer></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/flowbite.js')}}"></script>

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')




    <title>Soalpro</title>

</head>

<body class="bg-gray-200 dark:bg-gray-800 text-gray-900 dark:text-gray-300">
    <!-- boton dark mode-->
    <label class="relative inline-flex items-center cursor-pointer">
        <input type="checkbox" id="darkToggle" class="sr-only peer">
        <div
           class="w-14 h-6 bg-blue-400  border border-gray-500 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full  after:content-[''] after:absolute after:top-[0px] after:start-[0px] after:bg-white peer-checked:after:bg-white after:rounded-full after:h-6 after:w-8 after:transition-all  peer-checked:bg-gray-600">
           <div class="flex justify-around">
              <img src="{{ asset('img/iconos/moon.svg') }}" alt="" class="h-5 w-5 rounded-md">

              <img src="{{ asset('img/iconos/sun.svg') }}" alt="" class="h-5 w-5 rounded-md">
           </div>

        </div>
     </label>

     <!-- fin boton dark mode-->
    <div class="min-w-screen min-h-screen flex items-center justify-center px-5 py-5">
        <div class=" rounded-3xl shadow-xl w-full overflow-hidden bg-white dark:bg-gray-900" style="max-width:1000px">
            <div class="md:flex w-full">
                <div class="hidden md:flex w-1/2 py-10 px-10 justify-center content-center">
                    <img src="{{ asset('img/iconos/login.svg') }}" alt="">
                </div>
                <div class="w-full md:w-1/2 py-10 px-5 md:px-10">
                    <div class="text-center mb-10">
                        <h1 class="font-bold text-3xl">Iniciar sesión</h1>
                        <p>Introduzca su código de trabajador y contraseña</p>
                    </div>



                    <form method="POST" action="{{ route('login')}}" novalidate>
                        @csrf
                        <div class=" px-3 mb-5">
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="tel" name="codigo" id="codigo"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required />
                                <label for="codigo"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Código</label>
                            </div>

                            <div class="relative z-0 w-full mb-5 group">
                                <input id="password" name="password" type="password" placeholder=" "
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                <label for="password"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                                @error('password') <p
                                    class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                    {{$message}}
                                </p>@enderror
                            </div>
                            <div class="mb-5">
                                <input type="checkbox" name="remember"> <label class=" text-gray-500 text-sm ">Mantener mi
                                    sesion abierta.</label>
                            </div>
                        </div>


                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-5">
                                <button type="submit"
                                    class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">INGRESAR</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- BUY ME A BEER AND HELP SUPPORT OPEN-SOURCE RESOURCES -->
    <div class="flex items-end justify-end fixed bottom-0 right-0 mb-3 mr-3 z-10">
        <div>
            <img
                class="block w-16 h-16 rounded-3xl transition-all shadow hover:shadow-lg transform hover:scale-110 hover:rotate-12 object-cover object-center "
                    src="{{ asset('img/iconos/logo.svg') }}" />

        </div>
    </div>

</body>

</html>
