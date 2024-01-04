@extends('admin.partials.template')

@section('content')
<div class="card py-2 d-flex justify-content-center align-items-center">
<button class="text-center justify-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">Add Product</button>

<div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content text-white" style="background:#343a40">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="staticBackdropLabel">Edit Product Details</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <form action="{{route('productadd')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="pt-2 pb-2">
                                          <label for="name">Name</label>
                                          <input type="text" name="name" id="name" class="form-control text-white">
                                        </div>
                                        <div class="pt-2 pb-2">
                                          <label for="description">Description</label>
                                          <input type="text" name="description" id="description" class="form-control text-white">
                                        </div>
                                        <div class="pt-2 pb-2">
                                          <label for="quantity">Quantity</label>
                                          <input type="number" name="quantity" id="quantity" class="form-control text-white">
                                        </div>
                                        <div class="pt-2 pb-2">
                                          <label for="catagory">Catagory</label>
                                          <input type="text" name="catagory" id="catagory" class="form-control text-white">
                                        </div>
                                        <div class="pt-2 pb-2">
                                          <label for="type">Type</label>
                                          <input type="text" name="type" id="type" class="form-control text-white">
                                        </div>
                                        <div class="pt-2 pb-2">
                                          <label for="price">Price</label>
                                          <input type="text" name="price" id="price" class="form-control text-white">
                                        </div>
                                        <div class="pt-2 pb-2">
                                          <label for="sale_price">Sale Price</label>
                                          <input type="text" name="sale_price" id="sale_price" class="form-control text-white">
                                        </div>
                                        <div class="pt-2">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" id="image" class="form-control">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
</div>

        

<div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Product List</h4>
                    <p class="card-description">
                    </p>
                    <div class="table-responsive">
                      <table class="table table-bordered table-contextual">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Name </th>
                            <th> Description </th>
                            <th> Quantity </th>
                            <th> Catagory </th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($productlist as $pl)
                          <tr class="table-primary">
                            <td>{{$pl->id}}</td>
                            <td>{{$pl->name}}</td>
                            <td>{{$pl->description}}</td>
                            <td>{{$pl->quantity}}</td>
                            <td>{{$pl->catagory}}</td>
                            <td>{{$pl->type}}</td>
                            @if($pl->sale_price != null)
                            <td>{{$pl->sale_price}}</td>
                            @else
                            <td>{{$pl->price}}</td>
                            @endif
                            <td><img src="/img/{{$pl->image}}" alt=""></td>
                            <td>
                            <a href="" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Edit</a>
                            <a href="{{route('productdelete',$pl->id)}}" class="btn btn-danger">Delete</a>
                              <!-- Modal -->
                              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content text-white" style="background:#343a40">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="staticBackdropLabel">Edit Product Details</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <form action="{{route('productupdate',$pl->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="pt-2 pb-2">
                                          <label for="name">Name</label>
                                          <input type="text" name="name" id="name" class="form-control" value="{{$pl->name}}">
                                        </div>
                                        <div class="pt-2 pb-2">
                                          <label for="description">Description</label>
                                          <input type="text" name="description" id="description" class="form-control" value="{{$pl->description}}">
                                        </div>
                                        <div class="pt-2 pb-2">
                                          <label for="quantity">Quantity</label>
                                          <input type="number" name="quantity" id="quantity" class="form-control" value="{{$pl->quantity}}">
                                        </div>
                                        <div class="pt-2 pb-2">
                                          <label for="catagory">Catagory</label>
                                          <input type="text" name="catagory" id="catagory" class="form-control" value="{{$pl->catagory}}">
                                        </div>
                                        <div class="pt-2 pb-2">
                                          <label for="type">Type</label>
                                          <input type="text" name="type" id="type" class="form-control" value="{{$pl->type}}">
                                        </div>
                                        <div class="pt-2 pb-2">
                                          <label for="price">Price</label>
                                          <input type="text" name="price" id="price" class="form-control" value="{{$pl->price}}">
                                        </div>
                                        <div class="pt-2 pb-2">
                                          <label for="sale_price">Sale Price</label>
                                          <input type="text" name="sale_price" id="sale_price" class="form-control" value="{{$pl->sale_price}}">
                                        </div>
                                        <div class="pt-2">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" id="image" class="form-control">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
</div>
              


@endsection