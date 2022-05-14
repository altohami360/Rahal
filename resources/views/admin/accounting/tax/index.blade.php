@extends('layouts.master')

@section('content')

    <x-master.title icon="fa fa-circle-o">  @lang('balances.tax-rate')</x-master.title>


    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                        <div class="row">

                            <div class="col-md-4">
                            
                                <div class="card">
                            
                                    <div class="card-body">
                            
                                        <div class="d-flex justify-content-between mb-2">
                                            <h4><i class="fa fa-money"> </i> @lang('balances.current-tax')</h4>
                                            {{-- <a href="http://127.0.0.1:8000/customers">Show all ...</a> --}}
                                        </div>
                            
                                        <div class="loader loader-sm" style="display: none;"></div>
                            
                                        <h3 class="mb-0" id="genres-count" style="">{{ $tax_rate->tax_rate }}%</h3>
                                    </div>
                            
                                </div>
                            
                            </div>
                        </div>
                        <br>
                        <form method="post" action="{{ route('tax.store') }}">
                            @csrf
                            
                            <div class="form-group col-md-6">
                                <label>@lang('balances.tax-rate') <span class="text-danger">*</span></label>
                                <input type="number" step="0.01" name="tax_rate" autofocus class="form-control">
                            </div>
                        
                            <div class="form-group col-md">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>@lang('site.update')</button>
                            </div>
                        
                        </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection

@push('scripts')

    <script>

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
                {data: 'tax', name: 'tax'},
                {data: 'tax_rate_id', name: 'tax_rate_id'},
                {data: 'created_at', name: 'created_at', searchable: false},
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