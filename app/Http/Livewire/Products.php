<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;
    public $precio ,$nombre, $search ,$tipo_o = '1',$prod_id,$bandera;

    public function render()
    {
        $products = Product::where('nombre', 'like', '%' . $this->search . '%')->paginate(10);
        $order = Order::all();
        return view('livewire.products',compact('products','order'));
    }
    public $accion = "store";
    public function store()
    {
        $this->accion = "store";
        // $this->validate();
        $prod = Product::create([
            'nombre' => $this->nombre,
            'precio' => $this->precio,
            'order_id' =>$this->tipo_o ,
        ]);
        $order = Order::find($this->tipo_o);
            $order->update([
                'precio' =>  $order->products->sum('precio'),

            ]);

        $this->reset(['nombre', 'precio', 'tipo_o']);
    }
    public function edit(Product $prod)
    {
        $this->accion = "update";
        $this->nombre = $prod->nombre;
        $this->precio = $prod->precio;
        $this->tipo_o = $prod->order_id;
        $this->prod_id = $prod->id;
        $this->bandera = $prod->order_id;
    }
    public function update()
    {
        // $this->validate();
        $prod = Product::find($this->prod_id);
        $prod->update([
            'nombre' => $this->nombre,
            'precio' => $this->precio,
            'order_id' => $this->tipo_o,

        ]);
        $order = Order::find($this->tipo_o);
        $order->update([
            'precio' =>  $order->products->sum('precio'),

        ]);
        $order_act = Order::find($this->bandera);
        $order_act->update([
            'precio' =>  $order_act->products->sum('precio'),

        ]);
        $this->reset(['nombre', 'precio', 'tipo_o']);

    }
    function
default() {
        $this->reset(['nombre', 'precio', 'tipo_o']);

    }
    public function destroy(Product $prod)
    {
        $prod->delete();
    }
}


