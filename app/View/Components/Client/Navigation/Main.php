<?php

namespace App\View\Components\Client\Navigation;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Main extends Component
{

    public array $links = [];

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->links = [
            ['name' => 'Accueil', 'url' => route('accueil')],
            ['name' => 'Nos Chouchous', 'url' => route('nos-chouchous')],
            ['name' => 'Contact', 'url' => route('contact')],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.client.navigation.main', ['links' => $this->links]);
    }
}
