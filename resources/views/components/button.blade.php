<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-[--secondary-color] text-[--light-color] font-semibold rounded-md text-sm px-4 py-2 hover:brightness-[1.25] focus:ring-4 focus:ring-[--light-color]']) }}>
    {{ $slot }}
</button>