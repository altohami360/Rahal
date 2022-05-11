@foreach ($trip->week_days as $key => $week_day)
    @if ($week_day)
        <div class="badge badge-secondary">{{ $key }}</div>
    @endif
@endforeach
