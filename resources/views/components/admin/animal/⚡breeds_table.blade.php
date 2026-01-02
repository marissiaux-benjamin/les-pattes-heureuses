<?php

use App\Models\Breed;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

new class extends Component {

    use \Livewire\WithPagination;

    public string $word = '';

    public $showModal = false;
    public $name;
    public $specie_id;
    public $description;


    #[Computed]
    public function breeds()
    {
        $orderBy = request('orderby', 'specie');
        $dir = request('dir', 'asc');

        return \App\Models\Breed::where('name', 'like', '%' . $this->word . '%')
            ->orderBy($orderBy, $dir)
            ->paginate(config('paginations.breed_index'));
    }

};
?>

<section class="rounded-lg">
    <h1 class="text-secondary mb-3">
        {{ __('Liste des races') }}
    </h1>
    <div class="flex flex-col md:flex-row justify-between mb-4 gap-2">
        <div class="w-full md:w-1/3 flex items-center">
            <div class="flex w-full gap-2">
                <input wire:model.live.debounce.200ms="word" type="search"
                       placeholder="Rechercher une race"
                       class="flex-1 bg-bright border border-border-color text-foreground py-1 px-2 rounded-lg shadow-md">
            </div>
        </div>
        <livewire:admin.animal.create_breed_modal/>
    </div>
    <table class="hidden md:table shadow-lg min-w-full">
        <thead>
        <tr class="h-10">
            <th class="bg-secondary text-bright rounded-tl-lg">Nom</th>
            <th class="bg-secondary text-bright hidden md:table-cell">Espèce</th>
            <th class="bg-secondary text-bright w-10 pr-10 text-center rounded-tr-lg">Action</th>
        </tr>
        </thead>

        <tbody>
        @foreach($this->breeds as $breed)
            <tr class="text-center align-middle h-10 border-b" wire:key="{{ $breed->id }}">
                <td>{{ $breed->name }}</td>

                <td class="hidden md:table-cell">
                    {{ $breed->specie->name }}
                </td>

                <td x-data="{ open: false }" class="relative">
                    <button @click="open = !open"
                            class="cursor-pointer my-1 p-2 hover:bg-gray-100 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round">
                            <circle cx="12" cy="12" r="1"/>
                            <circle cx="12" cy="5" r="1"/>
                            <circle cx="12" cy="19" r="1"/>
                        </svg>
                    </button>

                    <div x-show="open"
                         @click.outside="open = false"
                         class="flex flex-col gap-2 bg-background text-sm rounded-xl shadow-md absolute -left-10 z-10 p-4 mt-2">
                        <button
                            wire:click="openModifyModal({{ $breed->id }})"
                            type="button"
                            class="gap-2 rounded-lg font-sans text-center transition-all duration-200  hover:text-fourth">
                            {{ __('Modifier') }}
                        </button>
                        <livewire:admin.animal.modify_breed_modal/>

                        <hr>
                        <button
                            wire:click="openConfirmationModal({{ $breed->id }})"
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
            <td colspan="4" class="px-4 text-center">
                {{ $this->breeds->links() }}
            </td>
        </tr>
        </tfoot>
    </table>
</section>

