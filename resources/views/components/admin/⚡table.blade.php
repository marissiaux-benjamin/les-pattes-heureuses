<?php

use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;

    public string $legend;
    public string $word = '';

    public $showConfirmModal = false;
    public $animalId;
    public $name;

    #[Computed]
    public function animals()
    {
        $orderBy = request('orderby', 'name');
        $dir = request('dir', 'asc');

        return \App\Models\Animal::where('name', 'like', '%' . $this->word . '%')
            ->orderBy($orderBy, $dir)
            ->paginate(config('paginations.animals_index'));
    }

    public function openConfirmationModal($animalId): void
    {
        $animal = \App\Models\Animal::find($animalId);
        $this->animalId = $animalId;
        $this->name = $animal->name;
        $this->showConfirmModal = true;
    }

    public function delete(): void
    {
        $animal = \App\Models\Animal::find($this->animalId);
        if ($animal) {
            $animal->delete();
        }

        $this->dispatch('animalUpdated');
        $this->reset(['showConfirmModal', 'animalId', 'name']);
    }
};
?>
<div class="space-y-10">
    <legend class="font-sans text-secondary mb-3">
        {{ $legend }}
    </legend>

    <div class="flex flex-col md:flex-row justify-between mb-4 gap-2">
        <div class="w-full md:w-1/3 flex items-center">
            <div class="flex w-full gap-2">
                <input wire:model.live.debounce.200ms="word" type="search"
                       placeholder="Rechercher un animal"
                       class="flex-1 bg-bright border border-border-color text-foreground py-1 px-2 rounded-lg shadow-md">
            </div>
        </div>
        <livewire:admin.animal.create_modal/>
    </div>

    <!-- tableau noraml -->
    <div class="rounded-lg">
        <table class="hidden md:table shadow-lg min-w-full">
            <thead>
            <tr class="h-10">
                <th class="bg-secondary text-bright rounded-tl-lg">Nom</th>
                <th class="bg-secondary text-bright hidden md:table-cell">Espèce</th>
                <th class="bg-secondary text-bright hidden lg:table-cell">Status de progression</th>
                <th class="bg-secondary text-bright hidden sm:table-cell">Âge</th>
                <th class="bg-secondary text-bright w-1/12 rounded-tr-lg">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($this->animals as $animal)
                <tr class="text-center align-middle h-10 border-b" wire:key="{{ $animal->id }}">
                    <td>{{ $animal->name }}</td>
                    <td class="hidden md:table-cell">{{ $animal->breed->specie->name }}</td>
                    <td class="hidden lg:table-cell">A l'adoption</td>
                    <td class="hidden sm:table-cell">{{ $animal->age() }} ans</td>
                    <td x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="cursor-pointer my-1 p-2 hover:bg-gray-100 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round">
                                <circle cx="12" cy="12" r="1"/>
                                <circle cx="12" cy="5" r="1"/>
                                <circle cx="12" cy="19" r="1"/>
                            </svg>
                        </button>
                        <div x-show="open" @click.outside="open = false"
                             class="flex flex-col gap-2 bg-background text-sm rounded-xl shadow-md absolute -left-10 z-10 p-4 mt-2">
                            <a wire:navigate href="{{ route('animal.show',['id' => $animal->id]) }}"
                               class="font-sans transition-all duration-200 ease-in-out hover:text-fourth">Voir</a>
                            <hr>
                            <a wire:navigate href="{{ route('animal.edit',['id' => $animal->id]) }}"
                               class="font-sans transition-all duration-200 ease-in-out hover:text-fourth">Modifier</a>
                            <hr>
                            <button
                                wire:click="openConfirmationModal({{ $animal->id }})"
                                type="button"
                                class="flex items-center px-3 py-1 rounded-lg font-sans text-sm transition-all duration-200 hover:text-error-color">
                                Supprimer
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot class="h-14">
            <tr class="bg-background rounded-b-lg">
                <td colspan="5" class="px-4 text-center">
                    {{ $this->animals->links() }}
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

    <!-- cartes mobile -->
    <div class="md:hidden space-y-3">
        @foreach($this->animals as $animal)
            <div class="bg-background rounded-xl shadow p-4 flex justify-between items-center"
                 wire:key="mobile-{{ $animal->id }}">
                <div>
                    <p class="font-semibold">{{ $animal->name }}</p>
                    <p class="text-sm text-muted">{{ $animal->breed->specie->name }}</p>
                    <p class="text-sm">Faire les papiers</p>
                    <p class="text-sm">{{ $animal->age() }} ans</p>
                </div>
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round">
                            <circle cx="12" cy="12" r="1"/>
                            <circle cx="12" cy="5" r="1"/>
                            <circle cx="12" cy="19" r="1"/>
                        </svg>
                    </button>
                    <div x-show="open" @click.outside="open = false"
                         class="flex flex-col gap-2 bg-background text-sm rounded-xl shadow-md absolute z-10 p-4 right-0 mt-2">
                        <a wire:navigate href="{{ route('animal.show',['id' => $animal->id]) }}"
                           class="transition-all duration-200 ease-in-out hover:text-fourth">Voir</a>
                        <hr>
                        <a wire:navigate href="{{ route('animal.edit',['id' => $animal->id]) }}"
                           class="transition-all duration-200 ease-in-out hover:text-fourth">Modifier</a>
                        <hr>
                        <button
                            wire:click="openConfirmationModal({{ $animal->id }})"
                            type="button"
                            class="flex items-center gap-2 px-3 py-2 rounded-lg font-sans text-sm transition-all duration-200 hover:bg-error-color/10 hover:text-error-color">
                            Supprimer
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    <div x-data="{ showConfirmModal: @entangle('showConfirmModal') }">
        <section
            x-show="showConfirmModal"
            x-transition
            x-on:click.stop
            class="w-[90%] md:w-[70%] h-fit fixed top-[30%] left-[5%] md:left-[15%] z-20 bg-bright text-foreground p-5 rounded-xl">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-xl font-sans font-bold">
                    Supprimer l'animal <span class="text-error-color">{{ $name }}</span>
                </h1>

                <button x-on:click="showConfirmModal = false" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="#222222" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path d="M18 6 6 18"/>
                        <path d="m6 6 12 12"/>
                    </svg>
                </button>
            </div>

            <p class="mb-6 font-sans">
                Es-tu sûr de vouloir supprimer
                <span class="font-bold text-error-color">{{ $name }}</span>&nbsp;?
                <br>
                <span class="text-sm text-secondary">Cette action est irréversible.</span>
            </p>

            <div class="flex justify-center gap-3">
                <button
                    type="button"
                    x-on:click="showConfirmModal = false"
                    class="px-4 py-2 rounded-md hover:bg-secondary/20 transition">
                    Annuler
                </button>

                <button
                    wire:click="delete()"
                    type="button"
                    class="px-4 py-2 rounded-md bg-error-color text-bright hover:bg-error-color/90 transition">
                    Supprimer
                </button>
            </div>
        </section>

        <div x-show="showConfirmModal"
             x-on:click="showConfirmModal = false"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-black/50 backdrop-blur-sm z-10">
        </div>
    </div>

</div>
