<div class="flex flex-col justify-center items-center">
    <img src="/Logo.png" alt="Logo-TPQ" {{ $attributes }}>
    @if (request()->routeIs('login') || request()->is('/'))
        <h1 class="text-3xl font-bold text-primary-content uppercase">LOGIN</h1>
    @elseif (request()->routeIs('register'))
        <h1 class="text-3xl font-bold text-primary-content uppercase">REGISTER</h1>
    @endif
</div>

