<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Quiniela Mundial Lafage | 2026') }}
        </h2>
    </x-slot>

    <div class="max-w-screen-2xl mb-6 mx-auto sm:px-6 lg:px-8" id="selecciones-container">
        <div class= overflow-hidden shadow-sm sm:rounded-lg">
            <div class="px-6 pb-6 border-b">
                <h5 class="text-xl text-center font-bold my-12 py-4 px-12 uppercase rounded-lg bg-[--primary-color] w-max mx-auto text-[--light-color]">
                    Selecciones clasificadas
                </h5>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 justify-center items-start gap-8 transition-all">
                    @foreach ($equipos as $equipo)
                    <div class="w-full max-w-sm bg-[--complementary-primary-color] transform ease-in duration-150 hover:scale-105 rounded-lg px-2 py-6 mx-auto shadow-lg">
                        <div class="flex">
                            <img
                                class="rounded-lg mx-auto hover:cursor-pointer btn-bandera w-32 h-20 cursor-pointer"
                                src="{{ asset( $equipo->imagen ) }}"
                                alt="{{$equipo->nombre}}"
                                id="{{str_replace(' ', '', $equipo->id)}}"
                                onclick="slideToggle(this.id)"
                            />
                        </div>
                        <div class="pt-4">
                            <div
                                class="mb-2 text-center text-2xl font-bold tracking-tight cursor-pointer flex gap-4 justify-center items-center"
                                id="{{str_replace(' ', '', $equipo->id)}}"
                                onclick="slideToggle(this.id)"
                            >
                                {{ $equipo->nombre }}
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
                            <div class="container-{{str_replace(' ', '', $equipo->id)}} hidden rounded-lg p-3">
                                <p class="mb-3 font-normal text-center">{{$equipo->descripcion}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
