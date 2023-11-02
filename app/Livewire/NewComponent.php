<?php

namespace App\Livewire;

use App\Models\Componente;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewComponent extends Component
{
    use WithFileUploads;
    public $search ;

    public $editing = false;
    public $editingAll = false;
    public $showForm = false;
    public $productId;

    public $componentes;
    public $name;
    public $image;
    public $description;
    public $price;
    public $videoUrl = 'https://www.youtube.com/embed/hcwyISyUO44';
    public $editingVideo = false;
    public $videoFile;
    public $emit;

    protected function convertirAFormatoCorrecto()
    {
        $urlParts = parse_url($this->videoFile);
        if (isset($urlParts['query'])) {
            parse_str($urlParts['query'], $query);
            if (isset($query['v'])) {
                $videoId = $query['v'];
                return "https://www.youtube.com/embed/$videoId";
            }
        }
        return $this->videoFile;
    }
    public function uploadVideo()
    {
        $this->videoUrl = $this->convertirAFormatoCorrecto($this->videoFile);
        $this->editingVideo = false;
        $this->videoFile = null;
    }

    public function editVideo()
    {
        $this->editingVideo = true;
    }
    public function prueba(){

    }

    public function mount()
    {
        $this->componentes = Componente::all();
    }
    public function render()
    {
        $products = Componente::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->orWhere('price', 'like', '%' . $this->search . '%')
            ->get();
        return view('livewire.new-component',[
            'products' => $products,
        ]);
    }

    public function editProduct($productId)
    {
        $product = Componente::find($productId);
        if ($product) {
            $this->productId = $product->id;
            $this->name = $product->name;
            $this->image = $product->image;
            $this->description = $product->description;
            $this->price = $product->price;

            $this->editing = true;
            $this->showForm = true;
        }
    }

    public function deleteWindow()
    {
        $this->showForm = false;
    }


    public function addProduct()
    {
        $this->validate([
            'name' => 'required',
            'image' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);
        if($this->editing){
            $product = Componente::find($this->productId);
            if ($product) {
                $product->name = $this->name;
                $product->image = $this->image;
                $product->description = $this->description;
                $product->price = $this->price;
                $product->update();
            }
        }else {
            $new = new Componente;
            $new->name = $this->name;
            $destinationPath = 'images/';
            $image = $this->image;
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $new->image = $destinationPath . $filename;
            $new->description = $this->description;
            $new->price = $this->price;
            $new->save();
        }
        $this->resetForm();
        $this->showForm = false;

        $this->componentes = Componente::all();
    }
    public function scrollToBottom()
    {

    }
    public function resetForm()
    {
        $this->editing = false;
        $this->productId = null;
        $this->name = '';
        $this->image = null;
        $this->description = '';
        $this->price = '';
    }



    public function deleteProduct($productId)
    {
        $product = Componente::find($productId);
        $product->delete();

        $this->componentes = Componente::all();
    }


}
