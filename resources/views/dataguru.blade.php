<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Data Guru') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <input type="text" placeholder="🔍 Search" class="input input-bordered w-24 md:w-auto mb-4" />
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100 text-center text-4xl">
                  {{ __("Daftar Guru") }}
              </div>
              <div class="flex flex-col justify-center m-4">
                <div tabindex="0" class="collapse collapse-plus border border-base-300 bg-base-200">
                  <div class="collapse-title text-xl font-medium">
                    Focus me to see content
                  </div>
                  <div class="collapse-content"> 
                    <p>tabindex="0" attribute is necessary to make the div focusable</p>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
  </div>
</x-app-layout>
