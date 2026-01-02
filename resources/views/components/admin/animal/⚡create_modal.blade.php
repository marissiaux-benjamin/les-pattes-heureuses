<?php

use App\Models\Breed;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

new class extends Component {

    use WithFileUploads;

    public $showModal = false;
    public $name;
    public $age;
    public $coat_id;
    public $breed_id;
    public $vaccine;
    public $description;
    public $photo;
    public $adoption;


    #[Computed]
    public function animals()
    {
        return \App\Models\Animal::all();
    }

    #[Computed]
    public function breeds()
    {
        return Breed::all();
    }

    #[Computed]
    public function adoptionStatuses(): array
    {
        return \App\Enums\AdoptionStatus::cases();
    }


    public function store(): void
    {
        $validated = $this->validate(
            [
                'name' => 'required|string|max:255',
                'age' => 'nullable|date',
                'coat_id' => 'required|exists:coats,id',
                'breed_id' => 'required|exists:breeds,id',
                'vaccine' => 'nullable|exists:vaccines,id',
                'adoption' => 'required',
                'description' => 'nullable|string|max:1000',
                'photo' => 'nullable|image|max:2048',
            ],
            [
                'name.required' => 'Le nom est obligatoire',
                'coat_id.required' => 'Le pelage est obligatoire',
                'breed.required' => 'La race est obligatoire',
                'adoption.required' => 'Le status est obligatoire',
                'photo.max' => 'L\'image ne doit pas dépasser 2MB'
            ]
        );

        if ($this->photo) {
            $filename = uniqid() . '.' . config('animalphoto.avatar_file_type');

            $path_to_originals = config('animalphoto.originals_path');

            $full_path_to_orignal = $this->photo->putFileAs($path_to_originals, $validated['photo'], $filename, 'public');

            $validated['photo'] = $filename;

            if ($full_path_to_orignal) {
                \App\Jobs\ProcessPhoto::dispatch($full_path_to_orignal, $filename);
            }

        }

        \App\Models\Animal::create($validated);

        $this->showModal = false;
        $this->reset(['name', 'age', 'coat_id', 'breed_id', 'vaccine', 'adoption', 'description']);
    }
};
?>

<div>
    <button x-on:click="$wire.showModal = true" title="Ajouter un animal"
            class="flex gap-2 px-2 py-1 hover:cursor-pointer bg-background shadow-md rounded-md">
        Ajouter un animal
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
             stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
             class="lucide lucide-plus-icon lucide-plus">
            <path d="M5 12h14"/>
            <path d="M12 5v14"/>
        </svg>
    </button>
    <section wire:show="showModal"
             class="w-[70%] h-fit fixed top-[10%] left-[15%] z-20 bg-bright text-foreground p-5 rounded-xl">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-center font-bold font-sans text-xl">
                Créez un nouvel animal
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
                @if ($photo)
                    <div class="mt-2">
                        <p class="text-sm mb-1">Aperçu&nbsp;:</p>
                        <img src="{{ $photo->temporaryUrl() }}" class="w-32 h-32 object-cover rounded-md"
                             alt="visuel de l'image que vous venez de sélectionner">
                    </div>
                @endif

                <label for="photo">Photo de l'animal&nbsp;:</label>
                <input type="file" wire:model="photo" name="photo" id="photo"
                       class="font-sans rounded-md border-2 py-1 px-2 border-secondary text-foreground">

                @error('photo')
                <p class="text-error-color">
                    <small>{{ $message }}</small>
                </p>
                @enderror
            </div>
            <div class="flex flex-col gap-1.5 mb-4">
                <label for="name" class="font-sans">Nom<span class="text-error-color">*</span>&nbsp;:</label>
                <input type="text" wire:model="name" name="name" id="name" placeholder="Médore"
                       class="font-sans rounded-md border-2 py-1 px-2 border-secondary text-foreground">
                @error('name')
                <p class="text-error-color">
                    <small>{{ $message }}</small>
                </p>
                @enderror
            </div>

            <div class="flex flex-col gap-1.5 mb-4">
                <label for="age">Date de naissance&nbsp;:</label>
                <input type="date" wire:model="age" name="age" id="age"
                       class="font-sans rounded-md border-2 py-1 px-2 border-secondary text-foreground">
                @error('age')
                <p class="text-error-color">
                    <small>{{ $message }}</small>
                </p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">

                <div class="flex flex-col gap-1.5">
                    <label for="coat_id">
                        Pelage<span class="text-error-color">*</span>&nbsp;:
                    </label>
                    <select wire:model="coat_id" name="coat_id" id="coat_id"
                            class="font-sans rounded-md border-2 py-1 px-2 border-secondary text-foreground">
                        <option value="">- Choisir un pelage -</option>
                        @foreach($this->animals as $animal)
                            <option value="{{ $animal->coat->id }}">
                                {{ $animal->coat->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('coat_id')
                    <p class="text-error-color"><small>{{ $message }}</small></p>
                    @enderror
                </div>


                <div class="flex flex-col gap-1.5">
                    <label for="breed_id">
                        Race<span class="text-error-color">*</span>&nbsp;:
                    </label>
                    <select wire:model="breed_id" name="breed_id" id="breed_id"
                            class="font-sans rounded-md border-2 py-1 px-2 border-secondary text-foreground">
                        <option value="">- Choisir une race -</option>
                        @foreach($this->breeds as $breed)
                            <option value="{{ $breed->id }}">
                                {{ $breed->name }} ({{ $breed->specie_id }})
                            </option>
                        @endforeach
                    </select>
                    @error('breed_id')
                    <p class="text-error-color"><small>{{ $message }}</small></p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div class="flex flex-col gap-1.5">
                    <label for="adoption">Status&nbsp;<span class="text-error-color">*</span>:</label>
                    <select wire:model="adoption" name="adoption" id="adoption"
                            class="font-sans rounded-md border-2 py-1 px-2 border-secondary text-foreground">
                        <option value="">-&nbsp;Choisir un status&nbsp;-</option>
                        @foreach($this->adoptionStatuses as $adoptionStatus)
                            <option value="{{ $adoptionStatus->value }}">{{ $adoptionStatus->value }}</option>
                        @endforeach
                    </select>
                    @error('adoption')
                    <p class="text-error-color"><small>{{ $message }}</small></p>
                    @enderror
                </div>
                <div class="flex flex-col gap-1.5">
                    <label for="vaccine">Vaccin<small>(facultatif)</small>&nbsp;:</label>
                    <select wire:model="vaccine" name="vaccine" id="vaccine"
                            class="font-sans rounded-md border-2 py-1 px-2 border-secondary text-foreground">
                        <option value="">-&nbsp;Choisir un vaccin&nbsp;-</option>
                        <option value="1">Colérat</option>
                    </select>
                    @error('vaccine')
                    <p class="text-error-color">
                        <small>{{ $message }}</small>
                    </p>
                    @enderror
                </div>
            </div>


            <div class="flex flex-col gap-1.5 mb-4">
                <label for="description" class="font-sans">Description&nbsp;:</label>
                <textarea wire:model="description" name="description" id="description" cols="30" rows="5"
                          class="font-sans rounded-md border-2 py-1 px-2 border-secondary text-foreground"
                          placeholder="Médore est très calme au refuge et aime jouer avec se condisciples lors de ses sorties..."></textarea>
                @error('description')
                <p class="text-error-color">
                    <small>{{ $message }}</small>
                </p>
                @enderror
            </div>

            <button type="submit" class="rounded-md bg-fourth text-bright px-4 py-1">
                Créer un animal
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
