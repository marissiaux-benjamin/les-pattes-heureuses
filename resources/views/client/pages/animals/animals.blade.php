<x-settings.layout>

    <x-client.bright-section pb="0">
        <h1 class="main-titles font-serif font-black">
            Faites <span class="text-fourth">connaissance</span> avec nos chouchous&nbsp;!
        </h1>
        <p class="font-sans text-secondary mb-7 line-height-text">
            Scrollez pour explorer qui vit chez nous&nbsp;! Et peut être que vous trouverai l’animal qui vous
            correspondra&nbsp;!
        </p>
        <svg width="375" height="74" viewBox="0 0 375 74" fill="none" xmlns="http://www.w3.org/2000/svg"
             class="-translate-x-4 min-w-full ">
            <path
                d="M281.25 0.345818C326.719 3.44705 362.5 23.0012 375 32.4772V74L0 74V8.09889C14.6484 16.2827 55.1953 26.464 97.8516 26.464C151.172 26.464 224.414 -3.53072 281.25 0.345818Z"
                fill="#9CA3AF"/>
        </svg>
    </x-client.bright-section>


    <x-client.dark-section>
        <h1 class="main-titles font-black font-serif text-bright mb-4">
            Nos Chouchous
        </h1>
        <x-client.form.search-bar mb="mb-7"/>

        <article class="w-full bg-third text-center p-5 rounded-xl">
            <img src="{{ asset('assets/images/bono.webp') }}" alt="Chat gris couché sur un appui de fenêtre." class="rounded-2xl mb-5">
            <div class="flex gap-5 justify-center">
                <h2 class="font-serif font-black text-2xl">
                    Bono
                </h2>
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.66406 4.96442C12.7586 4.96448 16.0781 8.28389 16.0781 12.3785C16.0781 16.473 12.7586 19.7925 8.66406 19.7925C4.56948 19.7925 1.25005 16.4731 1.25 12.3785C1.25 8.28385 4.56946 4.96442 8.66406 4.96442Z"
                        stroke="#222222" stroke-width="2.5"/>
                    <path d="M14.825 6.44839L19.9848 1.28851" stroke="#222222" stroke-width="2.5"
                          stroke-linecap="round"/>
                    <path d="M19.9849 6.83345L20.0234 1.25H14.1704" stroke="#222222" stroke-width="2.5"
                          stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <p class="font-sans text-foreground">
                Âge&nbsp;: 4 ans
            </p>
            <p class="font-sans text-foreground">
                Espèce&nbsp;: Chat
            </p>
            <p class="font-sans text-foreground">
                Race&nbsp;: Chartreux
            </p>
        </article>


    </x-client.dark-section>

</x-settings.layout>
