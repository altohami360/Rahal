@extends('layouts.master')

@section('content')

    <x-master.title icon="fa fa-users"> @lang('site.customers') </x-master.title>


    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h2 class="page-header"><i class="fa fa-user"> </i> @lang('customers.customer')</h2>
                    </div>
                    <div class="col-md-6 text-right">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h5>@lang('users.name') : </h5> <p>{{ $customer->name }}</p>
                        <h5>@lang('drivers.gender') : </h5> <p>{{ $customer->gender->gender }}</p>
                        <h5>@lang('drivers.date'): </h5> <P>{{ $customer->created_at }}</P>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            
                            <div class="col-md-6">
                                <h5><i class="fa fa-phone"> </i></h5> <p>{{ $customer->phone }}</p>
                                <h5><i class="fa fa-envelope-o"> </i></h5> <p>{{ $customer->email }}</p>
                            </div>

                            <div class="col-md-6 float-right">
                                <div class="tile">
                                    <div class="cover-image">
                                        <img class="user-img" src="{{ asset('uploads\images\\' . $customer->image) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection