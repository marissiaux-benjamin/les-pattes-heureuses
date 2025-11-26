@props(['text', 'title', 'route'])
<div class="relative">
    <a href="{{ $route }}" title="{{ $title }}"
       class="py-1 px-6 bg-fourth text-bright font-sans font-medium rounded-full transition-all duration-300 hover:bg-foreground">{{ $text }}</a>
</div>
