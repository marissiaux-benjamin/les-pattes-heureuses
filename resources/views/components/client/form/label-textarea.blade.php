@props(['label_text', 'id', 'for','name', 'placeholder', 'mb'])

<div class="flex flex-col {{ $mb ?? '' }}">
    <label for="{{ $for }}" class="font-sans text-foreground">{{ $label_text }}&nbsp;:</label>
    <textarea name="{{ $name }}" id="{{ $id }}" cols="30" rows="5" placeholder="{{ $placeholder }}" class="font-sans rounded-xl border-2 py-1 px-4 border-secondary text-foreground"></textarea>
</div>

