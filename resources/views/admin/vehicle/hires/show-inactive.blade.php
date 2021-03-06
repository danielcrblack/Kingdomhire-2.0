<div class="panel panel-default">
  @if($inactiveHires->isNotEmpty())
  <div class="panel-heading">
    <h3>Past hires</h3>
    <h5>{{ count($inactiveHires) }} hire(s) in total</h5>
  </div>
  @else
    <div class="panel-body">
      <h3>No past hires</h3>
    </div>
  @endif
  @if($inactiveHires->isNotEmpty())
    <div class="scrollable-table">
      <table class="table table-condensed panel-table">
        <thead>
          <tr>
            <th class="first">ID</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($inactiveHires->sortByDesc('end_date') as $hire)
            @include('admin.hire.destroy-modal')
            <tr>
              <td class="first">{{ $hire->name }}</td>
              <td>{{ date('j/M/Y', strtotime($hire->start_date)) }}</td>
              <td>{{ date('j/M/Y', strtotime($hire->end_date)) }}</td>
              <td>
              <div class="btn-group btn-group-vertical" style="width: 100%">
                <div class="btn-group btn-group-sm">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#hire-{{ $hire->name }}" style="height: 37px"><span class="glyphicon glyphicon-trash"></span>&nbsp;&nbsp;Delete</button>
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