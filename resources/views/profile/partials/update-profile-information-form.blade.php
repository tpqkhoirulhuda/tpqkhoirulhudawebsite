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
            <x-input-label for="jenis kelamin" :value="__('Jenis Kelamin')" />
            <div class="text-white mt-2 flex gap-2">
                @if($user->jenis_kelamin == "Laki-laki")
                <span>Laki-laki </span><input type="radio" name="jenis_kelamin" class="radio radio-accent" checked value="Laki-laki"/>
                <span>Perempuan </span><input type="radio" name="jenis_kelamin" class="radio radio-accent" value="Perempuan"/>
                @else
                 <span>Laki-laki </span><input type="radio" name="jenis_kelamin" class="radio radio-accent"  value="Laki-laki"/>
                <span>Perempuan </span><input type="radio" name="jenis_kelamin" class="radio radio-accent" checked value="Perempuan"/>
                @endif
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('jenis_kelamin')" />
        </div>

        <div>
            <x-input-label for="datebirth" :value="__('Tempat, Tanggal Lahir')" />
            <x-text-input id="tempat lahir" class="block mt-1 w-full" type="text" name="tempat_lahir" :value="old('tempat_lahir',  $user->tempat_lahir)" required autocomplete="place" placeholder='tempat lahir' />
            <x-text-input id="tanggal lahir" class="block mt-1 w-full" type="date" name="tanggal_lahir" :value="old('tanggal_lahir', $user->tanggal_lahir)" required autocomplete="date" placeholder='tanggal lahir' />
            <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2"  />
            <x-input-error :messages="$errors->get('tempat_lahir')" class="mt-2"  />
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


