@props(['title',])

<x-client.bright-section pb="pb-7" wrapper="wrapper">
    <h1 class="hidden">
        {{ $title }}
    </h1>
    <form action="#" method="post">
        @csrf
        <fieldset class="border-2 p-4 rounded-xl">
            <legend class="font-sans px-3">
                Forumlaire de contact
            </legend>
            <x-client.form.label-input label_text="Nom"
                                       small="(complet)"
                                       for="name"
                                       name="name"
                                       id="name"
                                       input_type="text"
                                       input_placeholder="John Doe"
                                       mb="mb-5"/>

            <x-client.form.label-input label_text="Email"
                                       for="email"
                                       name="email"
                                       id="email"
                                       input_type="email"
                                       input_placeholder="johndoe@gmail.com"
                                       mb="mb-5"/>

            <x-client.form.label-input label_text="Téléphone"
                                       for="phone"
                                       name="phone"
                                       id="phone"
                                       input_type="tel"
                                       input_placeholder="0462 87 98 16"
                                       mb="mb-5"/>

            <x-client.form.label-textarea label_text="Votre message"
                                          for="message"
                                          name="message"
                                          id="message"
                                          placeholder="Bonjour, j’ai des questions concernant l’adoption d’un animal, ..."
                                          mb="mb-7"/>

            <x-client.form.submit-button value="Envoyer"/>
        </fieldset>
    </form>
</x-client.bright-section>
