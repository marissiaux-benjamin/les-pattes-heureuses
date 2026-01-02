<?php

use Illuminate\Validation\Rule;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component {
    public $showModal = false;
    public $showConfirmModal = false;
    public string $card_title;
    public string $name;
    public string $role;
    public string $email;
    public string $password;

    public $userId;

    public function openEditModal($userId): void
    {
        $this->userId = $userId;
        $user = \App\Models\User::find($userId);

        if ($user) {
            $this->name = $user->name;
            $this->email = $user->email;
            $this->role = $user->role;
            $this->password = '';
        }

        $this->showModal = true;
    }

    public function openConfirmationModal($userId): void
    {
        $this->userId = $userId;
        $user = \App\Models\User::find($userId);
        $this->name = $user->name;
        $this->showConfirmModal = true;
    }

    #[Computed]
    public function users()
    {
        return \App\Models\User::all();
    }

    #[Computed]
    public function roles(): array
    {
        return \App\Enums\MemberRoles::cases();
    }

    public function update(): void
    {
        $user = \App\Models\User::find($this->userId);

        $this->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($this->userId)],
            'password' => 'nullable|min:8',
            'role' => 'required',
        ]);

        if ($user) {
            $user->name = $this->name;
            $user->email = $this->email;
            $user->role = $this->role;

            if (!empty($this->password)) {
                $user->password = bcrypt($this->password);
            }
            $user->save();
        }

        $this->dispatch('userUpdated');
        $this->reset(['showModal', 'name', 'email', 'password', 'role', 'userId']);
    }

    public function delete(): void
    {
        $user = \App\Models\User::find($this->userId);
        if ($user) $user->delete();

        $this->dispatch('userUpdated');
        $this->reset(['showConfirmModal', 'userId']);
    }
};
?>


<div class="w-44 px-5 pt-10 pb-5 text-center bg-background rounded-lg shadow-md relative">
    <div class="w-28 h-28 bg-secondary m-auto rounded-full mb-5"></div>
    <p class="font-bold font-sans">
        {{ $name }}
    </p>
    <p class="font-sans">
        {{ $role }}
    </p>
    <div x-data="{ open: false }">
        <button
            @click="open = !open"
            class="cursor-pointer absolute top-0 right-0 p-2 rounded-md
               transition hover:bg-secondary/20">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                 viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2"
                 stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="1"/>
                <circle cx="12" cy="5" r="1"/>
                <circle cx="12" cy="19" r="1"/>
            </svg>
        </button>
        <div
            x-show="open"
            @click.outside="open = false"
            x-transition
            class="absolute top-10 right-0 z-10 w-40
               bg-background rounded-xl shadow-lg
               p-2 flex flex-col gap-1">
            <button
                wire:click="openEditModal({{ $userId ?? 'null' }})"
                type="button"
                class="flex items-center gap-2 px-3 py-2 rounded-lg font-sans text-sm
                   transition-all duration-200
                   hover:bg-fourth/10 hover:text-fourth">
                Modifier
            </button>
            <div x-data="{ showModal: $wire.entangle('showModal') }">
                <section x-show="showModal"
                         x-transition
                         x-on:click.stop
                         class="w-[70%] h-fit fixed top-[30%] left-[15%] z-20 bg-bright text-foreground p-5 rounded-xl">
                    <div class="flex justify-between items-center mb-4">
                        <h1 class="text-xl font-sans font-bold">Modifier l'utilisateur <span
                                class="text-fourth">{{ $name }}</span></h1>
                        <button x-on:click="showModal = false" type="button" class="cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6 6 18"/>
                                <path d="m6 6 12 12"/>
                            </svg>
                        </button>
                    </div>

                    <form wire:submit="update" method="post">
                        <div class="flex flex-col gap-1.5 mb-4">
                            <label for="name" class="font-sans">Nom <small>(complet)</small><span
                                    class="text-error-color">*</span>&nbsp;:</label>
                            <input wire:model="name" type="text" name="name" id="name"
                                   placeholder="John Doe"
                                   class="font-sans rounded-md border-2 py-1 px-2 border-secondary text-foreground">
                        </div>
                        <div class="flex flex-col gap-1.5 mb-4">
                            <label for="email" class="font-sans">Email<span
                                    class="text-error-color">*</span>&nbsp;:</label>
                            <input wire:model="email" type="text" name="email" id="email"
                                   placeholder="johndoe@gmail.com"
                                   class="font-sans rounded-md border-2 py-1 px-2 border-secondary text-foreground">
                        </div>
                        <div class="flex flex-col gap-1.5 mb-4">
                            <label for="password" class="font-sans">Mot de passe<span
                                    class="text-error-color">*</span>&nbsp;:</label>
                            <input wire:model="password" value="" type="password" name="password"
                                   id="password"
                                   placeholder="Ch4ng3_Th1s"
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
                            Modifier {{ $name }}
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
            <hr>
            <button
                wire:click="openConfirmationModal({{ $userId ?? 'null' }})"
                type="button"
                class="flex items-center gap-2 px-3 py-2 rounded-lg font-sans text-sm
                   transition-all duration-200
                   hover:bg-error-color/10 hover:text-error-color">
                Supprimer
            </button>
            <div x-data="{ showConfirmModal: $wire.entangle('showConfirmModal') }">
                <section
                    x-show="showConfirmModal"
                    x-transition
                    x-on:click.stop
                    class="w-[70%] h-fit fixed top-[30%] left-[15%] z-20 bg-bright text-foreground p-5 rounded-xl">
                    <div class="flex justify-between items-center mb-4">
                        <h1 class="text-xl font-sans font-bold">
                            Supprimer l'utilisateur <span class="text-error-color">{{ $name }}</span>
                        </h1>

                        <button x-on:click="showConfirmModal = false" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
                            class="px-4 py-2 rounded-md
                       hover:bg-secondary/20 transition">
                            Annuler
                        </button>

                        <button
                            wire:click="delete()"
                            type="button"
                            class="px-4 py-2 rounded-md bg-error-color text-bright
                       hover:bg-error-color/90 transition"
                        >
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
    </div>
</div>
