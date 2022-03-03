
<div class="row">
    <div id="button-trigger" class="">
        <div class="card-content" x-data="{open : false , for_edit : false,add : false,edit : false}">
            <div x-show="!open" class="font-mono font-normal uppercase tracking-wide w-full  rounded p-2 bg-white">
                Lista de Productos
            </div>
            <div x-show="add" class="font-mono font-normal uppercase tracking-wide w-full  rounded p-2 bg-white">
                Agregar Producto
            </div>
            <div x-show="edit" class="font-mono font-normal uppercase tracking-wide w-full  rounded p-2 bg-white">
                Editar Producto
            </div>
            <div class="row mt-0">
                <div class="font-normal tracking-wide w-full  rounded-lg bg-white border shadow-sm ">
                    <div class="flex m-2 aspect-auto">
                        <div class="flex-none">
                            <button
                                class="bg-[#9c182f] border px-4 py-1 font-mono uppercase tracking-tighter rounded text-white hover:bg-[#be1935] "
                                x-on:click="open = !open, for_edit = !for_edit, add = !add" x-show="!for_edit">+</button>
                        </div>
                        <div class="grow rounded  " x-show="!open">
                            <input class="w-full h-9 mx-2 rounded" wire:model="search" type="text"
                                placeholder="Buscar Productos..." />
                        </div>

                    </div>
                    <div x-show="open">
                        <div class="font-mono max-w-5xl uppercase font-bold text-sm mx-auto text-center text-slate-900 border m-2 p-2 rounded shadow-md ">
                            <validation-errors class="mb-4" />
                                @csrf
                                <div>
                                    <label class="block mx-auto mb-2 ">
                                        Nombre</label>
                                    <input wire:model="nombre" id="name" class="w-1/2 rounded form-input" type="text"
                                    required placeholder="Ingrese el nombre ......" autofocus autocomplete="name" />
                                </div>
                                <div>
                                    <label class="block mx-auto mb-2 ">
                                        Precio</label>
                                    <input wire:model="precio" id="name" class="w-1/2 rounded form-input" type="number"
                                    required placeholder="Ingrese el precio ......" autofocus autocomplete="name" />
                                </div>
                                <div class="mt-4">
                                    <label class="block mx-auto mb-2 ">
                                        Orden</label>
                                    <select id="order" name="order" class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline"
                                    placeholder="Elija una Orden...">
                                    <option value="" disabled>Seleccione una orden...</option>
                                    {{-- @foreach ($order as $t_servicio)
                                        <option value={{ $t_servicio->id }} {{ $t_servicio->id === $tipo_s ? 'selected' : '' }} >
                                            {{ $t_servicio->nombre }} </option>
                                    @endforeach --}}

                                </select>
                                </div>
                                @if ($accion == 'store')
                                    <div class="mt-6 text-center">
                                        <button wire:click="default"
                                            x-on:click="open = !open , for_edit =!for_edit ,add = !add"
                                            class="px-2 py-2  font-bold text-black-dark border bg-gray-600 rounded hover:bg-gray-700 ">
                                            Cancelar</button>
                                        <button wire:click="store"
                                            x-on:click="open = !open , for_edit =!for_edit , add = !add"
                                            class="px-2 py-2 font-bold text-white bg-[#9c182f] rounded hover:bg-red-800">Agregar</button>
                                    </div>
                                @else
                                    <div class="mt-6 text-center">
                                        <button wire:click="default"
                                            x-on:click="open = !open , for_edit =!for_edit,edit = !edit"
                                            class="px-2 py-2  font-bold text-black-dark border bg-gray-600 rounded hover:bg-gray-700 ">
                                            Cancelar</button>
                                        <button wire:click="update"
                                            x-on:click="open = !open , for_edit =!for_edit,edit = !edit"
                                            class="px-2 py-2 font-bold text-white border bg-[#9c182f] rounded  sm:px-1">Editar</button>
                                    </div>
                                @endif
                        </div>
                    </div>
                    <div x-show="!open" class=" ">
                        <div class="w-full mx-auto overflow-hidden bg-white rounded-lg shadow min-w-max-content">
                            <table class="w-full overflow-hidden bg-white rounded-lg shadow ">
                                <thead class="border-b border-gray-500 bg-gray-50">
                                    <tr class="text-justify uppercase text-sm ">
                                        <th class="px-2 py-1">ID</th>
                                        <th class="px-2 py-1">NOMBRE</th>
                                        <th class="px-2 py-1">PRECIO</th>
                                        <th class="px-2 py-1">ORDEN_ID</th>
                                        <th class="px-2 py-1">ACCIÓN</th>
                                    </tr>
                                </thead>
                                <tbody class="w-full mx-auto divide-y divide-gray-300">
                                    @foreach ($products as $product)
                                        <tr class="text-xs text-justify text-gray-500 ">
                                            <td class="px-2 ">{{ $product->id }}</td>
                                            <td class="px-2  first-letter:uppercase">{{ $product->name }}</td>
                                            <td class="px-2">{{ $product->precio }}</td>
                                            <td class="px-2 ">{{ $product->orden_id }}</td>
                                            <td class="px-2 py-1 w-62">
                                                <button wire:click="edit({{ $product }})"
                                                    x-on:click="open = !open , for_edit = !for_edit, edit = !edit"
                                                    class="px-2 py-2 font-bold text-[#9c182f] bg-white border border-[#9c182f] rounded  sm:px-1">Editar</button>
                                                <button wire:click="destroy({{ $product }})"
                                                    class="px-2 py-2 font-bold text-[#9c182f] bg-white border border-[#9c182f] rounded  sm:px-1">Eliminar</button>

                                            </td>
                                        </tr>

                                    @endforeach


                        </div>
                        </tbody>


                        </table>
                        {{ $products->links() }}

                    </div>

                </div>


            </div>
        </div>
    </div>
</div>


</div>




