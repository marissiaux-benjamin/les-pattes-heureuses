<?php

use App\Models\Adoption;
use App\Models\Animal;
use Livewire\Component;

new class extends Component {
    public $adoption;
    public $animal;

    public function mount(string $id): void
    {
        $this->adoption = Adoption::findOrFail($id);
        $this->animal = Animal::findOrFail($id);
    }

    public function render()
    {
        return view('pages.adoption.⚡show');

    }
};
?>

<div>
    <h1>
        {{ $animal->name }}
    </h1>
    <p>
        {{ $animal->breed->name }}
    </p>
    <p>
        {{ $animal->breed->specie->name }}
    </p>
    <p>
        {{ $animal->age() }}
    </p>
    <p>
        {{ $adoption->note }}
    </p>
</div>
