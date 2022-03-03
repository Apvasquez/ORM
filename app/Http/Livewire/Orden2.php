<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;

use App\Models\Order_Detail;
class Orden2 extends Component
{
    public $search = '';
    public $precio = '';
    public $fecha = '';
    public $order_id= '';
    public $id_ord ='';
    public $user_id='';
    public $accion = 'store';


  public $tipo_envio = '';
    public $direccion_envio = '';

    public function render()
    {
        $order = Order::all();
        return view('livewire.orden2',compact('order'));
    }
    public function store()
    {

        // $this->accion = "store";
        $order =
        Order::create( [
            
            'precio' => $this->precio,
            'fecha' => $this->fecha,
            'user_id'=> auth()->user()->id ,
        ]);
        $this->id_ord = $order -> id;
       
        Order_Detail::create([
            'tipo_envio' => $this->tipo_envio,
            'direccion_envio' => $this->direccion_envio,
            'order_id' => $this->id_ord,
            
        ]);
        $this->reset(['precio', 'fecha', 'tipo_envio', 'direccion_envio', 'order_id']);
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
