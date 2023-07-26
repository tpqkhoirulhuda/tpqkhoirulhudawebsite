<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Tambah Guru Baru') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100 text-center text-4xl">
                  {{ __("Tambah Guru Baru") }}
              </div>
              <div class="flex flex-col justify-center p-5">
                <div class="">
                  <form action="" class="flex flex-col items-center justify-center">
                    @csrf
                    <div class="form-control">
                      <div>
                        <x-input-label for="name" :value="__('Nama Lengkap')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder='nama lengkap' />
                        <x-input-error :messages="$errors->get('name')" class="mt-2"  />
                      </div>

                      <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder='email' />
                        <x-input-error :messages="$errors->get('email')" class="mt-2"  />
                      </div>
              
                      <div class="mt-4">
                          <x-input-label for="jenis kelamin" :value="__('Jenis Kelamin')" />
                          {{-- <x-text-input id="jenis kelamin" class="block mt-1 w-full" type="option" name="jenis kelamin" :value="old('jenis kelamin')" required autocomplete="username" placeholder='jenis kelamin' /> --}}
                          <div class="text-white mt-2 flex gap-2">
                              <span>Laki-laki </span><input type="radio" name="jenis_kelamin" class="radio radio-accent" checked required :value="Laki-laki"/>
                              <span>Perempuan </span><input type="radio" name="jenis_kelamin" class="radio radio-accent" required :value="Perempuan"/>
                          </div>
                          <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2"  />
                      </div>


                      <label class="label mt-3">
                        <span class="label-text">Jabatan</span>
                      </label>
                      <input type="text" placeholder="jabatan" value="Guru" readonly class="input input-bordered w-full max-w-xs" />

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

                      <div class="mt-4">
                        <x-input-label for="tanggal lahir" :value="__('Tempat, Tanggal Lahir')" />
                        <x-text-input id="tempat lahir" class="block mt-1 w-full" type="text" name="tempat_lahir" :value="old('tempat_lahir')" required autocomplete="place" placeholder='tempat lahir' />
                        <x-text-input id="tanggal lahir" class="block mt-1 w-full" type="date" name="tanggal_lahir" :value="old('tanggal_lahir')" required autocomplete="date" placeholder='tanggal lahir' />
                        <x-input-error :messages="$errors->get('tanggal lahir')" class="mt-2"  />
                        <x-input-error :messages="$errors->get('tempat lahir')" class="mt-2"  />
                      </div>

                      <div class="mt-4">
                        <x-input-label for="ibu" :value="__('Nama Ibu')" />
                        <x-text-input id="ibu" class="block mt-1 w-full" type="text" name="ibu" :value="old('ibu')" required autofocus autocomplete="ibu" placeholder='nama ibu' />
                        <x-input-error :messages="$errors->get('noTelp')" class="mt-2"  />
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

                      <button class="btn btn-accent mt-3">Tambah Santri</button>
                    </div>
                  </form>
                </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
