@extends('admin.partials.template')

@section('content')

<div class="card py-2 d-flex justify-content-center align-items-center">
<button class="text-center justify-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">Add Team</button>

<div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content text-white" style="background:#343a40">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="staticBackdropLabel">Add delivery team</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <form action="{{route('deliveryteamadd')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="pt-2 pb-2">
                                          <label for="name">Name</label>
                                          <input type="text" name="name" id="name" class="form-control text-white">
                                        </div>
                                        <div class="pt-2 pb-2">
                                          <label for="contact">Contact</label>
                                          <input type="tel" name="contact" id="contact" class="form-control text-white">
                                        </div>
                                        <div class="pt-2 pb-2">
                                          <label for="address">Address</label>
                                          <input type="text" name="address" id="address" class="form-control text-white">
                                        </div>
                                        <div class="pt-2 pb-2">
                                          <label for="nid">NID</label>
                                          <input type="tel" name="nid" id="nid" class="form-control text-white">
                                        </div>
                                        <!-- <div class="pt-2">
                                            <label for="image">Photo</label>
                                            <input type="file" name="image" id="image" class="form-control">
                                        </div> -->
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
                    <h4 class="card-title">Delivery team List</h4>
                    <p class="card-description">
                    </p>
                    <div class="table-responsive">
                      <table class="table table-bordered table-contextual">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>NID</th>
                            <th>Address</th>
                            <th>Contact</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($deliverylist as $dl)
                          <tr class="table-primary">
                            <td> {{$dl->id}} </td>
                            <td> {{$dl->name}}</td>
                            <td> {{$dl->nid}} </td>
                            <td> {{$dl->address}} </td>
                            <td> {{$dl->contact}} </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="pagination">
              </div>


@endsection