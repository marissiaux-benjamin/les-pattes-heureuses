<x-settings.layout>

    <x-client.bright-section pb="py-7">
        <article class="mb-6 wrapper">
            <x-client.buttons.back-button/>
            <h2 class="hidden">
                Photo de l'animal
            </h2>

            <div class="flex gap-3 snap-x overflow-scroll mb-6 mt-3">
                <div class="aspect-square overflow-hidden min-w-[16rem] rounded-xl m-auto snap-center">
                    <img src="{{ asset('assets/images/bono.webp') }}" alt="photo de Bono"
                         class="w-full h-full object-cover">
                </div>
                <div class="aspect-square overflow-hidden min-w-[16rem] rounded-xl m-auto snap-center">
                    <img src="{{ asset('assets/images/bono.webp') }}" alt="photo de Bono"
                         class="w-full h-full object-cover">
                </div>
                <div class="aspect-square overflow-hidden min-w-[16rem] rounded-xl m-auto snap-center">
                    <img src="{{ asset('assets/images/bono.webp') }}" alt="photo de Bono"
                         class="w-full h-full object-cover">
                </div>
            </div>
        </article>

        <h1 class="main-titles wrapper font-black font-serif text-fourth mb-4">
            Bono
        </h1>
        <div class="mb-7 wrapper">
            <p class="font-sans font-bold text-foreground mb-3">
                Sexe&nbsp;: <span class="text-fourth font-normal">Mâle</span>
            </p>
            <p class="font-sans font-bold text-foreground mb-3">
                Né en&nbsp;: <span class="font-normal">2021 (<span class="text-fourth">4 ans</span>)</span>
            </p>
            <p class="font-sans font-bold text-foreground mb-3">
                Race&nbsp;: <span class="text-fourth font-normal">Chartreux</span>
            </p>
            <p class="font-sans font-bold text-foreground mb-3">
                Arrivée au refuge&nbsp;: <span class="font-normal">12/08/2025</span>
            </p>
            <p class="font-sans font-bold text-foreground mb-3">
                Pathologie(s)&nbsp;: <span class="font-normal"><span
                        class="text-fourth">aucune</span> pathologie.</span>
            </p>
            <div class="font-sans font-bold text-foreground">
                <p>
                    A propos de Bono&nbsp;:
                </p>
                <p class="font-normal leading-7">
                    Bono a été trouvé sans jamais être réclamé. C’est un chat assez craintif mais il s’entend bien avec
                    les autres chats. On espère qu’il pourra s’habituer à la présence d’humain autour de lui.
                </p>
            </div>
        </div>

        <div class="w-fit mb-7 m-auto hidden-button relative">
            <a href="#" id="button" title="Afficher le formulaire d'adoption."
               class="flex items-center gap-4 w-fit py-1 px-6 bg-fourth text-bright font-sans font-medium rounded-full transition-all duration-500 ease-in-out hover:bg-foreground">
                M'adopter
                <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg"
                     class="icon-reversed transition-all duration-200" id="button-arrow">
                    <path d="M1 5L5 1L9 5" stroke="#FAFAFA" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
            </a>
        </div>

        {{-- Mettre un if($adopted) qui va afficher le formulaire ou pas en fonction de si l'animal est adopté ou non. --}}
        <form action="{{ route('animals.adpoted') }}" id="adoption-form" method="POST"
              class="displayed-form transition-all duration-300 wrapper">

            @csrf

            <fieldset class="border-2 p-4 rounded-xl">
                <legend class="px-3 font-sans">
                    Formulaire d'adoption
                </legend>
                <x-client.form.label-input name="name"
                                           for="name"
                                           id="name"
                                           label_text="Nom"
                                           input_type="text"
                                           input_placeholder="John Doe"
                                           small="(complet)"
                                           mb="mb-7"
                />
                <x-client.form.label-input name="email"
                                           for="email"
                                           id="email"
                                           label_text="Email"
                                           input_type="email"
                                           input_placeholder="john@gmail.com"
                                           mb="mb-7"
                />
                <x-client.form.label-input name="tel"
                                           for="tel"
                                           id="tel"
                                           label_text="Numéro de Téléphone"
                                           input_type="tel"
                                           input_placeholder="0659 45 76 02"
                                           mb="mb-7"
                />
                <x-client.form.label-input name="address"
                                           for="address"
                                           id="address"
                                           label_text="Addresse"
                                           small="(rue et numéro)"
                                           input_type="text"
                                           input_placeholder="Rue de la Broche, 45"
                                           mb="mb-7"
                />
                <x-client.form.label-input name="postal_code"
                                           for="postal_code"
                                           id="postal_code"
                                           label_text="Code postal"
                                           input_type="text"
                                           input_placeholder="Rue de la Broche, 45"
                                           mb="mb-7"
                />
                <div class="mb-7 flex flex-col gap-1.5">
                    <label for="already_owner">Avez-vous déjà eu des animaux&nbsp;?</label>
                    <select name="already_owner" id="already_owner"
                            class="border-2 border-secondary rounded-full py-1 px-4 w-fit">
                        <option value="" selected></option>
                        <option value="oui">Oui</option>
                        <option value="non">Non</option>
                    </select>
                </div>

                <x-client.form.label-textarea label_text="Un message supplémentaire ?"
                                              name="message"
                                              id="message"
                                              for="message"
                                              placeholder="J’ai déjà un chat (Scottish folds) de 4 ans et un poisson rouge..."
                                              mb="mb-7"
                />

                <x-client.form.submit-button value="Envoyer ma demande"/>
            </fieldset>
        </form>
    </x-client.bright-section>
    <svg width="375" height="74" viewBox="0 0 375 74" fill="none" xmlns="http://www.w3.org/2000/svg"
         class="w-full h-auto min-w-full z-10">
        <path
            d="M281.25 0.345818C326.719 3.44705 362.5 23.0012 375 32.4772V74L0 74V8.09889C14.6484 16.2827 55.1953 26.464 97.8516 26.464C151.172 26.464 224.414 -3.53072 281.25 0.345818Z"
            fill="#9CA3AF"/>
    </svg>

    <x-client.dark-section pb="pb-7" wrapper="wrapper">
        <h1 class="main-titles font-black font-serif text-bright mb-8">
            Les <span class="text-third">autres chats</span> à adopter
        </h1>

        <div class="flex gap-3 snap-x overflow-scroll md:flex md:flex-wrap md:justify-center">
            <x-client.cards.minimized-animal-card text="Elise" name="Bono" route="{{ route('animals.show') }}"
                                                  picture="{{ asset('assets/images/bono_2.jpg') }}"
                                                  alt="Photo d'Elise, la propriétaire du refuge."/>
            <x-client.cards.minimized-animal-card text="Elise" name="Bono" route="{{ route('animals.show') }}"
                                                  picture="{{ asset('assets/images/bono_2.jpg') }}"
                                                  alt="Photo d'Elise, la propriétaire du refuge."/>
            <x-client.cards.minimized-animal-card text="Elise" name="Bono" route="{{ route('animals.show') }}"
                                                  picture="{{ asset('assets/images/bono_2.jpg') }}"
                                                  alt="Photo d'Elise, la propriétaire du refuge."/>
            <x-client.cards.minimized-animal-card text="Elise" name="Bono" route="{{ route('animals.show') }}"
                                                  picture="{{ asset('assets/images/bono_2.jpg') }}"
                                                  alt="Photo d'Elise, la propriétaire du refuge."/>
            <x-client.cards.minimized-animal-card text="Elise" name="Bono" route="{{ route('animals.show') }}"
                                                  picture="{{ asset('assets/images/bono_2.jpg') }}"
                                                  alt="Photo d'Elise, la propriétaire du refuge."/>
        </div>
    </x-client.dark-section>

</x-settings.layout>
