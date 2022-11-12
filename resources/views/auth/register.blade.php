<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- First Name -->
            <div>
                <x-input-label for="firstName" :value="__('First Name')" />

                <x-text-input id="firstName" class="block mt-1 w-full" type="text" name="firstName" :value="old('firstName')" required autofocus />

                <x-input-error :messages="$errors->get('firstName')" class="mt-2" />
            </div>

            <!-- Last Name -->
            <div class="mt-4">
                <x-input-label for="lastName" :value="__('Last Name')" />

                <x-text-input id="lastName" class="block mt-1 w-full" type="text" name="lastName" :value="old('lastName')" required autofocus />

                <x-input-error :messages="$errors->get('lastName')" class="mt-2" />
            </div>

            <!-- Birthday date -->
            <div class="mt-4">
                <x-input-label for="birthDate" :value="__('Birth Date')" />

                <x-text-input id="birthDate" class="block mt-1 w-full" type="date" name="birthDate" :value="old('birthDate')" required autofocus />

                <x-input-error :messages="$errors->get('birthDate')" class="mt-2" />
            </div>
            
            <!-- Gender -->
            <div class="mt-4 grid grid-cols-3">
                <x-input-label for="gender" :value="__('Gender')" />

                <div>
                    <input type="radio" name="gender" id="male" value="M" class="mr-1">
                    <label for="male">Male</label>
                </div>

                <div>
                    <input type="radio" name="gender" id="female" value="F" class="mr-1">
                    <label for="female">Female</label>
                </div>

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
