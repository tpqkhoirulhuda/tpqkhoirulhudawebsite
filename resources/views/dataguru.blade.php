<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Data Guru') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="input-group">
            {{-- <input type="text" placeholder="Search…" class="input input-bordered" /> --}}
            <input onchange="searchFunction()" type="text" placeholder="Search..." class="search input input-bordered mb-4" />
            <button class="btn btn-square" onchange="searchFunction()">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
            </button>
          </div>
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100 text-center text-4xl">
                  {{ __("Daftar Guru") }}
              </div>
              <div class="box-list flex flex-col justify-center m-4">
              </div>
          </div>
        </div>
      </div>
  </div>

  @section('custom-js')
  <script>
    const listBox = document.querySelector('.box-list');
    const guru = @json($guru);

    const getGuru = (filteredGuru) => {
        listBox.innerHTML = filteredGuru.map((e) => {
            return `
            <div tabindex="0" class="collapse mt-4 collapse-plus border border-base-300 bg-base-200">
                <div class="collapse-title text-xl font-medium">
                    ${e.name}
                </div>
                
                <div class="collapse-content"> 
                    <p>Jabatan: Guru</p>
                    <p>Jenis Kelamin: ${e.jenis_kelamin}</p>
                    <p>Email: ${e.email}</p>
                    <p>No Telp: ${e.noTelp}</p>
                    <p>Alamat: ${e.alamat}</p>
                    <p>Tempat, Tanggal Lahir: ${e.tempat_lahir}, ${e.tanggal_lahir}</p>

                    @if(Auth::user()->role == 1)
                        <div class="mt-2 space-x-2">
                            <label for="edit ${e.name}" class="btn btn-success btn-outline">Edit</label>
                            <label for="delete ${e.name}" class="btn btn-error btn-outline">Delete</label>
                        </div>
                    @endif

                    <!-- EDIT MODAL -->
                    <input type="checkbox" id="edit ${e.name}" class="modal-toggle" />
                    <div class="modal">
                        <div class="modal-box">
                            <div class="flex flex-col justify-center items-center p-4">
                                <h3 class="font-bold text-lg">Edit Data Santri</h3>
                                <form action="{{ route('user.update') }}" method="post">
                                    @csrf  
                                    @method('patch')

                                        <input hidden class="input input-bordered w-full max-w-xs" name="id" value="${e.id}" />
                                        <label class="label">
                                            <span class="label-text">Nama</span>
                                        </label>
                                        <input name="nama" type="text" value="${e.name}" class="input input-bordered w-full max-w-xs" />
                                        <label class="label">
                                            <span class="label-text">Jabatan</span>
                                        </label>
                                        <input name="nama" type="text" value="Guru" readonly class="input input-bordered w-full max-w-xs" />
                                        
                                        <div class="mt-4">
                                            <x-input-label for="jenis kelamin" :value="__('Jenis Kelamin')" />
                                            {{-- <x-text-input id="jenis kelamin" class="block mt-1 w-full" type="option" name="jenis kelamin" :value="old('jenis kelamin')" required autocomplete="username" placeholder='jenis kelamin' /> --}}
                                            <div class="text-white mt-2 flex gap-2">
                                                <span>Laki-laki </span><input type="radio" name="jenis_kelamin" class="radio radio-accent" checked required value="Laki-laki"/>
                                                <span>Perempuan </span><input type="radio" name="jenis_kelamin" class="radio radio-accent" required value="Perempuan"/>
                                            </div>
                                            <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2"  />
                                        </div>    

                                        <label class="label">
                                            <span class="label-text">Email</span>
                                        </label>
                                        <input name="email" type="email" value="${e.email}" class="input input-bordered w-full max-w-xs" />

                                        <label class="label">
                                            <span class="label-text">No Telp</span>
                                        </label>
                                        <input name="noTelp" type="text" value="${e.noTelp}" class="input input-bordered w-full max-w-xs" />

                                        <label class="label">
                                            <span class="label-text">Alamat</span>
                                        </label>
                                        <input name="alamat" type="text" value="${e.alamat}" class="input input-bordered w-full max-w-xs" />
                                        
                                        <label class="label">
                                            <span class="label-text">Tempat, Tanggal Lahir</span>
                                        </label>
                                        <input name="tempat_lahir" type="text" value="${e.tempat_lahir}" class="input input-bordered w-full max-w-xs" />
                                        <input name="tanggal_lahir" type="date" value="${e.tanggal_lahir}" class="input input-bordered w-full max-w-xs" />

                                        <div class="modal-action">
                                            <button type="submit" class="btn btn-accent btn-outline">Save</button>
                                            <label for="edit ${e.name}" class="btn btn-info btn-outline">Cancel</label>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- DELETE MODAL -->
                    <input type="checkbox" id="delete ${e.name}" class="modal-toggle" />
                    <div class="modal">
                        <div class="modal-box">
                            <div class="flex flex-col justify-center items-center p-4">
                                <h3 class="font-bold text-lg">Delete Santri</h3>
                                <p class="py-4">Apakah kamu yakin mau menghapus data ${e.name}</p>
                                <div class="modal-action">
                                     <form method="post" action="{{route('user.delete')}}">
                                        @csrf
                                        <input name="id" hidden value="${e.id}" />
                                        <button type="submit" class="btn btn-error btn-outline">Delete</button>
                                    </form>
                                    <label for="delete ${e.name}" class="btn btn-info btn-outline">Cancel</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            `;
        }).join('');
    };

    // Initial display of all guru
    getGuru(guru);

    const searchFunction = () => {
        const searchValue = document.querySelector(".search").value.toLowerCase();
        const filteredGuru = guru.filter((e) => e.name.toLowerCase().includes(searchValue));
        getGuru(filteredGuru);
    };
  </script>
  @endsection
</x-app-layout>
