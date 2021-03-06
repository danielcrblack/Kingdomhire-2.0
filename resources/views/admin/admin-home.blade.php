@extends('layouts.admin-main')

@section('content')
<div class="row">
  <div class="col-lg-12">
    @include('admin.common.alert-success')
  </div>
  <div class="col-lg-12">
    <div class="row">
      <div class="col-lg-3 col-sm-3">
        <div class="panel panel-default admin-dashboard-panel">
          <div class="panel-heading">
            <h3>Admin Dashboard</h3>
          </div>
          <div class="panel-body">
            <h4>Welcome, {{ Auth::user()->name }}</h4>
          </div>
          <div class="panel-footer">
              <a class="btn btn-lg btn-primary" role="button" href="{{ route('admin.report') }}">
                <span class="glyphicon glyphicon-duplicate"></span>&nbsp;&nbsp;Generate Report</a>
                <hr>
              <a class="btn btn-lg btn-primary" role="button" href="{{ route('admin.vehicles.create') }}">
                <span class="glyphicon glyphicon-floppy-save"></span>&nbsp;&nbsp;Add Vehicle</a>
          </div>
        </div>
        @include('admin.charts.yearly-hires-table')
      </div>
      <div class="col-lg-9 col-sm-9">
        @include('admin.charts.active-hires')
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12">
            @if($vehicles->isNotEmpty())
              @include('admin.reservation.create')
            @endif
            @include('admin.hire.list-active') 
            @include('admin.reservation.list')
            @include('admin.hire.list-inactive') 
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            @include('admin.charts.inactive-hires')
            @include('admin.charts.reservations')
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
