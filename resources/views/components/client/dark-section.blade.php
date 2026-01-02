@props(['relative', 'height','pt', 'pb', 'wrapper', 'media_query'])
<section class="dark-section {{ $wrapper ?? '' }} {{ $pb ?? '' }} {{ $pt ?? '' }} {{ $relative??'' }} {{ $height??'' }} {{ $media_query ?? '' }} ">
    {{ $slot }}
</section>
