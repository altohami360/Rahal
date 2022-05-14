@extends('layouts.master')

@section('content')

    <x-master.title icon="fa fa-list">  @lang('site.balance-list')</x-master.title>


    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <div class="row mb-2">

                    <div class="col-md-12">

                            {{-- <a href="{{ route('balances.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.create')</a> --}}

                            {{-- <form method="post" action="{{ route('services.bulk_delete') }}" style="display: inline-block;">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="record_ids" id="record-ids">
                                <button type="submit" class="btn btn-danger" id="bulk-delete" disabled="true"><i class="fa fa-trash"></i> @lang('site.bulk_delete')</button>
                            </form><!-- end of form --> --}}

                    </div>

                </div><!-- end of row -->

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" id="data-table-search" class="form-control" autofocus placeholder="@lang('site.search')">
                        </div>
                    </div>

                </div><!-- end of row -->

                <div class="row">

                    <div class="col-md-12">

                        <div class="table-responsive">

                            <table class="table datatable" id="table" style="width: 100%;">
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
                                    <th>@lang('users.user')</th>
                                    <th>@lang('drivers.driver')</th>
                                    <th>@lang('balances.balance')</th>
                                    <th>@lang('balances.net-balance')</th>
                                    <th>@lang('balances.tax')</th>
                                    <th>@lang('balances.tax-rate')</th>
                                    <th>@lang('site.created_at')</th>
                                    {{-- <th>@lang('site.action')</th> --}}
                                </tr>
                                </thead>
                            </table>

                        </div><!-- end of table responsive -->

                    </div><!-- end of col -->

                </div><!-- end of row -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection

@push('scripts')

    <script>

        let role;

        let table = $('#table').DataTable({
            dom: "tiplr",
            serverSide: true,
            processing: true,
            "language": {
                "url": "{{ asset('admin_assets/datatable-lang/' . app()->getLocale() . '.json') }}"
            },
            ajax: {
                url: '{{ route('balances.data') }}',
            },
            columns: [
                {data: 'users', name: 'users'},
                {data: 'drivers', name: 'drivers'},
                {data: 'balance', name: 'balance'},
                {data: 'net_balance', name: 'net_balance'},
                {data: 'tax', name: 'tax'},
                {data: 'tax_rate_id', name: 'tax_rate_id'},
                {data: 'created_at', name: 'created_at', searchable: false, sortable: true},
                // {data: 'actions', name: 'actions', searchable: false, sortable: false, width: '20%'},
            ],
            order: [[4, 'desc']],
            drawCallback: function (settings) {
                // $('#record__select-all').prop('checked', false);
                // $('#record-ids').val();
                // $('#bulk-delete').attr('disabled', true);
            }
        });

        $('#data-table-search').keyup(function () {
            table.search(this.value).draw();
        })

    </script>

@endpush