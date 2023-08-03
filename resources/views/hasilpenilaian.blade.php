<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Hasil Penilaian') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{route('excel.export', ['id' => $user] )}}"><button class="btn btn-primary mb-4">Cetak Hasil</button></a>
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100 text-center text-4xl">
              {{ __("Hasil Penilaian ") }} {{ $user->name }}
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
                        @foreach($penilaian as $dataNilai)
                        <tr>
                          <th>1</th>
                          <td>{{$user->name}}</td>
                          <td>{{$user->jenis_kelamin == "Laki-laki" ? "L": "P"}}</td>
                          <td>{{$kelas[$dataNilai->kelas_id-1]->nama_kelas}}</td>
                          <td>{{$dataNilai->absen}}</td>
                          <td>{{$dataNilai->tugas}}</td>
                          <td>{{$dataNilai->bacaan}}</td>
                          <td>{{$dataNilai->hafalan}}</td>
                          <td>{{($dataNilai->absen*($nilai->absen / 100)) + ($dataNilai->tugas*($nilai->tugas/100)) + ($dataNilai->bacaan*($nilai->bacaan/100)) + ($dataNilai->hafalan*($nilai->hafalan/100))}}</td>
                          <td>{{ $dataNilai->{'rata-rata_jilid'} }}</td>
                          <td></td>
                          <td></td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
