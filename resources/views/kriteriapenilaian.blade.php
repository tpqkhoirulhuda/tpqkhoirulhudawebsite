<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Kriteria Penilaian') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100 text-center text-4xl">
                  {{ __("Kriteria Penilaian") }}
              </div>
              <div class="flex flex-col justify-center p-5">
                <div class="">
                  <form action="{{ route('kriteria-penilaian') }}" method="post" class="flex flex-col items-center justify-center">
                    @csrf
                    <div class="form-control">
                      <label class="label">
                        <span class="label-text">Absen</span>
                      </label>
                      <label class="input-group">
                        <input name="absen" type="number" value="{{ $nilai->absen }}" class="input input-bordered w-full max-w-xs" />
                        <span>%</span>
                      </label>
                      <label class="label">
                        <span class="label-text">Tugas</span>
                      </label>
                      <label class="input-group">
                        <input name="tugas" type="number" value="{{ $nilai->tugas }}" class="input input-bordered w-full max-w-xs" />
                        <span>%</span>
                      </label>
                      <label class="label">
                        <span class="label-text">Bacaan</span>
                      </label>
                      <label class="input-group">
                        <input name="bacaan" type="number" value="{{ $nilai->bacaan }}" class="input input-bordered w-full max-w-xs" />
                        <span>%</span>
                      </label>
                      <label class="label">
                        <span class="label-text">Hafalan</span>
                      </label>
                      <label class="input-group">
                        <input name="hafalan" type="number" value="{{ $nilai->hafalan }}" class="input input-bordered w-full max-w-xs" />
                        <span>%</span>
                      </label>
                      <div class="flex justify-center items-center gap-4">
                        <button class="btn btn-accent mt-3" type="submit">Save Kriteria Nilai</button>
                          @if (session('status') === 'profile-updated')
                          <div class="alert alert-success fixed top-0 left-[50%] w-[50%] translate-x-[-50%]" x-data="{ show: true }"
                          x-show="show"
                          x-transition
                          x-init="setTimeout(() => show = false, 2000)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6"  fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                              <p>{{ __('Saved.') }}</p>
                          </div>
                          @endif
                      </div>
                    </div>
                  </form>
                </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
