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
                  <form action="" class="flex flex-col items-center justify-center">
                    @csrf
                    <div class="form-control">
      
                      <label class="label">
                        <span class="label-text">Absen</span>
                      </label>
                      <input type="number" placeholder="absen" :value="old('absen', {{$nilai->absen}})" class="input input-bordered w-full max-w-xs" />
                      <label class="label">
                        <span class="label-text">Tugas</span>
                      </label>
                      <input type="number" placeholder="tugas" :value="old('tugas', $nilai->tugas)" class="input input-bordered w-full max-w-xs" />
                      <label class="label">
                        <span class="label-text">Bacaan</span>
                      </label>
                      <input type="number" placeholder="bacaan" :value="old('bacaan', $nilai->bacaan)" class="input input-bordered w-full max-w-xs" />
                      <label class="label">
                        <span class="label-text">Hafalan</span>
                      </label>
                      <input type="number" placeholder="hafalan" :value="old('hafalan', $nilai->hafalan)" class="input input-bordered w-full max-w-xs" />
                      <button class="btn btn-accent mt-3">Save Kriteria Nilai</button>
                    </div>
                  </form>
                </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
