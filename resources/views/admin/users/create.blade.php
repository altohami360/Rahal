@extends('layouts.master')

@section('content')

    <x-master.title icon="fa fa-users">  @lang('site.users')</x-master.title>


    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    {{-- @include('admin.partials._errors') --}}

                    {{--name--}}
                    <div class="form-group">
                        <label>@lang('users.name') <span class="text-danger">*</span></label>
                        <input type="text" name="name" autofocus class="form-control" value="{{ old('name') }}" >
                    </div>

                    {{--email--}}
                    <div class="form-group">
                        <label>@lang('users.email') <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" >
                    </div>

                    {{--password--}}
                    <div class="form-group">
                        <label>@lang('users.password') <span class="text-danger">*</span></label>
                        <input type="password" name="password" class="form-control" value="" >
                    </div>

                    {{--password_confirmation--}}
                    <div class="form-group">
                        <label>@lang('users.password_confirmation') <span class="text-danger">*</span></label>
                        <input type="password" name="password_confirmation" class="form-control" value="" >
                    </div>

                    {{--role_id--}}
                    <div class="form-group">
                        <label>@lang('roles.role') <span class="text-danger">*</span></label>
                        <select name="role_id" class="form-control select2" >
                            <option value="">@lang('site.choose') @lang('roles.role')</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ $role->id == old('role_id') ? 'selected' : '' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{--image--}}
                    <div class="form-group">
                        <label>@lang('users.image')</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('site.create')</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection