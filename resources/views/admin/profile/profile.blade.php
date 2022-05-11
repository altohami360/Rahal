@extends('layouts.master')

@section('content')

    <x-master.title icon="fa fa-user-circle"> @lang('site.profile') </x-master.title>


    <div class="row">

        

        <div class="col-md-8">
            <div class="tile shadow">

                <form method="post" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    {{-- @include('admin.partials._errors') --}}

                    {{--name--}}
                    <div class="form-group">
                        <label>@lang('users.name')</label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                    </div>

                    {{--email--}}
                    <div class="form-group">
                        <label>@lang('users.email')</label>
                        <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                    </div>

                    {{--image--}}
                    <div class="form-group">
                        <label>@lang('users.image')</label>
                        <input type="file" name="image" class="form-control" value="">
                    </div>

                    {{--Role--}}
                    <div class="form-group">
                        <label>@lang('users.role')</label>
                        @foreach ($user->roles as $role)
                            <div class="bs-component" style="margin-bottom: 40px;"><span class="badge badge-primary">{{ $role->display_name }}</span></div>
                        @endforeach
                        {{$user->image}}
                    </div>

                    {{--submit--}}
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.edit')</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->
        
        <div class="col-md-4">
            <div class="tile shadow">
                <div class="cover-image">
                    <img class="user-img" src="{{ asset('uploads\images\users\\' . $user->image) }}">
                </div>
            </div>
        </div>

    </div><!-- end of row -->
@endsection

