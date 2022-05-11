@extends('layouts.master')

@section('content')

  <x-master.title icon="fa fa-dashboard">@lang('site.home') </x-master.title>
  
  {{-- <div class="row">
    <div class="col-md-6 col-lg-3">
      <div class="widget-small primary coloured-icon"><i class="icon fa fa-download fa-3x"></i>
        <div class="info">
          <h4>@lang('dashboard.customers')</h4>
          <p><b>5</b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small info coloured-icon"><i class="icon fa fa-bus fa-3x"></i>
        <div class="info">
          <h4>@lang('dashboard.trips')</h4>
          <p><b>25</b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small warning coloured-icon"><i class="icon fa fa-users fa-3x"></i>
        <div class="info">
          <h4>@lang('dashboard.drivers')</h4>
          <p><b>10</b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
        <div class="info">
          <h4>@lang('dashboard.reviews')</h4>
          <p><b>500</b></p>
        </div>
      </div>
    </div>
  </div> --}}
<div class="row" id="top-statistics">

    <div class="col-md-4">

        <div class="card">

            <div class="card-body">

                <div class="d-flex justify-content-between mb-2">
                    <h4><i class="fa fa-users"></i> @lang('dashboard.customers')</h4>
                    <a href="http://127.0.0.1:8000/admin/genres">Show all ...</a>
                </div>

                <div class="loader loader-sm" style="display: none;"></div>

                <h3 class="mb-0" id="genres-count" style="">0.0</h3>
            </div>

        </div>

    </div><!-- end of col -->

    <div class="col-md-4">

        <div class="card">

            <div class="card-body">

                <div class="d-flex justify-content-between mb-2">
                  <h4><i class="fa fa-car"></i> @lang('drivers.drivers')</h4>
                    <a href="http://127.0.0.1:8000/admin/movies">Show all ...</a>
                </div>

                <div class="loader loader-sm" style="display: none;"></div>

                <h3 class="mb-0" id="movies-count" style="">0.0</h3>
            </div>

        </div>

    </div><!-- end of col -->

    <div class="col-md-4">

        <div class="card">

            <div class="card-body">

                <div class="d-flex justify-content-between mb-2">
                  <h4><i class="fa fa-road"></i> @lang('trips.trips')</h4>
                    <a href="http://127.0.0.1:8000/admin/actors">Show all ...</a>
                </div>

                <div class="loader loader-sm" style="display: none;"></div>

                <h3 class="mb-0" id="actors-count" style="">0.0</h3>
            </div>

        </div>

    </div><!-- end of col -->

</div>

<br>

<div class="row" id="top-statistics">

  <div class="col-md-4">

      <div class="card">

          <div class="card-body">

              <div class="d-flex justify-content-between mb-2">
                  <h4><i class="fa fa-star"></i> @lang('dashboard.reviews')</h4>
                  <a href="http://127.0.0.1:8000/admin/genres">Show all ...</a>
              </div>

              <div class="loader loader-sm" style="display: none;"></div>

              <h3 class="mb-0" id="genres-count" style="">0.0</h3>
          </div>

      </div>

  </div><!-- end of col -->

  <div class="col-md-4">

      <div class="card">

          <div class="card-body">

              <div class="d-flex justify-content-between mb-2">
                <h4><i class="fa fa-bus"></i> @lang('daily-trips.daily-trips')</h4>
                  <a href="http://127.0.0.1:8000/admin/movies">Show all ...</a>
              </div>

              <div class="loader loader-sm" style="display: none;"></div>

              <h3 class="mb-0" id="movies-count" style="">0.0</h3>
          </div>

      </div>

  </div><!-- end of col -->

  <div class="col-md-4">

      <div class="card">

          <div class="card-body">

              <div class="d-flex justify-content-between mb-2">
                <h4><i class="fa fa-money"></i> @lang('balances.balance')</h4>
                  <a href="http://127.0.0.1:8000/admin/actors">Show all ...</a>
              </div>

              <div class="loader loader-sm" style="display: none;"></div>

              <h3 class="mb-0" id="actors-count" style="">0.0</h3>
          </div>

      </div>

  </div><!-- end of col -->

</div>
@endsection
