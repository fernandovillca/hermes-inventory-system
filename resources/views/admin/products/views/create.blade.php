@php
    $breadcrumbs = [
        ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
        ['name' => 'Productos', 'href' => route('admin.products.index')],
        ['name' => 'Crear']
    ];
@endphp

<x-admin-layout 
    title="Productos - Hermes System"
    :breadcrumbs="$breadcrumbs"
>

    <x-wire-card>
        <form action="{{ route('admin.products.store') }}" method="POST" class="space-y-4">
            @csrf

            <x-wire-input 
                label="Nombre" 
                name="name" 
                placeholder="Nombre del producto" 
                value="{{ old('name') }}" 
            />

            <x-wire-textarea 
                label="Descripción" 
                name="description" 
                placeholder="Descripción del producto" 
                value="{{ old('description') }}"
            />

            <x-wire-input 
                type="number"
                step="0.01"
                label="Precio" 
                name="price" 
                placeholder="Precio del producto" 
                value="{{ old('price') }}" 
            />

            <x-wire-native-select 
                label="Categoría" 
                name="category_id"
            >
                @foreach ($categories as $category)

                    <option 
                        value="{{ $category->id }}" 
                        @selected(old('category_id') == $category->id)
                    >
                        {{ $category->name }}
                    </option>
                    
                @endforeach
            </x-wire-native-select>

            <div class="flex justify-end">
                <x-wire-button light zinc class="mr-2 font-semibold text-xs uppercase tracking-widest" href="{{ route('admin.categories.index') }}">
                    Cancelar
                </x-wire-button>

                <x-button>Guardar</x-button>
            </div>

        </form>
    </x-wire-card>

</x-admin-layout>