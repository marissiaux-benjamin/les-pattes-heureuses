@props(['pb'])

<section class="pt-7 {{ $pb ?? '' }}">
    <x-client.wrapper>
        {{ $slot }}
    </x-client.wrapper>
</section>
