@props(['mt', 'mb'])

<div class="w-full {{ $mt ?? '' }} {{ $mb ?? '' }}">
    <form action="#" method="get" class="flex flex-wrap gap-2.5">

        <input type="search" class="rounded-full flex-1 px-4 border-2 text-bright"
               placeholder="Recherchez un prénom">

        <input type="submit" value="Rechercher"
               class="bg-bright text-foreground px-4 rounded-full font-sans transition-all duration-300 hover:bg-foreground hover:text-bright">

        <label for="species" class="hidden">Espèces</label>
        <select name="species" id="species" class="px-4 py-1 bg-bright rounded-full font-sans text-foreground w-full">
            <option value="#" selected>Espèce</option>
            <option value="Chat">Chat</option>
            <option value="Chien">Chien</option>
            <option value="Oiseau">Oiseau</option>
        </select>
    </form>
</div>
