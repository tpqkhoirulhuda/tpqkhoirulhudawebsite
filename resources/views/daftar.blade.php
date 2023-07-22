<!DOCTYPE html>
<html lang="en">
<x-head/>
<body>
    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content flex-col my-6">
            <div class="flex flex-col text-center items-center justify-center">
                <img src="/Logo.png" alt="Logo-TPQ" class="w-64 h-64">
                <h1 class="text-4xl md:text-5xl font-bold">Daftar Akun</h1>
                <p class="py-6">------------------------------------------------------------</p>
            </div>
            <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
                <div class="card-body">
                    <div class="form-control">
                      <label class="label">
                        <span class="label-text">Nama</span>
                      </label>
                      <input type="text" placeholder="nama" required class="input input-bordered" />
                    </div>
                    <div class="form-control">
                      <label class="label">
                        <span class="label-text">Email</span>
                      </label>
                      <input type="text" placeholder="email" required class="input input-bordered" />
                    </div>
                    <div class="form-control">
                      <label class="label">
                        <span class="label-text">Password</span>
                      </label>
                      <input type="password" placeholder="password" required class="input input-bordered" />
                    </div>
                    <div class="form-control">
                      <label class="label">
                        <span class="label-text">Ulangi Password</span>
                      </label>
                    <input type="password" placeholder="password" required class="input input-bordered" />
                    </div>
                    <div class="form-control">
                      <label class="label">
                        <span class="label-text">No Telp</span>
                      </label>
                      <input type="tel" placeholder="no telp" required class="input input-bordered" />
                    </div>
                    <div class="form-control">
                      <label class="label">
                        <span class="label-text">Alamat</span>
                      </label>
                      <input type="text" placeholder="alamat" required class="input input-bordered" />
                    </div>
                    <div class="form-control mt-2">
                        <button class="btn btn-primary">Daftar</button>
                        <a href="/" class="label-text-alt md:label-text link link-hover mt-2 text-end">Sudah punya akun?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>