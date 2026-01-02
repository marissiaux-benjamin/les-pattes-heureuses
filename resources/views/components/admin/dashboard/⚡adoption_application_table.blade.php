<?php

use App\Models\Adoption;
use App\Models\Animal;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;

    public string $word = '';

    public function search()
    {
        $orderBy = request('orderby', 'requested_at');
        $dir = request('dir', 'asc');

        return \App\Models\Adoption::where('requested_at', 'like', '%' . $this->word . '%')
            ->orderBy($orderBy, $dir)
            ->paginate(config('paginations.animals_index'));
        $this->resetPage();
    }

    #[Computed]
    public function adoptions()
    {
        $orderBy = request('orderby', 'requested_at');
        $dir = request('dir', 'asc');
        return Adoption::with('animal.breed.specie')
            ->where('requested_at', 'like', '%' . $this->word . '%')
            ->orderBy($orderBy, $dir)
            ->paginate(config('paginations.animals_index'));
    }
};
?>

<div>
    <table class="rounded-lg overflow-hidden shadow-lg min-w-full">

        <legend class="font-sans text-secondary mb-3">
            Demandes d'adoption
        </legend>
        <div class="flex gap-2 mb-2">
            <form wire:submit="search">
                <input wire:model.live.debounce.200ms="word" type="search" placeholder="Rechercher une date(ex:2025-06-12)"
                       class="w-1/3 bg-bright border border-border-color text-foreground py-1 px-2 rounded-lg shadow-md">
                <button title="Afficher les filtres"
                        class="hover:cursor-pointer bg-background rounded-lg px-2 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="lucide lucide-funnel-icon lucide-funnel">
                        <path
                            d="M10 20a1 1 0 0 0 .553.895l2 1A1 1 0 0 0 14 21v-7a2 2 0 0 1 .517-1.341L21.74 4.67A1 1 0 0 0 21 3H3a1 1 0 0 0-.742 1.67l7.225 7.989A2 2 0 0 1 10 14z"/>
                    </svg>
                </button>

                <button type="submit"
                        class="flex gap-3 items-center font-sans rounded-lg px-4 py-1 bg-background text-foreground shadow-md hover:cursor-pointer">
                    Rechercher
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="lucide lucide-search-icon lucide-search">
                        <path d="m21 21-4.34-4.34"/>
                        <circle cx="11" cy="11" r="8"/>
                    </svg>
                </button>
            </form>
        </div>

        <thead>
        <tr class="h-10 rounded-t-lg">
            <th class="bg-secondary text-bright">
                Pour <small>(animal)</small>
            </th>
            <th class="bg-secondary text-bright">
                Espèce
            </th>
            <th class="bg-secondary text-bright">
                Status de progression
            </th>
            <th class="bg-secondary text-bright">
                Date
            </th>
            <th class="bg-secondary text-bright w-1/12">
                Action
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($this->adoptions as $adoption)
            <tr class="text-center align-middle h-10 border-b" wire:key="{{ $adoption->id }}">
                <td>
                    <a href="#" class="hover:underline hover:text-fourth">{{ $adoption->animal->name }}</a>
                </td>
                <td>
                    {{ $adoption->animal->breed->specie->name }}
                </td>
                <td>
                    Faire les papiers
                </td>
                <td>
                    {{ \Carbon\Carbon::parse($adoption->requested_at)->translatedFormat('d M Y') }}
                </td>
                <td x-data="{ open: false }" class="relative">
                    <button @click="open = !open" data-test="see-modify-delete" class="cursor-pointer p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-ellipsis-vertical-icon lucide-ellipsis-vertical">
                            <circle cx="12" cy="12" r="1"/>
                            <circle cx="12" cy="5" r="1"/>
                            <circle cx="12" cy="19" r="1"/>
                        </svg>
                    </button>
                    <div x-show="open"
                         class="flex flex-col gap-2 bg-background text-sm rounded-xl shadow-md absolute z-10 p-4">
                        <a href="{{ route('adoption.show', $adoption->animal_id) }}"
                           class="font-sans transition-all duration-200 ease-in-out hover:text-fourth">Voir</a>
                        <hr>
                        <a href="#"
                           class="font-sans transition-all duration-200 ease-in-out hover:text-fourth">Modifier</a>
                        <hr>
                        <a href="#" class="font-sans transition-all duration-200 ease-in-out hover:text-error-color">Supprimer</a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot class="h-14">
        <tr class="bg-background">
            <td colspan="5" class="px-5 text-center">
                {{ $this->adoptions->links() }}
            </td>
        </tr>
        </tfoot>
    </table>
</div>
