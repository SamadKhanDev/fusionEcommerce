    @extends('maindesign')
    <base href="/public">


    @section('product_details')

    @if(session('cart_message'))
        <div style="border: 1px solid blue; color:white; border-radius: 4px rounded; padding: 10px; background-color: green; margin-bottom: 10px;">
                    {{ session('cart_message') }}
        </div>
    @endif
    <div style="max-width: 1000px; margin: 0 auto; padding: 20px;">
        <a href="{{route('index')}}" style="display: inline-block; margin-bottom: 20px; color: #2a5885; text-decoration: none;">&larr; Back to Products</a>
        
        <!-- Product Details Section -->
        <div style="background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
            <!-- Product Image -->
            <img src="{{asset('products/'.$product->product_image)}}" alt="Premium Headphones" style="width: 100%; max-height: 500px; object-fit: cover;">
            
            <!-- Product Info -->
            <div style="padding: 30px;">
                <h1 style="margin: 0 0 15px; color: #333;">{{$product->product_title}}</h1>
                <div style="display: flex; align-items: center; margin-bottom: 20px;">
                    <span style="font-size: 24px; font-weight: bold; color: #2a5885;">${{$product->product_prices}}</span>
                    
                </div>
                
                <!-- Product Description -->
                <div style="margin-bottom: 30px;">
                    <h2 style="margin: 0 0 10px; font-size: 18px; color: #333;">Description</h2>
                    <p style="margin: 0; color: #555; line-height: 1.6;">
                        {{$product->product_description}}
                    </p>
                </div>
                <!-- Add to Cart Button -->
                <a href="{{route('add_to_cart',$product->id)}}" style="background: #2a5885; color: white; border: none; padding: 12px 25px; font-size: 16px; border-radius: 4px; cursor: pointer;">Add to Cart</a>
                <a href="{{route('stripe',$product->product_prices)}}" style="background: #72d8cfff; padding: 12px;border-radius: 12px;">pay now</a>

            </div>
        </div>
        
        <!-- Comments Section -->
        <div style="margin-top: 30px; background: white; border-radius: 8px; padding: 25px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
            <h2 style="margin: 0 0 20px; color: #333;">Customer Reviews</h2>
            
            <!-- Comment Form -->
            <div style="margin-bottom: 30px;">
                <h3 style="margin: 0 0 15px; font-size: 16px; color: #333;">Add Your Review</h3>
                <form>
                    <div style="margin-bottom: 15px;">
                        <input type="text" placeholder="Your Name" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
                    </div>
                    <div style="margin-bottom: 15px;">
                        <textarea placeholder="Your Review" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; min-height: 100px;"></textarea>
                    </div>
                    <button type="submit" style="background: #2a5885; color: white; border: none; padding: 10px 20px; font-size: 14px; border-radius: 4px; cursor: pointer;">Submit Review</button>
                </form>
            </div>
            
            <!-- Existing Comments -->
            <div>
                <div style="border-bottom: 1px solid #eee; padding-bottom: 15px; margin-bottom: 15px;">
                    <h4 style="margin: 0 0 5px; color: #333;">John D.</h4>
                    <p style="margin: 0 0 5px; color: #555;">These headphones are amazing! The noise cancellation works perfectly on my commute.</p>
                    <small style="color: #999;">Posted on January 15, 2023</small>
                </div>
                
                <div style="border-bottom: 1px solid #eee; padding-bottom: 15px; margin-bottom: 15px;">
                    <h4 style="margin: 0 0 5px; color: #333;">Sarah M.</h4>
                    <p style="margin: 0 0 5px; color: #555;">Great sound quality and very comfortable for long listening sessions.</p>
                    <small style="color: #999;">Posted on December 5, 2022</small>
                </div>
            </div>
        </div>
    </div>
    @endsection
