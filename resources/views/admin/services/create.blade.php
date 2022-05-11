@extends('layouts.master')

@section('content')

    <x-master.title icon="fa fa-car"> @lang('site.services')</x-master.title>


    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="{{ route('services.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    {{-- @include('admin.partials._errors') --}}
                    <div class="row">

                        <div class="form-group col-md-6">
                            <label>@lang('services.name') &nbsp; (English)<span class="text-danger">*</span></label>
                            <input type="text" name="service[en]" autofocus class="form-control  @error('service.en')is-invalid @enderror" value="{{ old('service.en') }}" >
                            <div class="form-control-feedback text-danger">
                                @error('service.en')@lang('errors.error') @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>@lang('services.name')  &nbsp; (عربي)<span class="text-danger">*</span></label>
                            <input type="text" name="service[ar]" autofocus class="form-control @error('service.ar')is-invalid @enderror" value="{{ old('service.ar') }}" >
                            <div class="form-control-feedback text-danger">
                                @error('service.ar')@lang('errors.error') @enderror
                            </div>
                        </div>

                    </div>

                    {{--starting_value--}}
                    <div class="form-group">
                        <label>@lang('services.starting_value') <span class="text-danger">*</span></label>
                        <input type="number" step="0.01" name=  "starting_value" class="form-control @error('starting_value')is-invalid @enderror" value="{{ old('starting_value') }}" >
                        <div class="form-control-feedback text-danger">
                            @error('starting_value')@lang('errors.error') @enderror
                        </div>
                    </div>

                    {{--per_kilometer--}}
                    <div class="form-group">
                        <label>@lang('services.per_kilometer') <span class="text-danger">*</span></label>
                        <input type="number" step="0.01" name="per_kilometer" class="form-control @error('per_kilometer')is-invalid @enderror" value="{{ old('per_kilometer') }}" >
                        
                        <div class="form-control-feedback text-danger">
                            @error('per_kilometer')@lang('errors.error') @enderror
                        </div>
                    </div>

                    {{--per_minute--}}
                    <div class="form-group">
                        <label>@lang('services.per_minute') <span class="text-danger">*</span></label>
                        <input type="number" step="0.01" name="per_minute" class="form-control @error('per_minute')is-invalid @enderror" value="{{ old('per_minute') }}" >
                        <div class="form-control-feedback text-danger">
                            @error('per_minute')@lang('errors.error') @enderror
                        </div>
                    </div>
                    <div class="row">
                        {{--description--}}
                        <div class="form-group col-md-6">
                            <label>@lang('services.description')   &nbsp; (English)</label>
                            <textarea class="form-control @error('description.en')is-invalid @enderror" name="description[en]">{{ old('description.en') }}</textarea>
                            <div class="form-control-feedback text-danger">
                                @error('description.en')@lang('errors.error') @enderror
                            </div>
                        </div>
                        <div class="form-group  col-md-6">
                            <label>@lang('services.description')  &nbsp; (عربي)</label>
                            <textarea class="form-control @error('description.ar')is-invalid @enderror" name="description[ar]">{{ old('description.ar') }}</textarea>
                            <div class="form-control-feedback text-danger">
                                @error('description.ar')@lang('errors.error') @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('site.create')</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection