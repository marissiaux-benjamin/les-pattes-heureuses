<x-settings.layout>

    <x-client.bright-section pb="pt-20" media_query="lg:pt-30">
        <div class="wrapper lg:text-center h-[30vh]">
            <h1 class="main-titles font-serif font-black">
                Faites <span class="text-fourth">connaissance</span> avec nos chouchous&nbsp;!
            </h1>
            <p class="font-sans text-secondary mb-7 line-height-text">
                Scrollez pour explorer qui vit chez nous&nbsp;! Et peut être que vous trouverai l’animal qui vous
                correspondra&nbsp;!
            </p>
        </div>
        <svg width="375" height="74" viewBox="0 0 375 74" fill="none" xmlns="http://www.w3.org/2000/svg"
             class="w-full h-auto min-w-full z-10">
            <path
                d="M281.25 0.345818C326.719 3.44705 362.5 23.0012 375 32.4772V74L0 74V8.09889C14.6484 16.2827 55.1953 26.464 97.8516 26.464C151.172 26.464 224.414 -3.53072 281.25 0.345818Z"
                fill="#9CA3AF"/>
        </svg>
    </x-client.bright-section>

    <x-client.dark-section wrapper="wrapper">
        <h1 class="main-titles font-black font-serif text-bright mb-4">
            Nos Chouchous
        </h1>
        <div class="flex flex-wrap justify-center gap-6 pb-7">
            <x-client.form.search-bar mb="mb-7"/>

            <x-client.cards.animal-card image="{{ asset('assets/images/bono.webp') }}" name="Bono"
                                        gender="mâle" age="4"
                                        spicies="Chat" breed="Chartreux"/>

            <x-client.cards.animal-card image="{{ asset('assets/images/bono.webp') }}" name="Laly"
                                        gender="female" age="4"
                                        spicies="Chat" breed="Chartreux"/>

            <x-client.cards.animal-card image="{{ asset('assets/images/bono.webp') }}" name="Bruce"
                                        gender="mâle" age="4"
                                        spicies="Chat" breed="Chartreux"/>

            <x-client.cards.animal-card  image="{{ asset('assets/images/bono.webp') }}" name="Marius"
                                        gender="mâle" age="4"
                                        spicies="Chat" breed="Chartreux"/>

            <x-client.cards.animal-card image="{{ asset('assets/images/bono.webp') }}" name="Molly" gender="female"
                                        age="4"
                                        spicies="Chat" breed="Chartreux"/>
        </div>

    </x-client.dark-section>

</x-settings.layout>
