<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

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
            
            <!-- Email Address -->
            <div>
                <x-label for="numero_documento" :value="__('Número de documento')" />

                <x-input
                    id="numero_documento"
                    class="block mt-1 w-full"
                    type="text"
                    name="identity"
                    :value="old('numero_documento')"
                    required
                    autofocus
                />
            </div>

            <!-- Password -->
            <div class="my-4">
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
