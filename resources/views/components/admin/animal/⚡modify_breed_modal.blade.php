<?php

use App\Models\Breed;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

new class ModifyBreedModal extends Component
{

    public $showModal = false;
    public $name;
    public $specie_id;
    public $description;

    protected $listeners = ['openModifyModal'];

    #[Computed]
    public function species()
    {
        return \App\Models\Specie::all();
    }

    public function openModifyModal($breedId)
    {
        $breed = Breed::findOrFail($breedId);

        $this->breedId = $breed->id;
        $this->name = $breed->name;
        $this->specie_id = $breed->specie_id;
        $this->description = $breed->description;

        $this->showModal = true;
    }


    public function update()
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'specie_id' => 'required|exists:species,id',
            'description' => 'nullable|string|max:1000',
        ]);

        Breed::find($this->breedId)->update($validated);

        $this->reset(['showModal', 'breedId', 'name', 'specie_id', 'description']);
        $this->dispatchBrowserEvent('breed-updated');
    }
};
?>

<div>

    <section wire:show="showModal"
             class="w-[70%] h-fit fixed top-[30%] left-[15%] z-20 bg-bright text-foreground p-5 rounded-xl">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-center font-bold font-sans text-xl">
                {{__('Ajouter une race')}}
            </h1>
            <button wire:click="showModal = false" class="cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="lucide lucide-x-icon lucide-x">
                    <path d="M18 6 6 18"/>
                    <path d="m6 6 12 12"/>
                </svg>
            </button>
        </div>
        <form wire:submit="store" method="post">
            <div class="flex flex-col gap-1.5 mb-4">
                <label for="name" class="font-sans">Nom<span class="text-error-color">*</span>&nbsp;:</label>
                <input type="text" wire:model="name" name="name" id="name" placeholder="Berger Allemand"
                       class="font-sans rounded-md border-2 py-1 px-2 border-secondary text-foreground">
                @error('name')
                <p class="text-error-color">
                    <small>{{ $message }}</small>
                </p>
                @enderror
            </div>

            <div class="flex flex-col gap-1.5">
                <label for="specie_id">
                    Espèce<span class="text-error-color">*</span>&nbsp;:
                </label>
                <select wire:model="specie_id" name="specie_id" id="specie_id"
                        class="font-sans rounded-md border-2 py-1 px-2 border-secondary text-foreground">
                    <option value="">- Choisir une espèce -</option>
                    @foreach($this->species as $specie)
                        <option value="{{ $specie->id }}">
                            {{ $specie->name }}
                        </option>
                    @endforeach
                </select>
                @error('specie_id')
                <p class="text-error-color"><small>{{ $message }}</small></p>
                @enderror
            </div>

            <div class="flex flex-col gap-1.5 mb-4">
                <label for="description" class="font-sans">Description&nbsp;:</label>
                <textarea wire:model="description" name="description" id="description" cols="30" rows="5"
                          class="font-sans rounded-md border-2 py-1 px-2 border-secondary text-foreground"
                          placeholder="Le Berger Allemand est facile a éduquer mais peut parfois être dangereux..."></textarea>
                @error('description')
                <p class="text-error-color">
                    <small>{{ $message }}</small>
                </p>
                @enderror
            </div>
            <button type="submit" class="rounded-md bg-fourth text-bright px-4 py-1">
                {{ __('Créer une race') }}
            </button>
        </form>
    </section>
    <div wire:show="showModal"
         x-on:click="$wire.showModal = false"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-black/50 backdrop-blur-sm z-10">
    </div>

</div>
