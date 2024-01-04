@extends('admin.partials.template')

@section('content')

            <div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Admin List</h4>
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
                        @foreach($adminlist as $al)
                          <tr class="table-primary">
                            <td> {{$al->id}} </td>
                            <td> {{$al->firstname}} {{$al->lastname}}</td>
                            <td> {{$al->email}} </td>
                            <td> {{$al->address}} </td>
                            <td> {{$al->contact}} </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="pagination">
                {{$adminlist->links()}}
              </div>


@endsection