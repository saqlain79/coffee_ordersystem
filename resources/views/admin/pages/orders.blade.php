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
                            <th>#</th>
                            <th> Product Name </th>
                            <th> Quantity </th>
                            <th> Price </th>
                            <th> Customer Name </th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>Payment Status</th>
                            <th>Delivery Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="table-primary">
                            @foreach($order as $order)
                            <td>{{$order->id}}</td>
                            <td>{{$order->name}}</td>
                            <td>{{$order->quantity}}</td>
                            <td>{{$order->price}}</td>
                            <td>{{$order->lastname}}</td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->contact}}</td>
                            <td>{{$order->payment_status}}</td>
                            <td>{{$order->delivery_status}}</td>
                            @if($order->delivery_status == 'pending')
                            <td>
                              <a href="{{route('delivered',$order->id)}}"><button class="btn btn-inverse-success btn-fw">Delivered</button></a>
                            </td>
                            @else
                              <p>Delivered</p>
                            @endif
                              <td><a href="{{route('printpdf',$order->id)}}"><button class="btn btn-inverse-info btn-fw">Print PDF</button></a></td>
                            @endforeach
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="pagination">
              </div>


@endsection