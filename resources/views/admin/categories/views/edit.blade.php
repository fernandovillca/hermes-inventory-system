@php
    $breadcrumbs = [
        ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
        ['name' => 'Categorías', 'href' => route('admin.categories.index')],
        ['name' => 'Editar']
    ];
@endphp

<x-admin-layout 
    title="Categorías - Hermes System"
    :breadcrumbs="$breadcrumbs"
>

    <x-wire-card>
        <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <x-wire-input 
                label="Nombre" 
                name="name" 
                placeholder="Nombre de la categoría" 
                value="{{ old('name', $category->name) }}" 
            />

            <x-wire-textarea 
                label="Descripción" 
                name="description" 
                placeholder="Descripción de la categoría" 
            >
                {{ old('description', $category->description) }}
            </x-wire-textarea>

            <div class="flex justify-end">
                 <x-wire-button light zinc class="mr-2 font-semibold text-xs uppercase tracking-widest" href="{{ route('admin.categories.index') }}">
                    Regresar
                </x-wire-button>
                
                <x-button>Actualizar</x-button>
            </div>

        </form>
    </x-wire-card>

</x-admin-layout>