@php
    $breadcrumbs = [
        ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
        ['name' => 'Pruebas']
    ];
@endphp

<x-admin-layout 
    title="Dashboard - Hermes System"
    :breadcrumbs="$breadcrumbs"
>

    <x-slot name="action">
        hola mundoo
    </x-slot>
    Hola desde el dashboard
</x-admin-layout>