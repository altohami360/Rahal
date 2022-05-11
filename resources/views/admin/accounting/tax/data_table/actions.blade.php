{{-- @if (auth()->user()->hasPermission('up/date_admins')) --}}
    <a href="{{ route('drivers.show', $id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
    <a href="{{ route('drivers.edit', $id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> </a>
{{-- @endif --}}

