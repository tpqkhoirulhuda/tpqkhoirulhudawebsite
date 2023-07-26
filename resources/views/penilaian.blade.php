<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Penilaian') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100 text-center text-4xl">
                  {{ __("Penilaian") }}
              </div>
              <div class="flex flex-col justify-center p-5">
                <div class="">
                  <form action="" class="flex flex-col items-center justify-center">
                    @csrf
                    <div class="form-control">
                      <label class="label">
                        <span class="label-text">Buku Jilid</span>
                      </label>
                      <select class="select select-bordered">
                        <option disabled selected>Buku Jilid</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                      </select>
                      <label class="label">
                        <span class="label-text">Nama</span>
                      </label>
                      <input type="search" placeholder="nama" class="input input-bordered w-full max-w-xs" />
                      <label class="label">
                        <span class="label-text">Jenis Kelamin</span>
                      </label>
                      <select class="select select-bordered">
                        <option disabled selected>Jenis Kelamin</option>
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                      </select>
                      <label class="label">
                        <span class="label-text">Kelas</span>
                      </label>
                      <select class="select select-bordered">
                        <option disabled selected>Kelas</option>
                        <option>TPQ A</option>
                        <option>TPQ B</option>
                        <option>TPQ L</option>
                      </select>
                      <label class="label">
                        <span class="label-text">Absensi</span>
                      </label>
                      <input type="number" placeholder="absensi" class="input input-bordered w-full max-w-xs" />
                      <label class="label">
                        <span class="label-text">Tugas</span>
                      </label>
                      <input type="number" placeholder="tugas" class="input input-bordered w-full max-w-xs" />
                      <label class="label">
                        <span class="label-text">Bacaan</span>
                      </label>
                      <input type="number" placeholder="bacaan" class="input input-bordered w-full max-w-xs" />
                      <label class="label">
                        <span class="label-text">Hafalan</span>
                      </label>
                      <input type="number" placeholder="hafalan" class="input input-bordered w-full max-w-xs" />
                      <label class="label">
                        <span class="label-text">Rata-rata Jilid</span>
                      </label>
                      <input type="number" placeholder="rata-rata jilid" class="input input-bordered w-full max-w-xs" />
                      <button class="btn btn-accent mt-3">Submit Nilai</button>
                    </div>
                  </form>
                </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>