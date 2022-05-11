@extends('layouts.master')

@section('content')

    <x-master.title icon="fa fa-users"> @lang('site.drivers') </x-master.title>


    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="{{ route('drivers.store') }}" enctype="multipart/form-data">
                    <h3>@lang('drivers.driver-information')</h3>
                    <br>
                    @csrf
                    @method('post')

                    {{-- @include('admin.partials._errors') --}}

                    <div class="row">
                        {{--name--}}
                        <div class="form-group col-md-6">
                            <label>@lang('users.name') <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" value="{{ old('name') }}" >
                            <div class="form-control-feedback text-danger">
                                @error('name')@lang('errors.error') @enderror
                            </div>
                        </div>

                        {{--id--}}
                        <div class="form-group col-md-6">
                            <label>@lang('drivers.personal-id') <span class="text-danger">*</span></label>
                            <input type="text" name="personal_ID" class="form-control @error('personal_ID')is-invalid @enderror" value="{{ old('personal_ID') }}" >
                            <div class="form-control-feedback text-danger">
                                @error('personal_ID')@lang('errors.error') @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        {{--phone--}}
                        <div class="form-group col-md-6">
                            <label>@lang('users.phone') <span class="text-danger">*</span></label>
                            <input type="phone" name="phone" class="form-control @error('phone')is-invalid @enderror" value="{{ old('phone') }}" >
                            <div class="form-control-feedback text-danger">
                                @error('phone')@lang('errors.error') @enderror
                            </div>
                        </div>

                        {{--email--}}
                        <div class="form-group col-md-6">
                            <label>@lang('users.email') <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control @error('email')is-invalid @enderror" value="{{ old('email') }}" >
                            <div class="form-control-feedback text-danger">
                                @error('email')@lang('errors.error') @enderror
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        {{--gender--}}
                        <div class="form-group col-md-3">
                            <label>@lang('drivers.gender') <span class="text-danger">*</span></label>
                            <select name="gender_id" class="form-control @error('gender_id')is-invalid @enderror" >
                                <option value="">@lang('site.choose') @lang('drivers.gender')</option>
                                @foreach ($genders as $gender)
                                    <option value="{{ $gender->id }}" @selected($gender->id == old('gender_id'))>Male</option>
                                @endforeach
                            </select>
                            <div class="form-control-feedback text-danger">
                                @error('gender_id')@lang('errors.error') @enderror
                            </div>
                        </div>
                        
                        {{--birthday--}}
                        <div class="form-group col-md-3">
                            <label>@lang('drivers.birthday') <span class="text-danger">*</span></label>
                            <input class="form-control @error('birthday')is-invalid @enderror" name="birthday" id="demoDate" type="date" value="{{ old('birthday') }}">
                            <div class="form-control-feedback text-danger">
                                @error('birthday')@lang('errors.error') @enderror
                            </div>
                        </div>

                        
                        {{--nationality_id--}}
                        <div class="form-group col-md-6">
                            <label>@lang('drivers.nationality') <span class="text-danger">*</span></label>
                            <select name="nationality_id" class="form-control @error('nationality_id')is-invalid @enderror" >
                                <option value="">@lang('site.choose') @lang('drivers.nationality')</option>
                                @foreach ($nationalities as $nationality)
                                    <option value="{{ $nationality->id }}" @selected($nationality->id == old('nationality_id'))>{{ $nationality->nationality }}</option>
                                @endforeach
                            </select>
                            <div class="form-control-feedback text-danger">
                                @error('nationality_id')@lang('errors.error') @enderror
                            </div>
                        </div>

                    </div>

                    <div class="row">

                    
                    </div>

                    <div class="row">
                        {{--image--}}
                        <div class="form-group col-md-6">
                            <label>@lang('drivers.driver-image')</label>
                            <input type="file" name="image" class="form-control @error('image')is-invalid @enderror">
                            <div class="form-control-feedback text-danger">
                                @error('image')@lang('errors.error') @enderror
                            </div>
                        </div>
                        
                        {{--identification_card_image--}}
                        <div class="form-group col-md-6">
                            <label>@lang('drivers.identification-card-image')</label>
                            <input type="file" name="identification_card_image" class="form-control @error('identification_card_image')is-invalid @enderror">
                            <div class="form-control-feedback text-danger">
                                @error('identification_card_image')@lang('errors.error') @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        {{--service--}}
                        <div class="form-group col-md-6">
                            <label>@lang('drivers.service') <span class="text-danger">*</span></label>
                            <select name="service_id" class="form-control @error('service_id')is-invalid @enderror" >
                                <option value="">@lang('site.choose') @lang('drivers.service')</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}" @selected($service->id == old('service_id'))>{{ $service->service }}</option>
                                @endforeach
                            </select>
                            <div class="form-control-feedback text-danger">
                                @error('service_id')@lang('errors.error') @enderror
                            </div>
                        </div>
                    
                    </div>

                    <hr>
                    <h3>@lang('drivers.car-information')</h3>
                    <br>
                    <div class="row">
                        {{--car_type_id--}}
                        <div class="form-group col-md-6">
                            <label>@lang('drivers.car-type') <span class="text-danger">*</span></label>
                            <select name="car_type_id" class="form-control @error('car_type_id')is-invalid @enderror" >
                                <option value="">@lang('site.choose') @lang('drivers.service')</option>
                                @foreach ($cars as $car)
                                    <option value="{{ $car->id }}" @selected($car->id == old('car_type_id'))>{{ $car->type }}</option>
                                @endforeach
                            </select>
                            <div class="form-control-feedback text-danger">
                                @error('car_type_id')@lang('errors.error') @enderror
                            </div>
                        </div>
                    </div>

                    
                    <div class="row">
                        {{--model--}}
                        <div class="form-group col-md-6">
                            <label>@lang('site.choose') @lang('drivers.model')</label>
                            <input type="text" name="model" class="form-control @error('model')is-invalid @enderror" value="{{ old('model') }}">
                            <div class="form-control-feedback text-danger">
                                @error('model')@lang('errors.error') @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        {{--plate_number--}}
                        <div class="form-group col-md-6">
                            <label>@lang('drivers.plate-number')</label>
                            <input type="text" name="plate_number" class="form-control @error('plate_number') is-invalid @enderror" value="{{ old('plate_number') }}">
                            <div class="form-control-feedback text-danger">
                                @error('plate_number')@lang('errors.error') @enderror
                            </div>
                        </div>
                    </div>

                    
                    <div class="row">
                        {{--identification_card_image--}}
                        <div class="form-group col-md-6">
                            <label>@lang('drivers.color')</label>
                            <select name="color_id" class="form-control @error('color_id')is-invalid @enderror">
                                <option value="">@lang('site.choose') @lang('drivers.color')</option>
                                @foreach ($colors as $color)
                                    <option value="{{ $color->id }}" @selected($color->id == old('color_id'))>{{ $color->name }}</option>
                                @endforeach
                            </select>
                            <div class="form-control-feedback text-danger">
                                @error('color_id')@lang('errors.error') @enderror
                            </div>
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>@lang('drivers.car-insurance-image')</label>
                            <input type="file" class="form-control @error('car_insurance_image')is-invalid @enderror" name="car_insurance_image">
                            <div class="form-control-feedback text-danger">
                                @error('car_insurance_image')@lang('errors.error') @enderror
                            </div>
                        </div>
                    </div>

                    <h5>@lang('drivers.car-image')</h5>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>@lang('drivers.car-image-front')</label>
                            <input type="file" class="form-control @error('car_image_front')is-invalid @enderror" name="car_image_front" value="{{ old('car_image_front') }}">
                            <div class="form-control-feedback text-danger">
                                @error('car_image_front')@lang('errors.error') @enderror
                            </div>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label>@lang('drivers.car-image-back')</label>
                            <input type="file" class="form-control @error('car_image_back')is-invalid @enderror" name="car_image_back" value="{{ old('car_image_back') }}">
                            <div class="form-control-feedback text-danger">
                                @error('car_image_back')@lang('errors.error') @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>@lang('drivers.car-image-right')</label>
                            <input type="file" class="form-control @error('car_image_right')is-invalid @enderror" name="car_image_right" value="{{ old('car_image_right') }}">
                            <div class="form-control-feedback text-danger">
                                @error('car_image_right')@lang('errors.error') @enderror
                            </div>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label>@lang('drivers.car-image-left')</label>
                            <input type="file" class="form-control @error('car_image_left')is-invalid @enderror" name="car_image_left" value="{{ old('car_image_left') }}">
                            <div class="form-control-feedback text-danger">
                                @error('car_image_left')@lang('errors.error') @enderror
                            </div>
                        </div>
                    </div>


                    
                    <div class="row">
                        <div class="form-group col-md-3">
                            <button type="submit" class="form-control btn btn-primary"><i class="fa fa-plus"></i>@lang('site.create')</button>
                        </div>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection