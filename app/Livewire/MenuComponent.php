<?php

namespace App\Livewire;

use App\Models\Componente;
use Livewire\Component;
use Livewire\WithFileUploads;

class MenuComponent extends Component
{
    use WithFileUploads;
    public $photo;
    public $search;

    public function save()
    {
        $this->photo->store('images' );
        $this->photo = 'false';
    }

    public function render()
    {
        $products = Componente::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->orWhere('price', 'like', '%' . $this->search . '%')
            ->get();

        return view('livewire.menu-component', [
            'products' => $products,
        ]);

    }

    public function prueba()
    {

    }
}
