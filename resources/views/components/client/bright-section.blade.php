@props(['pb', 'wrapper', 'media_query'])

<section class="{{ $wrapper ?? '' }} {{ $pb ?? '' }} {{ $media_query ?? '' }}">
    {{ $slot }}
</section>
