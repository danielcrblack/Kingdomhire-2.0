<div class="panel panel-default">
  @if($vehicleFuelTypes->isNotEmpty())
    <div class="panel-heading">
      <h3>Fuel types</h3>
      <h5>{{ count($vehicleFuelTypes) }} fuel type(s) in total</h5>
    </div>
  @else
    <div class="panel-body">
      <h3 style="margin-left: -5px">No vehicle fuel types</h3>
    </div>
  @endif
  @if($vehicleFuelTypes->isNotEmpty())
    <div class="scrollable-table">
      <table class="table table-condensed panel-table">
        <thead>
        <tr>
          <th class="first">Name</th>
          <th>Vehicles</th>
          <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($vehicleFuelTypes as $vehicleFuelType)
          <tr>
            <td class="first">{{ $vehicleFuelType->name }}</td>
            <td>{{ $vehicleFuelType->vehicles->count() }}</td>
            <td>
              <div class="btn-group btn-group-vertical" style="width: 100%">
                <div class="btn-group">
                  <a href="{{ route('admin.vehicle-fuel-types.edit', ['vehicle_fuel_type' => $vehicleFuelType->slug]) }}"
                    class="btn btn-primary" role="button" aria-pressed="true"><span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Edit</a>
                </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#vehicle-fuel-type-{{ $vehicleFuelType->id }}-delete" style="float: right"><span class="glyphicon glyphicon-trash"></span>&nbsp;&nbsp;Delete</button>
                </div>
              </div>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  @endif
</div>