@extends('layouts.master')

@section('content')
    <x-master.title icon="fa fa-road"> @lang('site.trips')</x-master.title>


    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <div class="row mb-4">
                    <div class="col-md-6">
                        <h2 class="page-header"><i class="fa fa-road"> </i> @lang('trips.trip')</h2>
                    </div>
                    <div class="col-md-6 text-right">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <h5>@lang('trips.pickup') : </h5>
                        <p>{{ $trip->pickup_address }}</p>
                        <h5>@lang('trips.dropoff') : </h5>
                        <p>{{ $trip->dropoff_address }}</p>
                        <h5>@lang('drivers.driver') : </h5>
                        <p>{{ $trip->driver->name }}</p>
                        <h5>@lang('customers.customer') : </h5>
                        <p>{{ $trip->customer->name }}</p>
                        <h5>@lang('trips.cost')</h5>
                        <p>{{ $trip->cost }} <sub>SAR</sub> </p>
                        <h5>@lang('trips.distance')</h5>
                        <p>{{ $trip->distance }} <sub>KM</sub> </p>
                        <h5>@lang('trips.note')</h5>
                        <p>{{ $trip->note }}</p>
                    </div>
                    {{-- <div class="col-md-6">

                        <div class="col-md-6">
                            @foreach ($statuses as $status)
                                <h5>{{ $status->status }}</h5>
                            @endforeach
                        </div>

                    </div> --}}
                </div>
            </div>

        </div><!-- end of tile -->

    </div><!-- end of col -->
@endsection
