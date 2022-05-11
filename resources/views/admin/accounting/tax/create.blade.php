@extends('layouts.master')

@section('content')

    <x-master.title icon="fa fa-money"> @lang('site.balances')</x-master.title>


    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="{{ route('balances.store') }}">
                    @csrf
                    @method('post')

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>@lang('drivers.driver') <span class="text-danger">*</span></label>
                            <select name="driver_id">
                                <option value="">@lang('drivers.driver')</option>
                                @foreach ($drivers as $driver)
                                    <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>@lang('blances.balance') <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" name="balance" class="form-control" value="{{ old('balance') }}" >
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