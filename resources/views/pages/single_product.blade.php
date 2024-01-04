@extends('layouts.main')

@section('content')

<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Product Details</h1>
            <div class="d-inline-flex mb-lg-5">
                <p class="m-0 text-white"><a class="text-white" href="">Home</a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white">{{$products->name}}</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <div class = "container-fluid pt-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Product Details</h4>
                <h1 class="display-4">{{$products->name}}</h1>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row align-items-center mb-5 text-center">
                        <div class="col-12 col-sm-12">
                            <img src="{{asset('img/'.$products->image)}}" alt="" class="rounded-circle mb-3 mb-sm-0" style="width:200px; height:200px">
                            @if($products->sale_price > 0)
                            <h5 style="padding-top:20px; margin:auto; font-size:50px">${{$products->sale_price}}</h5>
                            @else
                            <h5 style="padding-top:20px; margin:auto; font-size:50px">${{$products->price}}</h5>
                            @endif
                        </div>
                        <div class="col-12 col-sm-12 mt-5">
                            <h4>{{$products->name}}</h4>
                            <p class="m-0" style="font-size:20px">{{$products->description}}</p>
                        </div>
                        <form class="mx-auto mt-3" method="post" action="{{route('add_cart',$products->id)}}">
                            @csrf
                            <input type="number" value="1" name="quantity" min="1">
                            <input type="submit" value="Add to Cart" class="btn btn-warning">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection