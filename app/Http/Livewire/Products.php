<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;
    public $order,$precio ,$nombre, $search;

    public function render()
    {
        $products = Product::where('nombre', 'like', '%' . $this->search . '%')->paginate(10);

        return view('livewire.products',compact('products'));
    }
    public $accion = "store";
    public function store()
    {
        $this->accion = "store";
        // $this->validate();
        $prod = Product::create([
            'nombre' => $this->nombre,
            'precio' => $this->precio,
            'order_id' =>$this->order ,
        ]);

        $this->reset(['nombre', 'precio', 'order_id']);
    }
    public function edit(Product $prod)
    {
        $this->accion = "update";
        $this->nombre = $prod->nombre;
        $this->precio = $prod->precio;
        $this->order = $prod->order_id;


    }
    public function update()
    {
        $this->validate();
        $prod = Product::find($this->prod_id);
        $prod->update([
            'nombre' => $this->name,
            'precio' => $this->email,
            'order_id' => $this->password,

        ]);
        $this->reset(['nombre', 'precio', 'order_id']);

    }
    function
default() {
        $this->reset(['nombre', 'precio', 'order_id']);

    }
    public function destroy(Product $prod)
    {
        $prod->delete();
    }
}


