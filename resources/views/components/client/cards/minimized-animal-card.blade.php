@props(['name', 'picture', 'alt', 'route'])

    <div class="bg-third px-5 py-5 h-full cards-width rounded-md snap-center">
        <img src="{{ $picture }}" alt="{{ $alt }}" width="115" height="115"
             class="rounded-regular aspect-square object-cover mb-4">
        <p class="font-serif font-black text-center">
            <a href="{{ $route }}" class="px-4 pt-2 hover:underline">
                {{ $name }}&nbsp;
            </a>
        </p>
    </div>
