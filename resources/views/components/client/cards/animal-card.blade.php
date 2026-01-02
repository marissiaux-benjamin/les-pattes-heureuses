@props(['image', 'name', 'gender', 'age', 'spicies', 'breed', 'mb'])

<article class="w-full sm:w-2/5 bg-third text-center p-5 rounded-xl {{ $mb ?? '' }}">
    <div class="aspect-square overflow-hidden w-full rounded-xl mb-5">
        <img src="{{ $image }}" alt="Chat gris couché sur un appui de fenêtre."
             class="w-full h-full object-cover">
    </div>
    <div class="flex gap-5 justify-center items-baseline mb-3">
        <h2 class="font-serif font-black text-3xl">
            {{ $name }}
        </h2>

        @if($gender === 'mâle')
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M8.66406 4.96442C12.7586 4.96448 16.0781 8.28389 16.0781 12.3785C16.0781 16.473 12.7586 19.7925 8.66406 19.7925C4.56948 19.7925 1.25005 16.4731 1.25 12.3785C1.25 8.28385 4.56946 4.96442 8.66406 4.96442Z"
                    stroke="#222222" stroke-width="2.5"/>
                <path d="M14.825 6.44839L19.9848 1.28851" stroke="#222222" stroke-width="2.5"
                      stroke-linecap="round"/>
                <path d="M19.9849 6.83345L20.0234 1.25H14.1704" stroke="#222222" stroke-width="2.5"
                      stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        @else
            <svg width="18" height="28" viewBox="0 0 18 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="9" cy="9" r="7.75" transform="matrix(-1 0 0 1 18 0)" stroke="#222222" stroke-width="2.5"/>
                <path d="M9 17.916V26.7478" stroke="#222222" stroke-width="2.5" stroke-linecap="round"/>
                <path d="M13.7103 21.9534H4.28977" stroke="#222222" stroke-width="2.5" stroke-linecap="round"/>
            </svg>

        @endif

    </div>
    <div class="flex flex-col gap-4 justify-around mb-7">
        <p class="hidden">
            Sexe&nbsp;: {{ $gender ?? '' }}
        </p>
        <p class="font-sans text-foreground">
            Âge&nbsp;: {{ $age ?? '' }} ans
        </p>
        <p class="font-sans text-foreground">
            Espèce&nbsp;: {{ $spicies ?? '' }}
        </p>
        <p class="font-sans text-foreground">
            Race&nbsp;: {{ $breed ?? '' }}
        </p>
    </div>

    <x-client.buttons.button text="Voir plus" route="{{ route('animals.show') }}"
                             title="Voir les détail concernant {{ $name }}"/>
</article>
