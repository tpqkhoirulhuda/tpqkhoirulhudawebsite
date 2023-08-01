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
                    <p>tabindex="0" attribute is necessary to make the div focusable</p>

                    @if(Auth::user()->role == 1)
                        <div class="mt-2 space-x-2">
                            <button class="btn btn-success btn-outline">Edit</button>
                            <button class="btn btn-error btn-outline">Delete</button>
                        </div>
                    @endif
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
