<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Quiniela Mundial Lafage | 2026') }}
        </h2>
    </x-slot>

    <div class="max-w-screen-2xl my-6 mx-auto sm:px-6 lg:px-8" id="selecciones-container">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div class="px-6 pb-6 ">
                <h5 class="text-xl text-center font-bold my-8 py-4 px-12 uppercase rounded-lg bg-[--primary-color] w-max mx-auto text-[--light-color]">
                    Estadios del Mundial 2026
                </h5>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-center items-start gap-8 transition-all">

                    @foreach($estadios as $estadio)
                        <div class="max-w-md bg-[--complementary-primary-color] rounded-lg transform ease-in duration-150 hover:scale-105 overflow-hidden shadow-lg">
                            <div class="flex">
                                <img
                                    class="rounded-t-lg hover:cursor-pointer btn-bandera w-full object-cover"
                                    style="aspect-ratio: 6/3"
                                    src="{{ asset($estadio->imagen) }}"
                                    alt=""
                                    id="{{ $estadio->id }}"
                                    onclick="slideToggle({{ $estadio->id }})"
                                />
                            </div>
                            <div class="p-5 rounded-lg">
                                <div class="mb-2 xl:text-xl font-semibold tracking-tight flex gap-4 justify-center items-center">
                                    {{ $estadio->nombre }}
                                    <span>
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 12 12"><path
                                            fill="currentColor"
                                            d="M3.076 4.617A1 1 0 0 1 4 4h4a1 1 0 0 1 .707 1.707l-2 2a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1-.217-1.09"
                                        /></svg>
                                    </span>
                                </div>
                                <div class="container-{{ $estadio->id }} hidden">
                                    <p class="mb-3 font-normal text-center">
                                        {{ $estadio->descripcion }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
</x-app-layout>