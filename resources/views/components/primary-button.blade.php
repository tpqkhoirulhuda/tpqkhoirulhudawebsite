<button {{ $attributes->merge(['type' => 'submit', 'class' => 'flex w-full items-center btn btn-accent']) }}>
    {{ $slot }}
</button>
