<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label for="gender" :value="__('Jenis Kelamin')" />
            {{-- <x-text-input id="gender" name="gender" type="text" read-only class="mt-1 block w-full" :value="old('gender', $user->gender)" required autocomplete="gender" /> --}}
            <div class="text-white mt-2 flex gap-2">
                <span>Laki-laki </span><input type="radio" name="gender" class="radio radio-accent" checked required value="Laki-laki"/>
                <span>Perempuan </span><input type="radio" name="gender" class="radio radio-accent" required value="Perempuan"/>
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('gender')" />
        </div>

        <div>
            <x-input-label for="datebirth" :value="__('Tempat, Tanggal Lahir')" />
            <x-text-input id="placebirth" class="block mt-1 w-full" type="text" name="placebirth" :value="old('placebirth')" required autocomplete="place" placeholder='tempat lahir' />
            <x-text-input id="datebirth" class="block mt-1 w-full" type="date" name="datebirth" :value="old('datebirth')" required autocomplete="date" placeholder='datebirth' />
            <x-input-error :messages="$errors->get('datebirth')" class="mt-2"  />
        </div>
     
        @if($user->role == '0')
        <div>
            <x-input-label for="mother" :value="__('Nama Ibu')" />
            <x-text-input id="mother" name="mother" type="text" class="mt-1 block w-full" :value="old('mother', $user->mother)" required autocomplete="mother" />
            <x-input-error class="mt-2" :messages="$errors->get('mother')" />
        </div>
        @endif

        <div>
            <x-input-label for="alamat" :value="__('Alamat')" />
            <x-text-input id="alamat" name="alamat" type="text" class="mt-1 block w-full" :value="old('alamat', $user->alamat)" required autocomplete="address" />
            <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
        </div>

        <div>
            <x-input-label for="noTelp" :value="__('No Telp')" />
            <x-text-input id="noTelp" name="noTelp" type="text" class="mt-1 block w-full" :value="old('noTelp', $user->noTelp)" required autocomplete="phone nummber" />
            <x-input-error class="mt-2" :messages="$errors->get('noTelp')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
