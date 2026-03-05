<div
    class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-auth bg-[--dark-color]"
    style="background-image: url({{ asset('images/portadas/futbol-banner.jpg') }});"
>

    <div class="w-full sm:max-w-lg p-6 h-auto bg-[--complementary-primary-color] bg-opacity-80 shadow-md sm:rounded-3xl overflow-y-auto">
        <div class="w-full flex justify-center mb-4">
            <img
                src="/images/logos/logo-lafage.png"
                class="max-w-[12rem]"
                alt=""
            >
        </div>
        {{ $slot }}
    </div>
</div>
