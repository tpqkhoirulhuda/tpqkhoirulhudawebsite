<!DOCTYPE html>
<html lang="en">
  <x-head/>
<body>
  <div class="drawer">
    <input id="my-drawer-3" type="checkbox" class="drawer-toggle" /> 
    <div class="drawer-content flex flex-col">
      <!-- Navbar -->
      <div class="w-full navbar bg-base-200 fixed z-10 flex">
        <div class="flex-none px-0 lg:px-24">
          <img src="/Logo.png" alt="" for="my-drawer-3" class="w-20 h-20">
          <label for="my-drawer-3" class="btn btn-ghost text-xl md:text-2xl">
            TPQ Khoirul Huda
          </label>
        </div> 
      </div>
      <!-- Page content here -->
      <div class="hero min-h-screen bg-base-200">
        <div class="hero-content flex-col lg:flex-row">
          {{-- <img src="/images/stock/photo-1635805737707-575885ab0820.jpg" class="max-w-sm rounded-lg shadow-2xl" /> --}}
          <div>
            <h1 class="text-5xl font-bold">Halo, [Nama Santri]</h1>
            <p class="py-6">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
            <div class="stats shadow">
  
              <div class="stat place-items-center">
                <div class="stat-title">Downloads</div>
                <div class="stat-value">31K</div>
                <div class="stat-desc">From January 1st to February 1st</div>
              </div>
              
              <div class="stat place-items-center">
                <div class="stat-title">Users</div>
                <div class="stat-value text-secondary">4,200</div>
                <div class="stat-desc text-secondary">↗︎ 40 (2%)</div>
              </div>
              
              <div class="stat place-items-center">
                <div class="stat-title">New Registers</div>
                <div class="stat-value">1,200</div>
                <div class="stat-desc">↘︎ 90 (14%)</div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div> 
    <div class="drawer-side pt-24">
      <label for="my-drawer-3" class="drawer-overlay"></label> 
      <ul class="menu p-4 w-80 h-full bg-base-200">
        <!-- Sidebar content here -->
        <li class="text-lg md:text-xl text-center font-bold pb-4">Menu Utama</li>
        <li class="text-base md:text-lg"><a href='/dashboard'>Home</a></li>
        <li class="text-base md:text-lg"><a>Data Guru</a></li>
        <li class="text-base md:text-lg"><a>Data Santri</a></li>
        <li class="text-base md:text-lg"><a>Penilaian</a></li>
        <li class="text-base md:text-lg"><a>Hasil Penilaian</a></li>
        <li class="text-base md:text-lg"><a>Log Out</a></li>
      </ul>
    </div>
  </div>  
</body>
</html>