<?php

use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component {


    #[Computed]
    public function animals()
    {
        return \App\Models\Animal::all();
    }

    #[Computed]
    public function users()
    {
        return \App\Models\User::all();
    }

    public function render()
    {
        $user = Auth::user();
        return view('pages.⚡dashboard', [
                'user' => $user,
            ]
        );
    }


};
?>

<div class="p-10 ">
    <h1 class="font-sans font-medium main-titles mb-10">
        Bonjour <span class="text-fourth">{{ $user->name }}</span>&nbsp;!
    </h1>
    <div class="flex gap-10 mb-10">
        <livewire:admin.dashboard.resume_card
            number="{{ $this->animals->where('adoption_status', \App\Enums\AdoptionStatus::Adopted->value)->count() }}"
            legend="Animaux Adoptés"/>
        <livewire:admin.dashboard.resume_card number="5" legend="Demandes d'adoption"/>
        <livewire:admin.dashboard.resume_card number="{{ $this->animals->count() }}" legend="Animaux au refuge"/>
        <livewire:admin.dashboard.resume_card number="{{ $this->users->count() }}" legend="Membres dans l'équipe"/>
    </div>

    @if($user->role === \App\Enums\MemberRoles::Founders->value)
        <livewire:admin.dashboard.adoption_application_table/>
    @endif
    @if($user->role === \App\Enums\MemberRoles::Volunteers->value)
        <livewire:admin.table legend="Liste des animaux"/>
    @endif

</div>
