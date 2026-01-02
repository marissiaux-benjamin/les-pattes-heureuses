<?php

use Livewire\Component;

new class extends Component {
    public $animal;

    public function mount(string $id): void
    {
        $this->animal = \App\Models\Animal::findOrFail($id);
    }

    public function render()
    {
        return view('pages.animal.⚡show');
    }

};
?>

<div class="min-h-screen flex items-center justify-center">
    <div class="self-start ml-10 mt-10">
        <x-client.buttons.back-button/>
    </div>
    <section class="w-[50%] mx-auto bg-white rounded-lg shadow-md p-6">
        <div class="border-b pb-4 mb-4">
            @if($animal->photo)
                <img src="{{ Storage::url($animal->photo) }}" alt="{{ $animal->name }}">
            @endif
            <h1 class="text-2xl font-serif font-bold text-fourth">
                {{ $animal->name }}
            </h1>
            <p class="text-sm text-secondary-color">
                {{ $animal->breed->specie->name }}
            </p>
        </div>

        <p class="text-gray-700 mb-10">
            {{ $animal->description }}
        </p>

        <ul class="space-y-2 text-gray-700">
            <li class="flex justify-between">
                <span class="font-semibold">Date de naissance</span>
                @if($animal->age)
                    <span>{{ $animal->age->format('d F Y') }} ({{ $animal->age() }} ans)</span>
                @endif
            </li>


            <li class="flex justify-between">
                <span class="font-semibold">Race</span>
                <span>{{ $animal->breed->name }}</span>
            </li>

            <li class="flex justify-between">
                <span class="font-semibold">Pelage</span>
                <span>{{ $animal->coat->name }}</span>
            </li>
        </ul>
    </section>
</div>


