{{-- @if (auth()->user()->hasPermission('up/date_admins')) --}}
    <a href="{{ route('customers.show', $id) }}" class="btn btn-info btn-sm"><i class="fa fa-folder-open"></i></a>
    <a href="{{ route('customers.edit', $id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
{{--     
    <form action="{{ route('customers.destroy', $id) }}" class="my-1 my-xl-0" method="post" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></button>
    </form>  --}}
{{-- @endif --}}
