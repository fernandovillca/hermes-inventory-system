@php
    $breadcrumbs = [
        ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
        ['name' => 'Productos', 'href' => route('admin.products.index')],
        ['name' => 'Editar']
    ];
@endphp

<x-admin-layout 
    title="Productos - Hermes System"
    :breadcrumbs="$breadcrumbs"
>

    <x-wire-card>
        <form action="{{ route('admin.products.update', $product) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <x-wire-input 
                label="Nombre" 
                name="name" 
                placeholder="Nombre del producto" 
                value="{{ old('name', $product->name) }}" 
            />

            <x-wire-textarea 
                label="Descripción" 
                name="description" 
                placeholder="Descripción del producto"
            >
                {{ old('description', $product->description) }}
            </x-wire-textarea>

            <x-wire-input 
                type="number"
                step="0.01"
                label="Precio" 
                name="price" 
                placeholder="Precio del producto" 
                value="{{ old('price', $product->price) }}" 
            />

            <x-wire-native-select 
                label="Categoría" 
                name="category_id"
            >
                @foreach ($categories as $category)

                    <option 
                        value="{{ $category->id }}" 
                        @selected(old('category_id', $product->category_id) == $category->id)
                    >
                        {{ $category->name }}
                    </option>
                    
                @endforeach
            </x-wire-native-select>

            <div class="flex justify-end">
                 <x-wire-button light zinc class="mr-2 font-semibold text-xs uppercase tracking-widest" href="{{ route('admin.products.index') }}">
                    Regresar
                </x-wire-button>
                
                <x-button>Actualizar</x-button>
            </div>

        </form>
    </x-wire-card>

</x-admin-layout>