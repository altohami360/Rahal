@extends('layouts.master')

@section('content')

    <x-master.title icon="fa fa-star">  @lang('site.reviews')</x-master.title>


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
                                    <th>@lang('users.name')</th>
                                    <th>@lang('reviews.star')</th>
                                    <th>@lang('reviews.comment')</th>
                                    {{-- <th>@lang('customer.trips_count')</th> --}}
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

@endsection

@push('scripts')

    <script>

        let reviewsTable = $('#table').DataTable({
            dom: "tiplr",
            serverSide: true,
            processing: true,
            "language": {
                "url": "{{ asset('admin_assets/datatable-lang/' . app()->getLocale() . '.json') }}"
            },
            ajax: {
                url: '{{ route('reviews.data') }}',
            },
            columns: [
                {data: 'customers', name: 'customer.name'},
                {data: 'rating', name: 'rating'},
                {data: 'comment', name: 'comment', width: '40%'},
                // {data: 'trips_count', name: 'trips_count'},
                {data: 'created_at', name: 'created_at', searchable: false},
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
            reviewsTable.search(this.value).draw();
        })

    </script>

@endpush