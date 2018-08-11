@extends('layouts.admin-main')

@section('content')
<div class="container-fluid">
  <div class="col-md-2">
      @include('admin.vehicle.summary')
  </div>
  <div class="col-md-10">
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="row">
        <div class="well">
          <h3>Edit active hire</h3>
          <form action="{{ route('hire.edit', ['vehicle_id' => $vehicle->id, 'hire_id' => $hire->id]) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-row">
              <input id="vehicle" class="form-control" type="hidden" value="{{ $vehicle->name() }}" disabled/>
              <div class="form-group{{ $errors->has('made_by') ? ' has-error' : '' }}">
                <div class="form-row">
                  <label for="made_by">Hired By*</label>
                  {{ Form::text('hired_by', $hire->hired_by, array('class' => 'form-control', 'autocomplete' => 'off')) }}
                  @if( $errors->has('hired_by'))
                    <div class="help-block">
                      <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-alert" aria-hidden="true"></span> <strong>{{ $errors->first('hired_by') }}</strong>
                      </div>
                    </div>
                  @endif
                </div>
              </div>
              <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                <div class="form-row">
                  <label for="start_date_readonly">Start Date*</label>
                  <div class="input-group">
                    <input id="start_date_readonly" class="form-control" type="text" value="{{ $hire->start_date }}" disabled/>
                    <span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span></span>
                  </div>
                  @if( $errors->has('start_date'))
                    <div class="help-block">
                      <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-alert" aria-hidden="true"></span> <strong>{{ $errors->first('start_date') }}</strong>
                      </div>
                    </div>
                  @endif
                </div>
              </div>
              <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                <div class="form-row">
                  <label for="end_date">End Date*</label>
                  <div class="input-group">
                    {{ Form::text('end_date', $hire->end_date, array(
                      'class' => 'form-control datepicker', 'autocomplete' => 'off',
                      'placeholder' => 'e.g. '.date('Y-m-d', strtotime(date('Y-m-d') . ' +3 days')), 'id' => 'end_date'))
                    }}
                    <span class="input-group-addon" id="end_date_calender"> <span class="glyphicon glyphicon-calendar"></span></span>
                  </div>
                  @if( $errors->has('end_date'))
                    <div class="help-block">
                      <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-alert" aria-hidden="true"></span> <strong>{{ $errors->first('end_date') }}</strong>
                      </div>
                    </div>
                  @endif
                </div>
              </div>
              <div class="form-group{{ $errors->has('rate') ? ' has-error' : '' }}">
                <div class="form-row">
                  <label for="rate">Rate</label>
                  <div class="input-group">
                    <span class="input-group-addon">£</span>
                    {{ Form::text('rate', $hire->rate, array('class' => 'form-control', 'autocomplete' => 'off', 'aria-label' => 'Amount (to the nearest pound)')) }}
                  </div>
                  @if( $errors->has('rate'))
                    <div class="help-block">
                      <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-alert" aria-hidden="true"></span> <strong>{{ $errors->first('rate') }}</strong>
                      </div>
                    </div>
                  @endif
                </div>
              </div>
              @if( $errors->has('reservation') or $errors->has('hire'))
                <div class="form-group has-error">
                  <div class="form-row">
                    <span class="help-block">
                      @if($errors->has('reservation'))
                        <strong>Other reservation</strong><br>
                        <strong>Start date = {{ $errors->get('reservation')['start_date'] }}</strong><br>
                        <strong>End date = {{ $errors->get('reservation')['end_date'] }}</strong>
                        <br><br>
                      @endif
                      @if($errors->has('hire'))
                        <strong>Current active hire</strong><br>
                        <strong>Start date = {{ $errors->get('hire')['start_date'] }}</strong><br>
                        <strong>End date = {{ $errors->get('hire')['end_date'] }}</strong>
                      @endif
                    </span>,
                  </div>
                </div>
              @endif
              <div class="form-row">
                <div class="row">
                  <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('vehicle.show', ['id' => $vehicle->id]) }}" class="btn btn-primary">Cancel</a>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection