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
                        <div class="stat-title">Kelas</div>
                        <div class="stat-value text-2xl text-success">{{ Auth::user()->noTelp }}</div>
                    </div>
                    
                </div>
                <div class="flex flex-col justify-center">
                    <div class="stats shadow m-4">

                    <div class="stat place-items-center">
                        <div class="stat-title">Email</div>
                        <div class="stat-value text-lg">{{ Auth::user()->email }}</div>
                    </div>

                    @if(Auth::user()->role === 0) 
                    <div class="stat place-items-center">
                        <div class="stat-title">Kelas</div>
                        <div class="stat-value text-lg">{{ Auth::user()->kelas->nama_kelas }}</div>
                    </div>
                    @endif
                    
                </div>
                <div class="flex flex-col justify-center">
                    <div class="stats shadow m-4">

                    <div class="stat place-items-center">
                        <div class="stat-title">Jenis Kelamin</div>
                        <div class="stat-value text-2xl">{{ Auth::user()->jenis_kelamin }}</div>
                    </div>
                    
                    <div class="stat place-items-center">
                        <div class="stat-title">Tempat, Tanggal Lahir</div>
                        <div class="stat-value text-2xl text-success">{{ Auth::user()->tempat_lahir }}, {{ Auth::user()->tanggal_lahir }}</div>
                    </div>
                    
                    
                    
                    
                </div>

                <div class="flex flex-col justify-center">
                    <div class="stats shadow m-4">
                    <div class="stat place-items-center">
                        <div class="stat-title">No Telp</div>
                        <div class="stat-value text-lg">{{ Auth::user()->noTelp }}</div>
                    </div>

                    <div class="stat place-items-center">
                        <div class="stat-title">Alamat</div>
                        <div class="stat-value text-2xl">{{ Auth::user()->alamat}}</div>
                    </div>

                    </div>
                </div>
                <div class="flex flex-col justify-center">
                    <div class="stats shadow m-4">
                        <div class="stat place-items-center">
                        <div class="stat-title">Status</div>
                        <div class="stat-value text-2xl text-success">
                            @if(Auth::user()->role === 0)
                                Santri
                            @elseif(Auth::user()->role === 2)
                                Guru
                            @else 
                                Admin
                            @endif
                        </div>
                    </div>

                    @if(Auth::user()->role === 0)   
                        <div class="stat place-items-center">
                            <div class="stat-title">Nama Ibu</div>
                            <div class="stat-value text-2xl">{{ Auth::user()->ibu}}</div>
                        </div>
                        


                        @if(Auth::user()->ibu == null || Auth::user()->kelas_id == null)
                            <div x-data="{ showModal: true }" @keydown.escape="showModal = false" class="fixed inset-0 flex items-center justify-center">
                                <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
                                    <div @click.away="showModal = false" class="modal-container bg-white dark:bg-gray-800 w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                                    <div class="modal-content py-4 text-left px-6">
                                        <h3 class="font-bold text-lg">Halo, {{ Auth::user()->name }}</h3>
                                        <p class="py-4">Tolong masukkan Kelas dan Nama Ibu:</p>
                                        <form method="POST" class="modal-box" action="{{ route('verifikasi-santri') }}">
                                            @csrf
                                            @method('post')
                                            <div class="form-control">
                                                <label class="label">
                                                    <span class="label-text">Kelas</span>
                                                </label>
                                                <select name="kelas" class="select select-bordered" required>
                                                    <option disabled selected>Kelas</option>
                                                    @foreach($kelas as $kl)
                                                        <option value="{{$kl->id}}">{{$kl->nama_kelas}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-control">
                                                <label class="label">
                                                    <span class="label-text">Nama Ibu</span>
                                                </label>
                                                <input type="text" placeholder="Type here" name="ibu" class="input input-bordered w-full" required />
                                            </div>
                                            <div class="modal-action mt-4">
                                                <button type="submit" class="btn btn-info btn-outline">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
