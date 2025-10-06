@php
    $breadcrumbs = [
        ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
        ['name' => 'Categorías', 'href' => route('admin.categories.index')],
        ['name' => 'Crear']
    ];
@endphp

<x-admin-layout 
    title="Categorías - Hermes System"
    :breadcrumbs="$breadcrumbs"
>

    <x-wire-card>
        <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-4">
            @csrf

            <x-wire-input 
                label="Nombre" 
                name="name" 
                placeholder="Nombre de la categoría" 
                value="{{ old('name') }}" 
            />

            <x-wire-textarea 
                label="Descripción" 
                name="description" 
                placeholder="Descripción de la categoría" 
                value="{{ old('description') }}"
            />

            <div class="flex justify-end">
                <x-wire-button light zinc class="mr-2 font-semibold text-xs uppercase tracking-widest" href="{{ route('admin.categories.index') }}">
                    Cancelar
                </x-wire-button>

                <x-button>Guardar</x-button>
            </div>

        </form>
    </x-wire-card>

</x-admin-layout>