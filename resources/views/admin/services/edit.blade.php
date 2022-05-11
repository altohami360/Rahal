@extends('layouts.master')

@section('content')

    <x-master.title icon="fa fa-users">  @lang('site.services')</x-master.title>


    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="{{ route('services.update', $service->id) }}">
                    @csrf
                    
                    @method('put')

                    {{-- @include('admin.partials._errors') --}}

                    {{--name--}}
                    <div class="form-group">
                        <label>@lang('services.name') <span class="text-danger">*</span></label>
                        <input type="text" name="service" autofocus class="form-control @error('service')is-invalid @enderror" value="{{ $service->service }}" >
                        <div class="form-control-feedback text-danger">
                            @error('service')@lang('errors.error') @enderror
                        </div>
                    </div>

                    {{--starting_value--}}
                    <div class="form-group">
                        <label>@lang('services.starting_value') <span class="text-danger">*</span></label>
                        <input type="number" step="0.01" name="starting_value" class="form-control @error('starting_value')is-invalid @enderror" value="{{ $service->starting_value }}" >
                        <div class="form-control-feedback text-danger">
                            @error('starting_value')@lang('errors.error') @enderror
                        </div>
                    </div>

                    {{--per_kilometer--}}
                    <div class="form-group">
                        <label>@lang('services.per_kilometer') <span class="text-danger">*</span></label>
                        <input type="number" step="0.01" name="per_kilometer" class="form-control @error('per_kilometer')is-invalid @enderror" value="{{ $service->per_kilometer }}" >
                        <div class="form-control-feedback text-danger">
                            @error('per_kilometer')@lang('errors.error') @enderror
                        </div>
                    </div>

                    {{--per_minute--}}
                    <div class="form-group">
                        <label>@lang('services.per_minute') <span class="text-danger">*</span></label>
                        <input type="number" step="0.01" name="per_minute" class="form-control @error('per_minute')is-invalid @enderror" value="{{ $service->per_minute }}" >
                        <div class="form-control-feedback text-danger">
                            @error('per_minute')@lang('errors.error') @enderror
                        </div>
                    </div>

                    {{--description--}}
                    <div class="form-group">
                        <label>@lang('services.description')</label>
                        <textarea class="form-control @error('description')is-invalid @enderror" name="description">{{ $service->description }}</textarea>
                        <div class="form-control-feedback text-danger">
                            @error('description')@lang('errors.error') @enderror
                        </div>
                    </div>
                    
                    
                   
                      {{--is Active--}}
                    <div class="col-md-6">
                        {{-- <label>@lang('drivers.is-active') <span class="text-danger">*</span></label> --}}
                        <div class="toggle-flip">
                          <label>
                            <input type="checkbox" name="is_active" @checked($service->is_active)><span class="flip-indecator" data-toggle-on="@lang('drivers.active')" data-toggle-off="@lang('drivers.not-active')"></span>
                          </label>
                        </div>
                      </div>
                    <br>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>@lang('site.update')</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection