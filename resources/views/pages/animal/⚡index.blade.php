<?php

use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component {
    #[Computed]
    public function coats()
    {
       return \App\Models\Coat::all();
    }


};
?>

<div class="p-10">
    <h1 class="main-titles font-medium mb-10">
        Les animaux
    </h1>
    <livewire:admin.table legend="Liste des animaux"/>
</div>
