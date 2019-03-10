@auth
<a href="/components/{{ $component->id }}/edit" class="btn btn-warning btn-sm mr-2 float-right">Edit</a>
<form action="/components/{{ $component->id }}" method="post" class="mr-2 float-right">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger btn-sm">Delete Component</button>
</form>
@endauth
