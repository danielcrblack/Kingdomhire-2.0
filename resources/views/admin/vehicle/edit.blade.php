<div class="col-md-12">
  @if(!empty(session()->get('status')['edit']))
    <div class="alert alert-success" style="margin-top: 22px">
      <span class="glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;{{ session()->get('status')['edit'] }}
    </div>
  @endif
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 style="padding-left: 5px">Edit {{ $vehicle->name() }}</h3>
    </div>
{{--</div>--}}
  <div class="panel-body">
    {{--<div class="col-md-12">--}}
      <div class="row">
        <div class="col-md-4 col-xs-12">
          <form action="{{ route('admin.vehicle.edit', ['id' => $vehicle->id]) }}" method="post" enctype="multipart/form-data" id="vehicle_edit_form">
            @csrf
            @method('PATCH')
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="vehicle_status">Status</label>
                  @if($vehicle->status == 'Out for hire')
                    <input type="text" id="vehicle_status" class="form-control" disabled value="{{ $vehicle->status }}">
                  @else
                  <select id="vehicle_status" class="form-control" name="vehicle_status">
                    <option value="{{ $vehicle->status }}">{{ $vehicle->status }}</option>
                    @if($vehicle->status == 'Available')
                      <option value="Unavailable">Unavailable</option>
                    @else
                      <option value="Available">Available</option>
                    @endif
                  </select>
                  @endif
                </div>
                <div class="form-group">
                  <label for="rate_name">Weekly Rate</label>
                  <select id="rate_name" class="form-control" name="rate_name">
                    @if($vehicle->rate != null)
                      <option value="{{ $vehicle->rate->name }}">{{ $vehicle->rate->name }} (£{{ $vehicle->rate->weekly_rate_min }}-£{{ $vehicle->rate->weekly_rate_max }})</option>
                    @else
                      <option value="">N/A</option>
                    @endif
                    @foreach($rates as $rate)
                        @if($vehicle->rate != null)
                          @if($rate->name != $vehicle->rate->name)
                            <option value="{{ $rate->name }}">{{ $rate->name }} (£{{ $rate->weekly_rate_min }}-£{{ $rate->weekly_rate_max }})</option>
                          @endif
                        @else
                          <option value="{{ $rate->name }}">{{ $rate->name }} (£{{ $rate->weekly_rate_min }}-£{{ $rate->weekly_rate_max }})</option>
                        @endif
                    @endforeach
                  </select>
                </div>
                <div class="form-group{{ $errors->hasBag('edit') ? ' has-error' : '' }}">
                  <label for="vehicle_images_add"><span class="glyphicon glyphicon-upload"></span> Add Images</label>
                  <input type="file" name="vehicle_images_add[]" id="vehicle_images_add" value="{{ $vehicle->image_path }}" data-multiple-caption="{count} files selected" multiple>
                  @if($errors->hasBag('edit') and $errors->edit->has('vehicle_images_add'))
                    <div class="help-block">
                      <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;&nbsp;<strong>{{ $errors->edit->first('vehicle_images_add') }}</strong>
                      </div>
                    </div>
                  @endif
                </div>
                @if($vehicle->images->isNotEmpty())
                  <div class="form-group">
                    <label for="vehicle_images_del">Delete Images</label>
                    <select multiple class="form-control" name="vehicle_images_del[]" id="vehicle_images_del">
                      @foreach($vehicle->images as $image)
                        <option value="{{ $image->name }}">{{ $image->name }}</option>
                      @endforeach
                    </select>
                  </div>
                @endif
              </div>
            </div>
          </form>
          {{ Form::open(['route' => ['admin.vehicle.discontinue', $vehicle->id], 'method' => 'patch', 'id' => 'vehicle_discontinue_form']) }}
          {{ Form::close() }}
          {{ Form::open(['route' => ['admin.vehicle.delete', $vehicle->id], 'method' => 'delete', 'id' => 'vehicle_delete_form']) }}
          {{ Form::close() }}
          <div class="row">
            <div class="col-md-4 col-xs-12">
              <div class="btn-group btn-group-justified">
                <div class="btn-group">
                  <button type="submit" form="vehicle_edit_form" style="width: 100%" class="btn btn-info"><span class="glyphicon glyphicon-floppy-save"></span>&nbsp;&nbsp;Update</button>
                </div>
              </div>
            </div>
            <div class="col-md-8 col-xs-12">
              <div class="btn-group btn-group-justified">
                <div class="btn-group">
                  <button type="submit" form="vehicle_discontinue_form" class="btn btn-info"><span class="glyphicon glyphicon-lock"></span>&nbsp;&nbsp;Discontinue</button>
                </div>
                <div class="btn-group">
                  <button type="submit" form="vehicle_delete_form" class="btn btn-info"><span class="glyphicon glyphicon-trash"></span>&nbsp;&nbsp;Delete</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-7 col-sm-6 col-xs-12">
          <div class="row">
          @foreach($vehicle->images as $image)
            <div class="col-md-4 col-sm-6 col-xs-6" style="margin-top: 22px">
              <img src="{{ $image->image_uri }}" style="width: 100%; height: 175px"/>
              <table class="table">
                <tr>
                  <td class="last">{{ $image->name }}</td>
                </tr>
              </table>
            </div>
          @endforeach
          </div>
        </div>
      </div>
    {{--</div>--}}
  </div>
