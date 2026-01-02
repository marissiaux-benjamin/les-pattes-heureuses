<?php

use App\Models\Animal;
use App\Models\Breed;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;

new class extends Component {
    use WithFileUploads;


    public $animal;
    public $photo;
    public $name;
    public $age;
    public $coat_id;
    public $breed_id;
    public $vaccine;
    public $description;

    #[Computed]
    public function breeds()
    {
        return Breed::all();
    }

    #[Computed]
    public function coats()
    {
        return \App\Models\Coat::all();
    }

    public function mount($id)
    {
        $this->animal = Animal::findOrFail($id);
        $this->name = $this->animal->name;
        $this->age = $this->animal->age;
        $this->coat_id = $this->animal->coat_id;
        $this->breed_id = $this->animal->breed_id;
        $this->vaccine = $this->animal->vaccine;
        $this->description = $this->animal->description;
    }

    public function update()
    {
        $animal = \App\Models\Animal::findOrFail($this->animal->id);

        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'age' => 'nullable|date',
            'coat_id' => 'required|exists:coats,id',
            'breed_id' => 'required|exists:breeds,id',
            'vaccine' => 'nullable|exists:vaccines,id',
            'description' => 'nullable|string|max:1000',
            'photo' => 'nullable|image|max:2048',
        ]);

        $animal->name = $this->name;
        $animal->age = $this->age;
        $animal->coat_id = $this->coat_id;
        $animal->breed_id = $this->breed_id;
        $animal->vaccine = $this->vaccine;
        $animal->description = $this->description;

        if ($this->photo) {
            $filename = uniqid() . '.' . config('animalphoto.avatar_file_type');
            $path_to_originals = config('animalphoto.originals_path');

            $photoPath = $this->photo->storeAs(
                $path_to_originals,
                $filename,
                's3'
            );

            if ($animal->photo) {
                Storage::disk('s3')->delete($animal->photo);
            }

            $animal->photo = $photoPath;

            \App\Jobs\ProcessPhoto::dispatch($photoPath, $filename);
        }

        $animal->save();

        return $this->redirect(route('animal.show', $animal->id));
    }

?>

<div class="min-h-screen flex items-center justify-center">
    <div class="self-start mt-10">
        <x-client.buttons.back-button/>
    </div>
    <section class="w-full sm:w-3/4 md:w-2/3 lg:w-1/2 bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-serif font-bold text-foreground mb-8">
            Modifier l'animal <span class="text-fourth">{{ $animal->name }}</span>
        </h1>
        <form wire:submit.prevent="update" method="post" class="space-y-6">
            <div class="flex flex-col gap-2">
                @if ($photo)
                    <div>
                        <p class="text-sm font-medium mb-1">Aperçu :</p>
                        <img src="{{ $photo->temporaryUrl() }}"
                             class="w-32 h-32 object-cover rounded-md border"
                             alt="visuel de l'image que vous venez de sélectionner">
                    </div>
                @elseif ($animal->photo)
                    <div>
                        <p class="text-sm font-medium mb-1">Photo actuelle :</p>
                        <img src="{{ Storage::url($animal->photo) }}"
                             class="w-32 h-32 object-cover rounded-md border"
                             alt="photo actuelle de l'animal">
                    </div>
                @endif
                <label for="photo" class="font-medium">Photo de l'animal :</label>
                <input type="file" wire:model="photo" name="photo" id="photo"
                       class="mt-1 font-sans rounded-md border-2 py-2 px-3 border-secondary text-foreground">
                @error('photo')
                <p class="text-error-color text-sm"><small>{{ $message }}</small></p>
                @enderror
            </div>

            <div class="flex flex-col gap-2">
                <label for="name" class="font-medium">Nom <span class="text-error-color">*</span> :</label>
                <input type="text" wire:model="name" name="name" id="name" placeholder="Médore"
                       class="mt-1 font-sans rounded-md border-2 py-2 px-3 border-secondary text-foreground w-full">
                @error('name')
                <p class="text-error-color text-sm"><small>{{ $message }}</small></p>
                @enderror
            </div>

            <div class="flex flex-col gap-2">
                <label for="age" class="font-medium">Date de naissance :</label>
                <input type="date" wire:model="age" name="age" id="age"
                       class="mt-1 font-sans rounded-md border-2 py-2 px-3 border-secondary text-foreground w-full">
                @error('age')
                <p class="text-error-color text-sm"><small>{{ $message }}</small></p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex flex-col gap-2">
                    <label for="coat_id" class="font-medium">Pelage <span class="text-error-color">*</span> :</label>
                    <select wire:model="coat_id" name="coat_id" id="coat_id"
                            class="mt-1 font-sans rounded-md border-2 py-2 px-3 border-secondary text-foreground w-full">
                        <option value="">- Choisir un pelage -</option>
                        @foreach($this->coats as $coat)
                            <option value="{{ $coat->id }}">{{ $coat->name }}</option>
                        @endforeach
                    </select>
                    @error('coat_id')
                    <p class="text-error-color text-sm"><small>{{ $message }}</small></p>
                    @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <label for="breed_id" class="font-medium">Race <span class="text-error-color">*</span> :</label>
                    <select wire:model="breed_id" name="breed_id" id="breed_id"
                            class="mt-1 font-sans rounded-md border-2 py-2 px-3 border-secondary text-foreground w-full">
                        <option value="">- Choisir une race -</option>
                        @foreach($this->breeds as $breed)
                            <option value="{{ $breed->id }}">{{ $breed->name }} ({{ $breed->specie_id }})</option>
                        @endforeach
                    </select>
                    @error('breed_id')
                    <p class="text-error-color text-sm"><small>{{ $message }}</small></p>
                    @enderror
                </div>
            </div>

            <div class="flex flex-col gap-2">
                <label for="vaccine" class="font-medium">Vaccin <small>(facultatif)</small> :</label>
                <select wire:model="vaccine" name="vaccine" id="vaccine"
                        class="mt-1 font-sans rounded-md border-2 py-2 px-3 border-secondary text-foreground w-full">
                    <option value="">- Choisir un vaccin -</option>
                    <option value="1">Colérat</option>
                </select>
                @error('vaccine')
                <p class="text-error-color text-sm"><small>{{ $message }}</small></p>
                @enderror
            </div>

            <div class="flex flex-col gap-2">
                <label for="description" class="font-medium">Description :</label>
                <textarea wire:model="description" name="description" id="description" rows="5"
                          class="mt-1 font-sans rounded-md border-2 py-2 px-3 border-secondary text-foreground w-full"
                          placeholder="Médore est très calme au refuge et aime jouer avec ses congénères lors de ses sorties..."></textarea>
                @error('description')
                <p class="text-error-color text-sm"><small>{{ $message }}</small></p>
                @enderror
            </div>

            <div>
                <button type="submit"
                        class="w-full md:w-auto rounded-md bg-fourth text-bright px-6 py-2 hover:bg-fourth/90 transition">
                    Modifier l'animal
                </button>
            </div>
        </form>
</div>
</div>


