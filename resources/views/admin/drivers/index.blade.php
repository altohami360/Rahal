@extends('layouts.master')

@section('content')

    <x-master.title icon="fa fa-id-card"> @lang('site.drivers') </x-master.title>


    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <div class="row mb-2">

                    <div class="col-md-12"> 
                        {{-- @if (auth()->user()->hasPermission('read_admins')) --}}
                            <a href="{{ route('drivers.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.create')</a>
                        {{-- @endif --}}
                    </div>

                </div><!-- end of row -->

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" id="data-table-search" class="form-control" autofocus placeholder="@lang('site.search')">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <select name="is_active" id="is_active">
                                <option value="">@lang('drivers.is-active')</option>
                                <option value="active">@lang('drivers.active')</option>
                                <option value="not">@lang('drivers.not-active')</option>
                            </select>
                        </div>
                    </div>
                    


                </div><!-- end of row -->
            
                <div class="row">

                    <div class="col-md-12">

                        <div class="table-responsive">

                            <table class="table datatable" id="driver-table" style="width: 100%;">
                                <thead>
                                <tr>
                                    {{-- <th>
                                        <div class="animated-checkbox">
                                            <label class="m-0">
                                                <input type="checkbox" id="record__select-all">
                                                <span class="label-text"></span>
                                            </label>
                                        </div>
                                    </th> --}}
                                    <th>@lang('users.name')</th>
                                    {{-- <th>@lang('users.email')</th> --}}
                                    <th>@lang('drivers.gender')</th>
                                    {{-- <th>@lang('drivers.service')</th> --}}
                                    <th>@lang('balances.balance')</th>
                                    <th>@lang('drivers.trips-count')</th>
                                    <th>@lang('drivers.active') ?</th>
                                    <th>@lang('site.created_at')</th>
                                    <th>@lang('site.action')</th>
                                </tr>
                                </thead>
                            </table>

                        </div><!-- end of table responsive -->

                    </div><!-- end of col -->

                </div><!-- end of row -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

    <!-- Button trigger modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('balances.pay-balance')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('balances.recharge') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="driver_id" id="data-id" class="form-control">
                    </div>
                    <label>@lang('drivers.driver')</label>
                    <p id="data-name"></p>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">@lang('balances.balance')</label>
                        <input type="number" step="0.01" name="balance" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('site.close')</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-money" aria-hidden="true"></i>
                        @lang('balances.pay')</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')

    <script>

        let is_active;

        let driversTable = $('#driver-table').DataTable({
            dom: "tiplr",
            serverSide: true,
            processing: true,
            "language": {
                "url": "{{ asset('admin_assets/datatable-lang/' . app()->getLocale() . '.json') }}"
            },
            ajax: {
                url: '{{ route('drivers.data') }}',
                data: function (d) {
                    d.is_active = is_active;
                }
            },
            columns: [
                // {data: 'record_select', name: 'record_select', searchable: false, sortable: false, width: '1%'},
                {data: 'name', name: 'name'},
                // {data: 'email', name: 'email'},
                {data: 'gender', name: 'gender'},
                // {data: 'service', name: 'service'},
                {data: 'balance', name: 'balance', width: '14%'},
                {data: 'trips_count', name: 'trips_count'},
                {data: 'is_active', name: 'is_active'},
                {data: 'created_at', name: 'created_at', searchable: false},
                {data: 'actions', name: 'actions', searchable: false, sortable: true, width: '20%'},
            ],
            order: [[4, 'desc']],
            drawCallback: function (settings) {
                $('.record__select').prop('checked', false);
                $('#record__select-all').prop('checked', false);
                $('#record-ids').val();
                $('#bulk-delete').attr('disabled', true);
            }
        });

        $('#data-table-search').keyup(function () {
            driversTable.search(this.value).draw();
        })

        $('#is_active').on('change', function () {
            is_active = this.value;
            driversTable.ajax.reload();
        })
    </script>

@endpush