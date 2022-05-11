@extends('layouts.master')

@section('content')

    <x-master.title icon="fa fa-bus">  @lang('site.daily-trips')</x-master.title>


    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <div class="row mb-2">

                    {{-- <div class="col-md-12">

                            <a href="{{ route('services.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.create')</a>

                            <form method="post" action="{{ route('services.bulk_delete') }}" style="display: inline-block;">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="record_ids" id="record-ids">
                                <button type="submit" class="btn btn-danger" id="bulk-delete" disabled="true"><i class="fa fa-trash"></i> @lang('site.bulk_delete')</button>
                            </form><!-- end of form -->

                    </div> --}}

                </div><!-- end of row -->

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="search" id="data-table-search" class="form-control" autofocus placeholder="@lang('site.search')">
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
                                    <th>@lang('trips.pickup')</th>
                                    <th>@lang('trips.dropoff')</th>
                                    <th>@lang('trips.distance')</th>
                                    <th>@lang('trips.cost')</th>
                                    <th>@lang('trips.week-days')</th>
                                    <th>@lang('trips.customer')</th>
                                    <th>@lang('drivers.driver')</th>
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


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('drivers.assign-driver')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="id" id="data-id" class="form-control">
                        </div>
                        <h4>@lang('site.send') @lang('site.request')</h4>
                        <p id="data-name">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quasi itaque aperiam sapiente ut consequuntur sit voluptatum possimus labore officia facere consequatur quibusdam, natus placeat quaerat odit inventore excepturi cupiditate nulla.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('site.close')</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i>
                            @lang('site.send')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

    <script>

        let status;

        let dailytripsTable = $('#table').DataTable({
            dom: "tiplr",
            serverSide: true,
            processing: true,
            "language": {
                "url": "{{ asset('admin_assets/datatable-lang/' . app()->getLocale() . '.json') }}"
            },
            ajax: {
                url: '{{ route('daily-trips.data') }}',
                data:function(d){
                    d.status_id = status;
                }
            },
            columns: [
                {data: 'pickup_address', name: 'pickup_address'},
                {data: 'dropoff_address', name: 'dropoff_address'},
                {data: 'distance', name: 'distance'},
                {data: 'cost', name: 'cost'},
                {data: 'week_days', name: 'week_days'},
                {data: 'customer', name: 'customer'},
                {data: 'driver', name: 'driver', width: '16%'},
                {data: 'created_at', name: 'created_at', searchable: false, width: '25%'},
                {data: 'actions', name: 'actions', searchable: false, sortable: false, width: '20%'},
            ],
            order: [[4, 'desc']],
            drawCallback: function (settings) {
                // $('#record__select-all').prop('checked', false);
                // $('#record-ids').val();
                // $('#bulk-delete').attr('disabled', true);
            }
        });

        $('#data-table-search').keyup(function () {
            dailytripsTable.search(this.value).draw();
        })

        
        // $('#status').on('change', function () {
        //     status = this.value;
        //     dailytripsTable.ajax.reload();
        //     console.log(status);
        // })

    </script>

@endpush