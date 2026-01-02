<?php

use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component {

    public $showModal = false;

    public string $card_title;
    public $name;
    public $email;
    public $password;
    public $role;

    #[Computed]
    public function roles(): array
    {
        return \App\Enums\MemberRoles::cases();
    }

    public function store()
    {

        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'password' => 'required|min:8'
        ]);
        $validated['password'] = bcrypt($validated['password']);
        \App\Models\User::create($validated);
        $this->showModal = false;
        return redirect(route('member.index'));
    }
};
?>

<div>
    <div x-data="{ showModal: $wire.entangle('showModal') }"
         x-on:click="showModal = true"
         class="group transition-all ease-in-out duration-300 h-full w-44 flex items-center justify-center text-center bg-background rounded-lg shadow-md cursor-pointer hover:shadow-xl">
        <div class="flex flex-col gap-1">
            <svg xmlns="http://www.w3.org/2000/svg"
                 width="72" height="72" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor"
                 stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                 class="mx-auto text-secondary transition-all ease-in-out group-hover:text-fourth">
                <path d="M5 12h14"/>
                <path d="M12 5v14"/>
            </svg>
            <p class="text-secondary transition-all ease-in-out duration-300 group-hover:text-fourth">
                {{ $card_title }}
            </p>
        </div>
    </div>

    <div x-data="{ showModal: $wire.entangle('showModal') }">
        <section x-show="showModal"
                 x-transition
                 x-on:click.stop
                 class="w-[70%] h-fit fixed top-[30%] left-[15%] z-20 bg-bright text-foreground p-5 rounded-xl">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-xl font-sans font-bold">Créez un membre</h1>
                <button x-on:click="showModal = false" type="button" class="cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18"/>
                        <path d="m6 6 12 12"/>
                    </svg>
                </button>
            </div>

            <form wire:submit="store" method="post">
                <div class="flex flex-col gap-1.5 mb-4">
                    <label for="name" class="font-sans">Nom <small>(complet)</small><span
                            class="text-error-color">*</span>&nbsp;:</label>
                    <input wire:model="name" type="text" name="name" id="name" placeholder="John Doe"
                           class="font-sans rounded-md border-2 py-1 px-2 border-secondary text-foreground">
                </div>
                <div class="flex flex-col gap-1.5 mb-4">
                    <label for="email" class="font-sans">Email<span class="text-error-color">*</span>&nbsp;:</label>
                    <input wire:model="email" type="text" name="email" id="email" placeholder="johndoe@gmail.com"
                           class="font-sans rounded-md border-2 py-1 px-2 border-secondary text-foreground">
                </div>
                <div class="flex flex-col gap-1.5 mb-4">
                    <label for="password" class="font-sans">Mot de passe<span
                            class="text-error-color">*</span>&nbsp;:</label>
                    <input wire:model="password" type="password" name="password" id="password" placeholder="Ch4ng3_Th1s"
                           class="font-sans rounded-md border-2 py-1 px-2 border-secondary text-foreground">
                </div>
                <div class="flex flex-col gap-1.5 mb-4">
                    <label for="role">Rôle&nbsp;<span class="text-error-color">*</span>:</label>
                    <select wire:model="role" name="role" id="role"
                            class="font-sans rounded-md border-2 py-1 px-2 border-secondary text-foreground">
                        <option value="">-&nbsp;Choisir un rôle&nbsp;-</option>
                        @foreach($this->roles as $role)
                            <option value="{{ $role->value }}">{{ $role->value }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="rounded-md bg-fourth cursor-pointer text-bright px-4 py-1">
                    Créer un membre
                </button>
            </form>
        </section>

        <div x-show="showModal"
             x-on:click="showModal = false"
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
