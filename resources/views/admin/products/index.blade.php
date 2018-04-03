@extends('admin.layout.admin')

@section('content')

	<h3>Product</h3>


	<table class="table table-striped">
		<thead>
			<tr>
				<th>Product Name</th>
				<th>Description</th>
				<th>Category</th>
				<th>Size</th>
				<th>Price</th>
				<th>Picture</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@forelse($products as $product)
			<tr>
				<td>{{$product->name}}</td>
				<td>{{$product->description}}</td>
				<td>{{@count($product->category)?$product->category->name:"N/A"}}</td>
				<td>{{$product->size}}</td>
				<td>{{$product->price}}</td>
				<td>{{$product->image}}</td>
				<td>
					<form action="{{route('product.destroy',$product->id)}}" method="post">
						{{csrf_field()}}
						{{method_field('DELETE')}}
						<input type="submit" class="btn btn-danger" value="Delete">
					</form>
				</td>
			</tr>
			@empty
			@endforelse
		</tbody>
	</table>

@endsection
