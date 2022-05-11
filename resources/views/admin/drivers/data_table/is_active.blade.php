@if ($driver->is_active)
     <i class="btn btn-success btn-sm">@lang('drivers.active')</i> 
@else
    <i class="btn btn-danger btn-sm"> @lang('drivers.not-active')</i>
@endif
