<x-head/>

<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder='nama lengkap' />
            <x-input-error :messages="$errors->get('name')" class="mt-2"  />
        </div>

        <div class="mt-4">
            <x-input-label for="alamat" :value="__('Alamat')" />
            <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat')" required autofocus autocomplete="alamat" placeholder='alamat' />
            <x-input-error :messages="$errors->get('alamat')" class="mt-2"  />
        </div>

        <div class="mt-4">
            <x-input-label for="no telp" :value="__('No Telp.')" />
            <x-text-input id="noTelp" class="block mt-1 w-full" type="text" name="noTelp" :value="old('noTelp')" required autofocus autocomplete="noTelp" placeholder='no telp' />
            <x-input-error :messages="$errors->get('noTelp')" class="mt-2"  />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder='email' />
            <x-input-error :messages="$errors->get('email')" class="mt-2"  />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" placeholder='password' />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" placeholder='confirm password' />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex flex-col items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>

            <a class="link link-hover text-slate-400 mt-2" href="{{ route('login') }}">
                {{ __('Sudah punya akun?') }}
            </a>
        </div>
    </form>
</x-guest-layout>
