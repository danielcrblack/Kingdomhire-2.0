@extends('layouts.admin-main')

@section('content')
<div class="row">
  <div class="col-lg-3 col-md-5 col-sm-6 col-xs-12">
    @include('admin.common.alert')
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3>Admin dashboard</h3>
      </div>
      <div class="panel-body">
        <h4 style="text-align: center;">Welcome, {{ Auth::user()->name }}</h4>
      </div>
    </div>
    @include('admin.reservation.create')
  </div>
  <div class="col-lg-9 col-md-7 col-xs-12">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        @include('admin.charts.active-hires')
      </div>
      <div class="col-lg-5 col-md-12 col-sm-6 col-xs-12">
        @include('admin.hire.list-active')
        @include('admin.reservation.list')
      </div>
      <div class="col-lg-7 col-md-12 col-sm-6 col-xs-12">
        <div class="row">
          <div class="col-lg-4">
            @include('admin.charts.yearly-hires-table')
          </div>
          <div class="col-lg-8">
            @include('admin.charts.inactive-hires')
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
