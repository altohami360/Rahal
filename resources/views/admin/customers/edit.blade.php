@extends('layouts.master')

@section('content')

    <x-master.title icon="fa fa-users"> @lang('site.customers') </x-master.title>


    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="{{ route('customers.update', $customer) }}" enctype="multipart/form-data">
                    {{-- <br> --}}
                    @csrf
                    @method('put')

                    {{-- @include('admin.partials._errors') --}}

                        {{--name--}}
                        <div class="form-group col-md-6">
                            <label>@lang('users.name') <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" value="{{ $customer->name }}" >
                            <div class="form-control-feedback text-danger">
                                @error('name')@lang('errors.error') @enderror
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>@lang('users.phone') <span class="text-danger">*</span></label>
                            <input type="text" name="phone" class="form-control @error('phone')is-invalid @enderror" value="{{ $customer->phone }}" >
                            <div class="form-control-feedback text-danger">
                                @error('phone')@lang('errors.error') @enderror
                            </div>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label>@lang('users.email') <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control @error('email')is-invalid @enderror" value="{{ $customer->email }}" >
                            <div class="form-control-feedback text-danger">
                                @error('email')@lang('errors.error') @enderror
                            </div>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label>@lang('users.phone') <span class="text-danger">*</span></label>
                            <input type="text" name="phone" class="form-control @error('phone')is-invalid @enderror" value="{{ $customer->phone }}" >
                            <div class="form-control-feedback text-danger">
                                @error('phone')@lang('errors.error') @enderror
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>@lang('drivers.gender') <span class="text-danger">*</span></label>
                            <select name="gender_id" class="form-control @error('gender_id')is-invalid @enderror" >
                                <option value="">@lang('site.choose') @lang('drivers.gender')</option>
                                @foreach ($genders as $gender)
                                    <option value="{{ $gender->id }}" @selected($gender->id == $customer->gender_id)>Male</option>
                                @endforeach
                            </select>
                            <div class="form-control-feedback text-danger">
                                @error('gender_id')@lang('errors.error') @enderror
                            </div>
                        </div>

                        <div class="col-md-3 off-set-3">
                            <label>@lang('drivers.is-active') <span class="text-danger">*</span></label>
                            <div class="toggle-flip">
                              <label>
                                <input type="checkbox" name="is_active" @checked($customer->is_active)><span class="flip-indecator" data-toggle-on="@lang('drivers.active')" data-toggle-off="@lang('drivers.not-active')"></span>
                              </label>
                            </div>
                          </div>
                    

                    
                    <div class="row">
                        <div class="form-group col-md-3">
                            <button type="submit" class="form-control btn btn-primary"><i class="fa fa-save"></i>@lang('site.update')</button>
                        </div>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection