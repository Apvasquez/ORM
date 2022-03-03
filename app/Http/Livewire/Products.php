<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;
    public $order,$precio;

    public function render()
    {
        $users = Product::where('nombre', 'like', '%' . $this->search . '%')->paginate(10);

        return view('livewire.products');
    }
    public $accion = "store";
    public function store()
    {
        $this->accion = "store";
        // $this->validate();
        $user = Product::create([
            'nombre' => $this->nombre,
            'precio' => $this->precio,
            'order_id' =>$this->order ,
        ])->assignRole('Cliente');
        $token = $user->createToken('myapptoken')->plainTextToken;
        $this->reset(['name', 'email', 'password', 'accion']);
    }
    public function edit(User $user)
    {
        $this->accion = "update";
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = '';
        $this->user_id = $user->id;

    }
    public function update()
    {
        $this->validate();
        $user = user::find($this->user_id);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,

        ]);
        $this->reset(['name', 'email', 'password', 'accion']);

    }
    function
default() {
        $this->reset(['name', 'email', 'password', 'accion']);

    }
    public function destroy(User $user)
    {
        $user->delete();
    }
}

}
