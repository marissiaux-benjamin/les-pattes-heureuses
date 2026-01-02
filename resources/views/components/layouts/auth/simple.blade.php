<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')
</head>
<body class="min-h-screen antialiased ">
<div class="bg-white flex flex-col lg:flex-row min-h-screen">
    <section
        class="bg-secondary flex flex-col justify-center items-center gap-6
           w-full
           py-10 sm:py-12
           lg:py-0
           lg:w-1/2 lg:min-h-screen">

        <div class="w-full flex justify-center">
            <svg viewBox="0 0 139 118" fill="none" xmlns="http://www.w3.org/2000/svg"
                 class="w-24 sm:w-32 md:w-40 lg:w-1/3">
                <path
                    d="M133.568 58.5C137.568 50.5 135.568 42.5 129.568 39.5C123.568 37.5 116.568 41.5 112.568 49.5C109.568 56.5 111.568 65.5 117.568 67.5C122.568 70.5 130.568 66.5 133.568 58.5ZM20.5685 67.5C26.5685 65.5 28.5685 56.5 25.5685 49.5C21.5685 41.5 14.5685 37.5 8.56846 39.5C2.56846 42.5 0.568464 50.5 4.56846 58.5C7.56846 66.5 15.5685 70.5 20.5685 67.5ZM90.5685 43.5C98.5685 43.5 104.568 34.5 104.568 22.5C104.568 11.5 98.5685 2.5 90.5685 2.5C82.5685 2.5 75.5685 11.5 75.5685 22.5C75.5685 34.5 82.5685 43.5 90.5685 43.5ZM48.5685 43.5C56.5685 43.5 62.5685 34.5 62.5685 22.5C62.5685 11.5 56.5685 2.5 48.5685 2.5C40.5685 2.5 33.5685 11.5 33.5685 22.5C33.5685 34.5 40.5685 43.5 48.5685 43.5ZM111.568 100.5C111.568 127.5 91.5685 109.5 68.5685 109.5C44.5685 109.5 26.5685 127.5 26.5685 100.5C26.5685 74.5 45.5685 53.5 69.5685 53.5C92.5685 53.5 111.568 74.5 111.568 100.5Z"
                    stroke="#FAFAFA" stroke-width="5" stroke-miterlimit="10"/>
                <path
                    d="M58.5685 84.5C60.5685 84.5 62.5685 79.5 62.5685 74.5C62.5685 68.5 60.5685 63.5 58.5685 63.5C55.5685 63.5 53.5685 68.5 53.5685 74.5C53.5685 79.5 55.5685 84.5 58.5685 84.5ZM80.5685 84.5C82.5685 84.5 84.5685 79.5 84.5685 74.5C84.5685 68.5 82.5685 63.5 80.5685 63.5C77.5685 63.5 75.5685 68.5 75.5685 74.5C75.5685 79.5 77.5685 84.5 80.5685 84.5ZM49.5685 93.5L48.5685 95.5C53.5685 98.5 60.5685 103.5 69.5685 103.5C77.5685 103.5 85.5685 98.5 89.5685 95.5C90.5685 95.5 90.5685 93.5 88.5685 93.5L69.5685 95.5L49.5685 93.5Z"
                    fill="#FAFAFA"/>
            </svg>
        </div>

        <h1 class="font-serif text-bright text-2xl sm:text-3xl lg:text-5xl text-center">
            {{ __('auth.title') }}
        </h1>
    </section>

    <section
        class="flex w-full flex-col justify-center
           px-6 sm:px-12 lg:px-20
           py-10
           lg:w-1/2 lg:min-h-screen">

        <div class="rounded-2xl p-6 sm:p-10 lg:p-12 bg-background w-full max-w-xl mx-auto">

            <div class="mb-8">
                <svg width="164" height="164" viewBox="0 0 164 164" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-24 sm:w-32 mx-auto mb-8">
                    <path
                        d="M65 125L108 82M108 82L65 39M108 82H5M108 5H142C146.509 5 150.833 6.79107 154.021 9.97919C157.209 13.1673 159 17.4913 159 22V142C159 146.509 157.209 150.833 154.021 154.021C150.833 157.209 146.509 159 142 159H108"
                        stroke="black" stroke-width="10" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl text-foreground text-center font-serif">
                    {{ __('auth.connexion_title') }}
                </h1>
            </div>

            <div class="flex flex-col gap-6">
                {{ $slot }}
            </div>
        </div>
    </section>

</div>

@fluxScripts
</body>
</html>
