<div>
    <h1>Don Paquis</h1>
    <form wire:submit.prevent="save">
        <input type="file" wire:model="photo">

        @error('photo') <span class="error">{{ $message }}</span> @enderror

        <button type="submit">Save Photo</button>
    </form>
    <div wire:loading wire:target="save">Uploading...</div>

    <input type="text" wire:model="search" placeholder="Buscar productos">

    <ul>
        @foreach ($products as $product)
            <li>{{ $product->name }} - Precio: {{ $product->price }} - Descripción: {{ $product->price }}</li>
        @endforeach
    </ul>
    <button wire:click="prueba">PRUEBA</button>
    {{$search}}
</div>
