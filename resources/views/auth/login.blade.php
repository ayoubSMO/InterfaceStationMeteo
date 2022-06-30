<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Nom') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('CIN')" required autofocus />
            </div>
            <div class="mt-4">
            <div>
                <x-jet-label for="Appogee" value="{{ __('email') }}" />
                <x-jet-input id="Appogee" class="block mt-1 w-full" type="text" name="Appogee" :value="old('Appogee')" required autofocus />
            </div>
            </div>
            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('date de naissance') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="date" name="password" required/>
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
