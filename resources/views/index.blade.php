@extends('maindesign')


@section('index')
@include('slider')
<div class="container">
  <div class="heading_container heading_center">
    <h2>
      Latest Products
    </h2>
  </div>
  <div class="row">
    @foreach($products as $product)
    <div class="col-sm-6 col-md-4 col-lg-3">
      <div class="box">
        <a href="{{route('product_details',$product->id)}}">
          <div class="img-box">
            <img src="{{asset('products/'.$product->product_image)}}" alt="">
          </div>
          <div class="detail-box">
            <h6>
              {{$product->product_title}}
            </h6>
            <h6>
              Price
              <span>
                ${{$product->product_prices}}
              </span>
            </h6>
          </div>
          <div class="new">
            <span>
              New
            </span>
          </div>
        </a>
        <!-- Add to Cart Button -->
        <div style="display: flex; justify-content: space-between;">
          <a href="{{route('add_to_cart',$product->id)}}" style="background: #72a5d8ff; padding: 12px;border-radius: 12px;">Add to Cart</a>
          <a href="{{route('stripe',$product->product_prices)}}" style="background: #72d8cfff; padding: 12px;border-radius: 12px;">pay now</a>
        </div>

      </div>
    </div>
    @endforeach
  </div>
  <div class="btn-box">
    <a href="{{route('viewallproducts')}}">
      View All Products
    </a>
  </div>
</div>


@endsection