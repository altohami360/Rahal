@extends('layouts.master')

@section('content')

    <x-master.title icon="fa fa-users"> @lang('site.drivers') </x-master.title>


    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bs-component">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#driver">
                                        <h5><i class="fa fa-user"> </i> @lang('drivers.driver')</h5>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#car">
                                        <h5><i class="fa fa-car"> </i> @lang('drivers.car')</h5>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active show" id="driver">
                                    <div class="row p-4">
                                        <div class="col-md-6">
                                            <h5>@lang('users.name') : </h5> <p>{{ $driver->name }}</p>
                                            <h5>@lang('drivers.personal-id') : </h5> <p>{{ $driver->personal_ID }}</p>
                                            <h5>@lang('drivers.age') : </h5> <p>{{ $driver->age }}</p>
                                            <h5>@lang('drivers.nationality') : </h5> <p>{{ $driver->nationality->nationality }}</p>
                                            <h5>@lang('drivers.date'): </h5> <p>{{ $driver->created_at }}</p>
                                            <h5>@lang('drivers.is-active') </h5> {{--is Active--}}
                                            <div class="toggle-flip">
                                                <input type="checkbox" name="is_active" @checked($driver->is_active)><span class="flip-indecator" data-toggle-on="@lang('drivers.active')" data-toggle-off="@lang('drivers.not-active')"></span>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                
                                                <div class="col-md-6">
                                                    <h5><i class="fa fa-phone"> </i>  </h5> <p>{{ $driver->phone }}</p>
                                                    <h5><i class="fa fa-envelope-o"> </i></h5> <p>  {{ $driver->email }}</p>
                                                    <h5><i class="fa fa-transgender"> </i></h5> <p>  {{ $driver->gender->gender }}</p>
                                                </div>

                                                <div class="col-md-6 float-right">
                                                    <div class="tile">
                                                        <p class="text-center">@lang('drivers.driver-image')</p>
                                                        <div class="cover-image">
                                                            <img class="user-img myImg"  src="{{ asset('uploads\images\\' . $driver->image) }}">
                                                        </div>
                                                    </div>
                                                    <div class="tile">
                                                        <p class="text-center">@lang('drivers.identification-card-image')</p>
                                                        <div class="cover-image">
                                                            <img class="user-img myImg" src="{{ asset('uploads\images\\' . $driver->identification_card_image) }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="car">
                                    <div class="row p-4">
                                        <div class="col-md-6">
                                            <h5>@lang('drivers.car-type') : </h5> <p>{{ $car->carType->type }}</p>
                                            <h5>@lang('drivers.model') : </h5> <p>{{ $car->model }}</p>
                                            <h5>@lang('drivers.plate-number') : </h5> <p>{{ $car->plate_number }}</p>
                                            <h5>@lang('drivers.color') : </h5> <p>{{ $car->color->name }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6 float-right">
                                                    <div class="tile">
                                                        <p class="text-center">@lang('drivers.car-image-front')</p>
                                                        <div class="cover-image">
                                                            <img class="user-img myImg" src="{{ asset('uploads\images\\' . $car->car_image_front) }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 float-right">
                                                    <div class="tile">
                                                        <div class="cover-image">
                                                            <p class="text-center">@lang('drivers.car-image-back')</p>
                                                            <img class="user-img myImg" src="{{ asset('uploads\images\\' . $car->car_image_back) }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 float-right">
                                                    <div class="tile">
                                                        <div class="cover-image">
                                                            <p class="text-center">@lang('drivers.car-image-left')</p>
                                                            <img class="user-img myImg" src="{{ asset('uploads\images\\' . $car->car_image_left) }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 float-right">
                                                    <div class="tile">
                                                        <div class="cover-image">
                                                            <p class="text-center">@lang('drivers.car-image-right')</p>
                                                            <img class="user-img myImg" src="{{ asset('uploads\images\\' . $car->car_image_right) }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <!-- The Modal -->
                <div id="myModalImg" class="modal-img">
                    <span class="close">&times;</span>
                    <img class="modal-img-content img01" src="">
                    <div id="caption"></div>
                </div>
                

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->



@endsection