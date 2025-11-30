<x-settings.layout>
    <div>
        <x-client.dark-section height="h-fit" relative="relative" pt="pt-7">
            <div class="wrapper">
                <div class="rounded-xl tiles relative">
                    <h1 class="main-titles text-foreground">
                        Venez <span class="text-[#8BAF9D]">découvrir</span> le refuge Les Pattes Heureuses&nbsp;!
                    </h1>
                </div>
                <svg width="22" height="29" viewBox="0 0 22 29" fill="none" xmlns="http://www.w3.org/2000/svg"
                     class="ml-[85%]">
                    <path d="M1.81103 27.9893L22 0H0V27.4042C0 28.3747 1.2433 28.7763 1.81103 27.9893Z" fill="#FAFAFA"/>
                </svg>
            </div>

            <div class="translate-y-10">
                <img src="{{ asset('/assets/images/animal-home.png') }}"
                     alt="Une image représentant un chien et un chat côte à côte."
                     title="Un chien et un chat côte à côte."
                     class="m-auto z-20 md:max-w-4/5 md:m-0">
                <svg viewBox="0 0 375 74" fill="none" xmlns="http://www.w3.org/2000/svg"
                     class="w-full h-auto min-w-full -translate-y-10 z-10">
                    <path
                        d="M281.25 0.345818C326.719 3.44705 362.5 23.0012 375 32.4772V74L0 74V8.09889C14.6484 16.2827 55.1953 26.464 97.8516 26.464C151.172 26.464 224.414 -3.53072 281.25 0.345818Z"
                        fill="#FAFAFA"/>
                </svg>
            </div>
        </x-client.dark-section>
    </div>

    <x-client.bright-section pb="pb-7">
        <h1 class="font-serif main-titles text-foreground font-black mb-4">
            <span class="text-fourth">Bienvenue</span> dans notre refuge&nbsp;!
        </h1>
        <p class="font-sans line-height-text">
            Ici, chaque animal trouve une <span class="text-fourth font-medium">seconde chance</span>. Nous accueillons,
            soignons et aimons nos
            compagnons à quatre pattes en attente d’un foyer chaleureux. Notre mission&nbsp;: leur offrir <span
                class="text-fourth font-medium">sécurité</span>, <span class="text-fourth font-medium">soins</span> et
            <span class="text-fourth font-bold">affection</span>, tout
            en sensibilisant le public à l’adoption responsable. Venez <span class="text-fourth font-medium">rencontrer nos pensionnaires</span>
            et partagez avec eux
            un
            moment de tendresse&nbsp;!
        </p>
        <img src="{{ asset('/assets/images/animal-home-section-2.png') }}"
             alt="Un chat tigré et un chien blanc et noir côte à côte."
             title="Deux animaux l'un à côté de l'autre."
             class="translate-y-[52px]">
    </x-client.bright-section>

    <div>
        <x-client.dark-section pt="pt-7">
            <svg width="15" height="19" viewBox="0 0 15 19" fill="none" xmlns="http://www.w3.org/2000/svg"
                 class="ml-4 translate-0.5">
                <path d="M13.1863 0.420637L0 18.8814H15V1.00187C15 0.0290349 13.7517 -0.370994 13.1863 0.420637Z"
                      fill="#FAFAFA"/>
            </svg>
            <div class="rounded-xl tiles mb-4">
                <h1 class="main-titles text-foreground">
                    Plus de <span class="text-fourth">1250</span> animaux Adoptés&nbsp;!
                </h1>
            </div>
            <p class="font-sans text-bright line-height-text relative">
                Depuis la création de notre refuge en 2001, nous avons réussi à loger 1784 animaux ! Nous avons un suivi
                régulier durant les 6 premiers mois après l’adoption pour voir si tout se passe bien au sein du nouvel
                environnement.
            </p>
        </x-client.dark-section>
        <svg width="375" height="67" viewBox="0 0 375 67" fill="none" xmlns="http://www.w3.org/2000/svg" class="z-10">
            <path
                d="M93.75 66.7366C48.2812 63.9267 12.5 46.209 0 37.623V0H375V59.7117C360.352 52.2966 320.391 37.4662 277.734 37.4662C224.414 37.4662 150.586 70.2491 93.75 66.7366Z"
                fill="#9CA3AF"/>
        </svg>

    </div>

    <x-client.bright-section pb="pb-7">
        <h1 class="font-serif text-foreground main-titles font-black mb-4">
            Les animaux sont <span class="text-fourth">chouchoutés</span>&nbsp;!
        </h1>
        <p class="font-sans text-foreground line-height-text mb-6">
            Nous avons actuellement <span class="text-fourth font-medium">20 animaux</span> au refuge. Certains sont
            <span
                class="text-fourth font-medium">déjà adoptés</span> et en attente de leur nouvelle
            famille et d’autres n’attendent que vous&nbsp;!
        </p>
        <x-client.buttons.button text="Voir nos pensionnaires" route="{{ route('animals') }}"
                                 title="Aller vers la page nos chouchous"/>

    </x-client.bright-section>

    <x-client.dark-section relative="relative" pt="pt-8">
        <h1 class="font-serif text-bright main-titles font-black mb-4">
            Notre équipe <span class="text-third">est présente</span> pour vous et pour les animaux&nbsp;!
        </h1>
        <p class="font-sans text-bright line-height-text mb-6">
            Voici tous les membres de notre équipe dévouée et passionnée par nos amis les animaux.
        </p>

        <div class="flex gap-3 snap-x overflow-scroll mb-6">
            <x-client.cards.staff-card text="Elise" role="Fondatrice" picture="{{ asset('assets/images/elise.jpg') }}"
                                       alt="Photo d'Elise, la propriétaire du refuge."/>
            <x-client.cards.staff-card text="Pierre" role="Bénénvole" picture="{{ asset('assets/images/pierre.jpg') }}"
                                       alt="Photo d'Elise, la propriétaire du refuge."/>
            <x-client.cards.staff-card text="Jaqueline" role="Bénénvole"
                                       picture="{{ asset('assets/images/jacqueline.jpg') }}"
                                       alt="Photo d'Elise, la propriétaire du refuge."/>
        </div>

        <x-client.buttons.bright-button text="Nous contacter" route="{{ route('contact') }}"
                                        title="Aller sur la page de contact"/>
    </x-client.dark-section>


</x-settings.layout>

