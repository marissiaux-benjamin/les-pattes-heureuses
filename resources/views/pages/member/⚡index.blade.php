<?php

use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component {
    public $showModal = false;


    #[Computed]
    public function users()
    {
        $currentUser = auth()->user();


        if ($currentUser->role === \App\Enums\MemberRoles::Volunteers->value) {
            return collect([$currentUser]);
        }

        return \App\Models\User::all();
    }

    #[On('userUpdated')]
    public function refreshUsers()
    {

    }

};
?>

<div class="p-10">
    <h1 class="main-titles font-sans font-medium mb-10">
        {{ __('Les Membres du refuge') }}
    </h1>

    @if(auth()->user()->role === \App\Enums\MemberRoles::Founders->value)
        <section class="mb-15">
            <h1 class="text-secondary font-sans">
                Fondateur(s)
            </h1>
            <div class="flex flex-wrap gap-5">
                <livewire:admin.member.add_card card_title="Ajouter un fondateur"/>
                @foreach($this->users as $user)
                    @if($user->role === \App\Enums\MemberRoles::Founders->value)
                        <livewire:admin.member.card :name="$user->name" :role="$user->role" :email="$user->email"
                                                    :userId="$user->id"/>
                    @endif
                @endforeach
            </div>
        </section>
    @endif

    <section>
        <h1 class="text-secondary font-sans">
            @if(auth()->user()->role === \App\Enums\MemberRoles::Volunteers->value)
                {{ __('Mon profil') }}
            @else
                {{ __('Bénénvoles') }}
            @endif
        </h1>
        <div class="flex flex-wrap gap-5">

            @if(auth()->user()->role === \App\Enums\MemberRoles::Founders->value)
                <livewire:admin.member.add_card card_title="Ajouter un volontaire"/>
            @endif

            @foreach($this->users as $user)
                @if($user->role === \App\Enums\MemberRoles::Volunteers->value)
                    <livewire:admin.member.card :name="$user->name" :role="$user->role" :email="$user->email"
                                                :userId="$user->id"/>
                @endif
            @endforeach
        </div>
    </section>

</div>
