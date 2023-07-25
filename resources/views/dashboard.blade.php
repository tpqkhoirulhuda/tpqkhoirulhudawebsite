<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center text-4xl">
                    {{ __("Halo, ") }} {{ Auth::user()->name }}
                </div>
                <div class="flex flex-col justify-center">
                    <div class="stats shadow m-4">

                    <div class="stat place-items-center">
                        <div class="stat-title">Nama Lengkap</div>
                        <div class="stat-value text-2xl">{{ Auth::user()->name }}</div>
                    </div>
                    
                    <div class="stat place-items-center">
                        <div class="stat-title">No Telp</div>
                        <div class="stat-value text-2xl text-secondary">{{ Auth::user()->noTelp }}</div>
                    </div>
                    
                    <div class="stat place-items-center">
                        <div class="stat-title">Email</div>
                        <div class="stat-value text-lg">{{ Auth::user()->email }}</div>
                    </div>
                </div>
                <div class="flex flex-col justify-center">
                    <div class="stats shadow m-4">

                    <div class="stat place-items-center">
                        <div class="stat-title">Nama Lengkap</div>
                        <div class="stat-value text-2xl">{{ Auth::user()->name }}</div>
                    </div>
                    
                    <div class="stat place-items-center">
                        <div class="stat-title">No Telp</div>
                        <div class="stat-value text-2xl text-secondary">{{ Auth::user()->noTelp }}</div>
                    </div>
                    
                    <div class="stat place-items-center">
                        <div class="stat-title">Email</div>
                        <div class="stat-value text-lg">{{ Auth::user()->email }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
