@props(['label_text', 'small', 'id', 'for','name', 'input_type', 'input_placeholder', 'mb'])

<div class="flex flex-col {{ $mb ?? '' }}">
    <label for="{{ $for }}">{{ $label_text }} <small>{{ $small ?? '' }}</small>&nbsp;:</label>

    <input type="{{ $input_type }}" name="{{ $name }}" id="{{ $id }}" placeholder="{{ $input_placeholder ?? '' }}"
           class="font-sans rounded-full border-2 py-1 px-4 border-secondary text-foreground">
</div>
