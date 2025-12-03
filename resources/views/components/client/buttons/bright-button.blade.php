@props(['text','title','route'])
<div class="w-fit md:m-auto">
    <a href="{{ $route }}" title="{{ $title }}"
       class="py-1 px-6 bg-bright text-fourth font-sans font-medium rounded-full duration-300 hover:bg-third hover:text-foreground">{{ $text }}</a>
</div>
