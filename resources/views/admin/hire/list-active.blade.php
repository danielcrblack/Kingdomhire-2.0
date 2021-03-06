<div class="panel panel-default">
  @if($activeHires->isNotEmpty())
    <div class="panel-heading">
      <h3>Active hires</h3>
      <span>{{ count($activeHires) }} hire(s) in total</span>
    </div>
  @else
    <div class="panel-body">
      <h3>No active hires</h3>
    </div>
  @endif
  @if($activeHires->isNotEmpty())
    <div class="scrollable-table">
      <table class="table table-condensed panel-table">
        <thead>
        <tr>
          <th class="first">ID</th>
          <th>Vehicle</th>
          <th>Start Date</th>
          <th>End Date</th>
          <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($activeHires->sortBy('end_date') as $hire)
          @include('admin.hire.destroy-modal')
          <tr>
            <td class="first">{{ $hire->name }}</td>
            <td>{{ $hire->vehicle->make_model }}</td>
            <td>{{ date('j/M/Y', strtotime($hire->start_date)) }}</td>
            <td>{{ date('j/M/Y', strtotime($hire->end_date)) }}</td>
            <td>
              <div class="btn-group btn-group-vertical" style="width: 100%">
                <div class="btn-group btn-group-sm">
                  <a href="{{ route('admin.vehicles.show', ['vehicle' => $hire->vehicle->slug]) }}"
                     class="btn btn-primary" style="width: 100%" role="button" aria-pressed="true"><span class="glyphicon glyphicon-dashboard"></span>&nbsp;&nbsp;Vehicle
                  </a>
                </div>
                <div class="btn-group btn-group-sm">
                  <a href="{{ route('admin.hires.edit', ['hire' => $hire->name]) }}"
                     class="btn btn-primary" role="button" aria-pressed="true"><span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Edit</a>
                </div>
                <div class="btn-group btn-group-sm">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#hire-{{ $hire->name }}"><span class="glyphicon glyphicon-trash"></span>&nbsp;&nbsp;Delete</button>
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