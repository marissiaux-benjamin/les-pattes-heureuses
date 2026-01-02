<?php
$nav_links = [
    [
        "name" => "dashboard.dashboard_link",
        "view" => "dashboard",
        "icon" => "home-icon",
        "alt" => "icon de maison",
        "url" => route('dashboard')
    ],
    [
        "name" => "dashboard.stats_link",
        "view" => "statistic.index",
        "icon" => "stat-icon",
        "alt" => "icon de graphique",
        "url" => route('statistic.index')
    ],
    [
        "name" => "dashboard.animals_link",
        "view" => "animal.index",
        "icon" => "animal-icon",
        "alt" => "icon de pattes",
        "url" => route('animal.index')
    ],
    [
        "name" => "dashboard.members_link",
        "view" => "member.index",
        "icon" => "member-icon",
        "alt" => "icon de contact",
        "url" => route('member.index')
    ],
    [
        "name" => "dashboard.notifications_link",
        "view" => "notification.index",
        "icon" => "notification-icon",
        "alt" => "icon de cloche",
        "url" => route('notification.index')
    ],
];
?>


    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>
<body class="flex h-screen">
<header class=" w-1/5 h-full bg-background shadow-lg">
    <nav class="h-[95%] text-center pb-4 pt-14 flex flex-col">
        <div class="self-center">
            <svg width="100" height="86" viewBox="0 0 100 86" fill="none" xmlns="http://www.w3.org/2000/svg"
                 class="m-auto mb-2">
                <g clip-path="url(#clip0_441_137)">
                    <path
                        d="M95.6792 42.6873C98.0954 37.2373 96.7421 31.3467 92.6566 29.5302C88.5711 27.7137 83.3005 30.6592 80.8843 36.1092C78.4682 41.5592 79.8215 47.4499 83.907 49.2664C87.9925 51.0829 93.2631 48.1373 95.6792 42.6873Z"
                        stroke="#222222" stroke-width="4" stroke-miterlimit="10"/>
                    <path
                        d="M16.0815 49.2855C20.167 47.469 21.5203 41.5783 19.1042 36.1283C16.688 30.6784 11.4174 27.7328 7.3319 29.5493C3.2464 31.3658 1.89312 37.2565 4.30926 42.7065C6.7254 48.1565 11.996 51.102 16.0815 49.2855Z"
                        stroke="#222222" stroke-width="4" stroke-miterlimit="10"/>
                    <path
                        d="M64.9375 31.9215C70.6502 31.9215 75.2813 25.4762 75.2813 17.5256C75.2813 9.57491 70.6502 3.12964 64.9375 3.12964C59.2248 3.12964 54.5938 9.57491 54.5938 17.5256C54.5938 25.4762 59.2248 31.9215 64.9375 31.9215Z"
                        stroke="#222222" stroke-width="4" stroke-miterlimit="10"/>
                    <path
                        d="M35.375 31.9215C41.0877 31.9215 45.7188 25.4762 45.7188 17.5256C45.7188 9.57491 41.0877 3.12964 35.375 3.12964C29.6623 3.12964 25.0312 9.57491 25.0312 17.5256C25.0312 25.4762 29.6623 31.9215 35.375 31.9215Z"
                        stroke="#222222" stroke-width="4" stroke-miterlimit="10"/>
                    <path
                        d="M80.2188 72.6055C80.2188 91.1011 66.1563 78.9272 49.5313 78.9272C32.9063 78.9272 19.9375 91.1011 19.9375 72.6055C19.9375 54.1099 33.4375 39.1506 50.0938 39.1506C66.75 39.1506 80.25 54.1412 80.25 72.6055H80.2188Z"
                        stroke="#222222" stroke-width="4" stroke-miterlimit="10"/>
                    <path
                        d="M42.4688 60.9949C44.2637 60.9949 45.7188 57.6742 45.7188 53.5779C45.7188 49.4816 44.2637 46.1609 42.4688 46.1609C40.6738 46.1609 39.2188 49.4816 39.2188 53.5779C39.2188 57.6742 40.6738 60.9949 42.4688 60.9949Z"
                        fill="#222222"/>
                    <path
                        d="M57.8438 60.9949C59.6387 60.9949 61.0938 57.6742 61.0938 53.5779C61.0938 49.4816 59.6387 46.1609 57.8438 46.1609C56.0488 46.1609 54.5938 49.4816 54.5938 53.5779C54.5938 57.6742 56.0488 60.9949 57.8438 60.9949Z"
                        fill="#222222"/>
                    <path
                        d="M36.3124 67.6609C35.4374 67.5045 34.9374 68.4746 35.6874 68.9128C38.7499 70.7592 43.9687 74.233 50.0624 74.233C56.1562 74.233 61.4687 70.7592 64.5937 68.9128C65.3437 68.4746 64.8437 67.5045 63.9687 67.6609C60.9687 68.1617 56.2187 69.0692 50.0624 69.0692C43.9062 69.0692 39.2499 68.193 36.3437 67.6922L36.3124 67.6609Z"
                        fill="#222222"/>
                </g>
                <defs>
                    <clipPath id="clip0_441_137">
                        <rect width="100" height="86" fill="white"/>
                    </clipPath>
                </defs>
            </svg>

            <p class="font-serif font-black text-foreground">
                Les Pattes Heureuses
            </p>
        </div>
        <ul class="flex flex-col items-start h-full gap-10 text-left px-6 mt-20">
            @foreach($nav_links as $link)
                <li class="w-fit">
                    @if(request()->url() !== $link['url'])
                        <a wire:navigate wire:click.prevent href="{{ route($link['view']) }}"
                           class="relative flex flex-row gap-4 py-2 px-4 font-sans rounded-md after:transition-all after:duration-300 after:w-[0%] after:h-0.5 after:bg-fourth after:rounded-full after:absolute after:bottom-0 hover:after:w-[85%]">
                            <img src="{{ asset("assets/svg/" . $link["icon"] . ".svg") }}" alt="{{ $link['alt'] }}">
                            {{ __($link['name']) }}
                        </a>
                    @else
                        <a wire:navigate wire:click.prevent href="{{ route($link['view']) }}"
                           class="relative flex flex-row gap-4 py-2 px-4 font-sans rounded-md after:w-[85%] after:h-0.5 after:bg-fourth after:absolute after:bottom-0 after:rounded-full">
                            <img src="{{ asset("assets/svg/" . $link["icon"] . ".svg") }}" alt="{{ $link['alt'] }}">
                            {{ __($link['name']) }}
                        </a>
                    @endif

                </li>
            @endforeach
            <li class="mt-auto w-fit">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                            class="relative flex flex-row gap-4 py-2 px-4 font-sans rounded-md text-error-color
                  hover:bg-error-color/10 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24" fill="none"
                             stroke="#CB2121" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m16 17 5-5-5-5"/>
                            <path d="M21 12H9"/>
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                        </svg>
                        {{ __('dashboard.logout_text') }}
                    </button>
                </form>
            </li>
        </ul>
    </nav>
</header>
<main class="w-full h-full overflow-y-auto">
    {{ $slot }}
</main>

@livewireScripts
</body>
</html>
