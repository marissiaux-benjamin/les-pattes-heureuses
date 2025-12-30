<nav class="bg-third h-[3.25rem] w-full px-4 sticky top-0 z-50">
    <h1 class="hidden bg-third">
        Main Navigation
    </h1>
    <div class="flex justify-between items-center h-full">
        <a href="{{ route('home') }}" title="Retourner à la page d'accueil" class="p-1">
            <svg width="32" height="28" viewBox="0 0 32 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_156_20)">
                    <path
                        d="M30.6174 13.6401C31.3905 11.8986 30.9575 10.0163 29.6501 9.43589C28.3428 8.85546 26.6562 9.79666 25.883 11.5381C25.1098 13.2796 25.5429 15.1619 26.8502 15.7423C28.1576 16.3227 29.8442 15.3815 30.6174 13.6401Z"
                        stroke="#222222" stroke-width="2" stroke-miterlimit="10"/>
                    <path
                        d="M5.1461 15.7484C6.45346 15.168 6.88651 13.2857 6.11334 11.5442C5.34018 9.80278 3.65358 8.86158 2.34622 9.44202C1.03886 10.0225 0.605808 11.9047 1.37897 13.6462C2.15214 15.3877 3.83874 16.3289 5.1461 15.7484Z"
                        stroke="#222222" stroke-width="2" stroke-miterlimit="10"/>
                    <path
                        d="M20.78 10.2C22.6081 10.2 24.09 8.14051 24.09 5.6C24.09 3.05949 22.6081 1 20.78 1C18.9519 1 17.47 3.05949 17.47 5.6C17.47 8.14051 18.9519 10.2 20.78 10.2Z"
                        stroke="#222222" stroke-width="2" stroke-miterlimit="10"/>
                    <path
                        d="M11.32 10.2C13.1481 10.2 14.63 8.14051 14.63 5.6C14.63 3.05949 13.1481 1 11.32 1C9.49194 1 8.01 3.05949 8.01 5.6C8.01 8.14051 9.49194 10.2 11.32 10.2Z"
                        stroke="#222222" stroke-width="2" stroke-miterlimit="10"/>
                    <path
                        d="M25.67 23.2C25.67 29.11 21.17 25.22 15.85 25.22C10.53 25.22 6.38 29.11 6.38 23.2C6.38 17.29 10.7 12.51 16.03 12.51C21.36 12.51 25.68 17.3 25.68 23.2H25.67Z"
                        stroke="#222222" stroke-width="2" stroke-miterlimit="10"/>
                    <path
                        d="M13.59 19.49C14.1644 19.49 14.63 18.4289 14.63 17.12C14.63 15.8111 14.1644 14.75 13.59 14.75C13.0156 14.75 12.55 15.8111 12.55 17.12C12.55 18.4289 13.0156 19.49 13.59 19.49Z"
                        fill="#222222"/>
                    <path
                        d="M18.51 19.49C19.0844 19.49 19.55 18.4289 19.55 17.12C19.55 15.8111 19.0844 14.75 18.51 14.75C17.9356 14.75 17.47 15.8111 17.47 17.12C17.47 18.4289 17.9356 19.49 18.51 19.49Z"
                        fill="#222222"/>
                    <path
                        d="M11.62 21.62C11.34 21.57 11.18 21.88 11.42 22.02C12.4 22.61 14.07 23.72 16.02 23.72C17.97 23.72 19.67 22.61 20.67 22.02C20.91 21.88 20.75 21.57 20.47 21.62C19.51 21.78 17.99 22.07 16.02 22.07C14.05 22.07 12.56 21.79 11.63 21.63L11.62 21.62Z"
                        fill="#222222"/>
                </g>
                <defs>
                    <clipPath id="clip0_156_20">
                        <rect width="32" height="27.48" fill="white"/>
                    </clipPath>
                </defs>
            </svg>
        </a>


        <input type="checkbox" id="checkbox" class="mobile-menu__checkbox">
        <label for="checkbox" class="mobile-menu__btn">
            <div class="mobile-menu__icon rounded-full before:rounded-full after:rounded-full"></div>
        </label>
        <div class="mobile-menu__container bg-third">
            <ul class="mobile-menu__list flex flex-col justify-around gap-11">
                @foreach($links as $link)
                    <li>
                        @if(request()->url() !== $link['url'])
                            <a href="{{ $link['url'] }}"
                               class="nav-link font-serif font-black text-3xl md:font-normal md:text-base">{{ $link['name'] }}</a>
                        @else
                            <a href="{{ $link['url'] }}"
                               class="nav-link-selected font-serif font-black text-3xl text-foreground md:font-normal md:text-base">
                                {{ $link['name'] }}
                            </a>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
