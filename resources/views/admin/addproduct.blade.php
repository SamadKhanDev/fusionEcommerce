@extends('admin.maindesign')


@section('add_product')

	@if(session('product_message'))
		<div style="border: 1px solid blue; color:white; border-radius: 4px rounded; padding: 10px; background-color: green; margin-bottom: 10px;">
                    {{ session('product_message') }}
        </div>
	@endif
	<div class="container-fluid" style="margin-left: 400px;">

		<form action="{{route('admin.postaddproduct')}}" method="POST" enctype="multipart/form-data">
			@csrf
			<input type="text" name="product_title" placeholder="Enter Product Title!"> <br> <br>
			<textarea name="product_description" placeholder="Enter Product Description!"style="width: 300px; height: 200px;"></textarea> <br> <br>
			<input type="number" name="product_quantity" placeholder="Enter Product quantity here!"> <br> <br>
			<input type="number" name="product_price" placeholder="Enter Product Price here!"> <br> <br>
			<input type="file" name="product_image"><label>Add Image here!</label> <br> <br>
			<select name="product_category">
				@foreach($categories as $category)
				<option value="{{$category->category}}">{{$category->category}}</option>
				@endforeach
			</select><label>Select A Category</label> <br> <br>
			<input type="submit" name="submit" value="Add Product"> <br> <br>
		</form>
	</div>

@endsection