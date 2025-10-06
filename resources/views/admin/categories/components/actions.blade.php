<div class="flex items-center space-x-2">
    <x-wire-button warning  icon="pencil" flat gray href="{{ route('admin.categories.edit', $category) }}" />

    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="delete-form">
        @csrf
        @method('DELETE')
        <x-wire-button red type="submit" icon="trash" flat gray />
    </form>
</div>