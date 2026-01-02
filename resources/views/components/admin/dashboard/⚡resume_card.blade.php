<?php

use Livewire\Component;

new class extends Component {
    public int $number;
    public String $legend;
};
?>

<div>
    <section class="bg-background shadow-lg rounded-lg text-center py-10 px-10">
        <p wire:model.live="number" class="main-titles font-medium mb-3">
            {{ $number }}
        </p>
        <h1 class="desc-text font-light">
            {{ $legend }}
        </h1>
    </section>
</div>
