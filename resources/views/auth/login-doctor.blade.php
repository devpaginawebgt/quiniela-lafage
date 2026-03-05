<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <h2 class="text-center text-lg text-[--complementary-dark-color]">Inicia sesión</h2>

        <ul class="flex justify-center items-center mt-4 mb-6 border rounded-xl overflow-hidden">
            <li class="w-full">
                <a href="{{ route('ingresa') }}" class="w-full text-center">
                    <div class="px-4 py-2">
                        Dependiente
                    </div>
                </a>
            </li>
            <li class="w-full">
                <div class="w-full text-center bg-[--complementary-secondary-color] text-[--light-color]">
                    <div class="px-4 py-2 cursor-default"> 
                        Doctor
                    </div>
                </div>
            </li>
        </ul>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form
            method="POST"
            action="{{ route('login') }}"
            class="formulario-auth mb-2"
        >            
            @csrf

            <input type="hidden" name="user_type_id" value="2">
            
            <!-- Email Address -->
            <div>
                <x-label for="identity" :value="__('Colegiado')" />

                <x-input
                    id="identity"
                    class="block mt-1 w-full"
                    type="text"
                    name="identity"
                    :value="old('identity')"
                    required
                    autofocus
                />
            </div>

            <!-- Password -->
            <div class="mt-4 mb-6">
                <x-label for="password" :value="__('Contraseña')" />

                <x-input
                    id="password"
                    class="block mt-1 w-full"
                    type="password"
                    name="password"
                    required
                    autocomplete="password"
                />
            </div>

            <x-button class="w-full text-center text-lg">
                {{ __('Ingresar') }}
            </x-button>
        </form>
    </x-auth-card>
</x-guest-layout>
