<x-app-layout>
    <div class="">
        <div class="flex justify-center">
            <img
                src="{{asset('images/portadas/portada_2.jpg')}}"
                alt="PORTADA-2022"
                style="max-width: 100rem"
            >
        </div>

        <div class="py-8 px-4 bg-[--secondary-color]">
            <h2 class="font-semibold text-3xl  text-[--light-color] leading-tight text-center">
                {{ __('México | Estados Unidos | Canadá') }}
            </h2>    
        </div>


        <div class="max-w-full mx-auto sm:px-6 lg:px-8 bg-[--complementary-primary-color]">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="pt-16 border-b border-gray-200 ">
                    <p class="text-center text-3xl font-bold uppercase">
                        @php
                            $user = Auth::user()
                        @endphp

                        &#9917; Bienvenido(a) al Mundial Lafage &#9917;
                    </p>
                    <p class="text-center text-2xl mt-4 uppercase mb-4">
                         {{ $user->nombres . " " . $user->apellidos}}
                    </p>
                </div>
                <div class="flex w-full py-8" style="justify-content: center;align-items: center;">
                    <img src="{{asset('images/grupos.jpg')}}" alt="PORTADA-2022" style="width: 60%;height: auto;" class="">
                    <img src="{{asset('images/adorno_1.jpg')}}" alt="PORTADA-2022" style="width: 20%;height: 1%;margin-left: 15px;" class="">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

