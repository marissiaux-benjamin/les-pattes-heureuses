@props(['value', 'mb'])

<div class="flex flex-col {{ $mb ?? '' }} hover:cursor-pointer">
    <input type="submit"
           value="{{ $value }}"
           class="py-1 px-6 bg-fourth text-bright font-sans font-medium rounded-full transition-all duration-300 hover:bg-foreground">
</div>
