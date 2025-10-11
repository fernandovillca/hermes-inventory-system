<div class="flex items-center space-x-2">
    <x-wire-button warning  icon="pencil" flat gray href="{{ route('admin.products.edit', $product) }}" />

    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="delete-form">
        @csrf
        @method('DELETE')
        <x-wire-button red type="submit" icon="trash" flat gray />
    </form>
</div>