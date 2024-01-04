@extends('admin.partials.template')

@section('content')

<div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Employee List</h4>
                    <p class="card-description">
                    </p>
                    <div class="table-responsive">
                      <table class="table table-bordered table-contextual">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Name </th>
                            <th> Email </th>
                            <th> Address </th>
                            <th> Contact </th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($employeelist as $el)
                          <tr class="table-primary">
                            <td> {{$el->id}} </td>
                            <td> {{$el->firstname}} {{$el->lastname}}</td>
                            <td> {{$el->email}} </td>
                            <td> {{$el->address}} </td>
                            <td> {{$el->contact}} </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
</div>
              <div class="pagination">
                {{$employeelist->links()}}
              </div>


@endsection