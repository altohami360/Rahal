{{-- @if (auth()->user()->hasPermission('up/date_admins')) --}}
    <a href="{{ route('drivers.show', $id) }}" class="btn btn-info btn-sm"><i class="fa fa-folder-open"></i></a>
    <a href="{{ route('drivers.edit', $id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> </a>
{{-- @endif --}}

{{-- @if (auth()->user()->hasPermission('delete_admins')) --}}
    <form action="{{ route('drivers.destroy', $id) }}" class="my-1 my-xl-0" method="post" style="display: inline-block;">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></button>
    </form> 
{{-- @endif --}}
<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
    {{-- <button class="btn btn-info" type="button">Info</button> --}}
    <div class="btn-group" role="group">
      {{-- <button class="btn btn-secondary  dropdown-toggle btn-sm" id="btnGroupDrop3" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> --}}
        {{-- <i class="fa fa-trash"></i> --}}
      </button>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="#">Dropdown link</a>
            <a class="dropdown-item" href="#">Dropdown link</a>
        </div>
    </div>
  </div>