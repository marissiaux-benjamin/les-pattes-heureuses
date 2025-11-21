@props(['relative', 'height'])
<section class="dark-section py-7 wrapper {{ $relative??'' }} {{ $height??'' }}">
    {{ $slot }}
</section>
