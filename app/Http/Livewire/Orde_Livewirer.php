<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;

use App\Models\Order_Detail;


class Orde_Livewire extends Component
{
    public $search = '';
    public $precio = '';
    public $fecha = '';
    public $id_ord;
    public $accion = 'store';


  public $tipo_envio = '';
    public $direccion_envio = '';
       public function render()
    {
        $order = Order::where('precio','like','%'. $this->search . '%')->get();
        return view('livewire.order',compact('order'));
    }
    public function store()
    {
        // $this->accion = "store";

        Order::create([
            'precio' => $this->precio,
            'fecha' => $this->fecha,
            
            

        ]);

        Order_Detail::create([
            'tipo_envio' => $this->tipo_envio,
            'direccion_envio' => $this->direccion_envio,
        ]);
        $this->reset(['precio', 'fecha', 'tipo_envio', 'direccion_envio']);
    }

    //Edit Corresponsales
    public function edit(Order $corr)
    {
        $this->accion = "update";
        $this->precio = $corr->precio;
        $this->fecha= $corr->fecha;
        $this->id_ord = $corr->id;
    }


    public function update()
    {
        $this->validate();
        $corr = Order::find($this->id_ord);
        $corr->update([
            'precio' => $this->precio,
            'fecha' => $this->fecha,
            
        ]);
        $this->reset(['precio', 'fecha']);


    }
    function
default() {
    $this->reset(['precio', 'fecha']);

    }
    public function destroy(Order $corr)
    {
        $corr->delete();
    }
}
