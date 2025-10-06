@php
    $breadcrumbs = [
        ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
        ['name' => 'Categorías']
    ];
@endphp

<x-admin-layout 
    title="Categorías - Hermes System"
    :breadcrumbs="$breadcrumbs"
>

    <x-slot name="action">
        <x-wire-button blue icon="plus" href="{{ route('admin.categories.create') }}">
            Nueva Categoría
        </x-wire-button>
    </x-slot>

   @livewire('admin.datatables.category-table')

   @push('js')
      <script>
            forms = document.querySelectorAll('.delete-form');

            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    Swal.fire({
                        title: '¿Estás seguro de eliminar esta categoría?',
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