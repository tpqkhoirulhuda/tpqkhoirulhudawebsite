<!DOCTYPE html>
<html lang="en">
<x-head/>
<body>
    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content flex-col">
            <div class="flex flex-col text-center items-center justify-center">
                <img src="/Logo.png" alt="Logo-TPQ" class="w-64 h-64">
                <h1 class="text-4xl md:text-5xl font-bold">Login</h1>
                <p class="py-6">------------------------------------------------------------</p>
            </div>
            <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
                <div class="card-body">
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
                        <label class="label">
                            <div class="form-control">
                                <label class="label cursor-pointer space-x-2">
                                    <span class="label-text-alt md:label-text">Ingatkan saya</span> 
                                    <input type="checkbox" checked="checked" class="checkbox checkbox-xs md:checkbox-sm" />
                                </label>
                            </div>
                            <a href="/forgot-password" class="label-text-alt md:label-text link link-hover">Lupa password?</a>
                        </label>
                    </div>
                    <div class="form-control mt-2">
                        <button class="btn btn-primary">Login</button>
                        <a href="/daftar" class="label-text-alt md:label-text link link-hover mt-2 text-end">Daftar akun?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>