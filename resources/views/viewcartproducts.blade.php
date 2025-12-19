@extends('maindesign')

@section('viewcart_products')


<div style="max-width: 1000px; margin: 0 auto; padding: 20px;">

<table style="width: 100%; border-collapse: collapse; font-family: Arial, sans-serif;">
  <thead>
    <tr style="background-color: #f2f2f2;">
      <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product Title</th>
      <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product Prices</th>
      <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product Image</th>
      <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Action</th>
    </tr>
  </thead>
  <tbody>
    @php
      $price = 0;
    @endphp
  	@foreach($cart as $cart_product)
    <tr style="border-bottom: 1px solid #ddd;">
      <td style="padding: 12px;">{{$cart_product->product->product_title}}</td>
      <td style="padding: 12px;">{{$cart_product->product->product_prices}}</td>
      <td style="padding: 12px;">
        <img style="width: 150px;" src="{{asset('products/'.$cart_product->product->product_image)}}">
      </td>
      <td style="padding: 12px;"><a style="padding: 10px; background-color: red; color: white;" href="{{route('removecartproducts',$cart_product->id)}}">Remove</a></td>
    </tr>
    @php
    $price=$price+$cart_product->product->product_prices;
    @endphp
    @endforeach
    <tr style="border-bottom: 1px solid #ddd; background-color: gray;">
      <td style="padding: 12px;">Total Price</td>
      <td style="padding: 12px;">=${{$price}}</td>
      <td style="padding: 12px;">
        
      </td>
      <td style="padding: 12px;"></td>
    </tr>
  </tbody>
</table>
@if(session('confirm_order'))
		<div style="border: 1px solid blue; color:white; border-radius: 4px rounded; padding: 10px; background-color: blue; margin-bottom: 10px;">
                    {{ session('confirm_order') }}
    </div>
	@endif
<form action="{{route('confirm_order')}}" method="post" style="margin-top: 20px;">
  @csrf
  <input type="text" name="receiver_address" id="" placeholder="Enter Your Address" required><br><br><br>
   <input type="text" name="receiver_phone" id="" placeholder="Enter Your Phone Number" required><br><br><br>
   <input class="btn btn-primary" type="submit" name="submit" value="Confirm Order"><br><br><br>
   <a href="{{route('stripe',$price)}}" style="background: #72d8cfff; padding: 12px;border-radius: 12px;">pay now</a>
</form>
</div>
@endsection