{{-- @if (auth()->user()->hasPermission('up/date_admins')) --}}
    <a href="{{ route('services.edit', $id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
{{-- @endif --}}

{{-- @if (auth()->user()->hasPermission('delete_admins')) --}}
    <form action="{{ route('services.destroy', $id) }}" class="my-1 my-xl-0" method="post" style="display: inline-block;">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></button>
    </form>
{{-- @endif --}}
