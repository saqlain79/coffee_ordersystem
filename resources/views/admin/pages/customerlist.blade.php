@extends('admin.partials.template')

@section('content')

            <div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Customer List</h4>
                    <p class="card-description">
                    </p>
                    <div class="table-responsive">
                      <table class="table table-bordered table-contextual">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Contact</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($customerlist as $cl)
                          <tr class="table-primary">
                            <td> {{$cl->id}} </td>
                            <td> {{$cl->firstname}} {{$cl->lastname}}</td>
                            <td> {{$cl->email}} </td>
                            <td> {{$cl->address}} </td>
                            <td> {{$cl->contact}} </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="pagination">
                {{$customerlist->links()}}
              </div>


@endsection