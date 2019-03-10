@auth
@can('touch', $computer)
<a href="/computers/{{ $computer->id }}/edit" class="btn btn-warning btn-sm mr-2 float-right">Edit</a>
<form action="/computers/{{ $computer->id }}" method="post" class="mr-2 float-right">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger btn-sm">Delete Computer</button>
</form>
@endcan
@endauth
