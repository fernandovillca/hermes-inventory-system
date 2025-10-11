@php
    $breadcrumbs = [
        ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
        ['name' => 'Productos']
    ];
@endphp

<x-admin-layout 
    title="Productos - Hermes System"
    :breadcrumbs="$breadcrumbs"
>
    @push('css')
        <style>
            table th span, table td {
                font-size: 0.80rem !important;
            }
        </style>
    @endpush

    <x-slot name="action">
        <x-wire-button blue icon="plus" href="{{ route('admin.products.create') }}">
            Nuevo Producto
        </x-wire-button>
    </x-slot>

   @livewire('admin.datatables.product-table')

   @push('js')
      <script>
            forms = document.querySelectorAll('.delete-form');

            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    Swal.fire({
                        title: '¿Estás seguro de eliminar este producto?',
                        text: "¡No podrás revertir esto!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, eliminar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.submit();
                        }
                    });
                });
            });
      </script>
   @endpush
</x-admin-layout>