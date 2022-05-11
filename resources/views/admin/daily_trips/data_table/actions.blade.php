{{-- @if (auth()->user()->hasPermission('up/date_admins')) --}}
    <a href="{{ route('daily-trips.show', $id) }}" class="btn btn-info btn-sm"><i class="fa fa-folder-open"></i></a>
{{-- @endif --}}
