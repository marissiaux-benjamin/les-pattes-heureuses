@props(['text','role','picture','alt'])
<div class="bg-third px-5 py-5 h-full cards-width rounded-md snap-center">
    <img src="{{ $picture }}" alt="{{ $alt }}" width="115" height="115" class="rounded-full aspect-square object-cover mb-6">
    <p class="font-sans text-xs text-center">
        {{ $text }}&nbsp;
    </p>
    <p class="font-sans text-xs text-center font-bold">
       {{ $role }}
    </p>
</div>
