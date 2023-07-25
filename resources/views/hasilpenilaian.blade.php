<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Hasil Penilaian') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <button class="btn btn-primary mb-4">Cetak Hasil</button>
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100 text-center text-4xl">
                  {{ __("Hasil Penilaian ") }} {{ Auth::user()->name }}
              </div>
              <div class="flex flex-col justify-center">
                <div class="overflow-x-auto flex flex-col justify-center m-6 flex-wrap">
                  <table class="table text-center">
                    <!-- head -->
                    <thead>
                      <tr>
                        <th>Buku Jilid</th>
                        <th>Nama</th>
                        <th>L/P</th>
                        <th>Kelas</th>
                        <th>Absen</th>
                        <th>Tugas</th>
                        <th>Bacaan</th>
                        <th>Hafalan</th>
                        <th>Rata-rata</th>
                        <th>Rata-rata Jilid</th>
                        <th>N/A</th>
                        <th>Ket</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- row 1 -->
                      <tr>
                        <th>1</th>
                        <td>Cy Ganderton</td>
                        <td>Quality Control Specialist</td>
                        <td>Blue</td>
                      </tr>
                      <!-- row 2 -->
                      <tr>
                        <th>2</th>
                        <td>Hart Hagerty</td>
                        <td>Desktop Support Technician</td>
                        <td>Purple</td>
                      </tr>
                      <!-- row 3 -->
                      <tr>
                        <th>3</th>
                        <td>Brice Swyre</td>
                        <td>Tax Accountant</td>
                        <td>Red</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
