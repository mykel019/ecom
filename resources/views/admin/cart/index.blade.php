@extends('layout.main')

@section('content')

<div class="container" style="width: 70%;margin: 0 auto;padding: 100px 0;">
	<h3>Cart Items</h3>

	<table class="table table-hover">
		<thead>
			<tr>
				<th>Name</th>
				<th>Price</th>
				<th>Qty</th>
				<th>Size</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($cartItems as $cartItem)
			<tr>
				<td>{{$cartItem->name}}</td>
				<td>{{$cartItem->price}}</td>
				<td>
					{!! Form::open(['route'=>['cart.update',$cartItem->rowId],'method'=>'put'])!!}
						<input type="number" value="{{$cartItem->qty}}" style="display: inline-block;width: 20%;" class="text-center" name="qty">
						
				</td>
				<td>
					<div>
						{!! Form::select('size',['small'=>'Small','medium'=>'Medium','large'=>'Large'], $cartItem->options->has('size')?$cartItem->options->size:'') !!}
					</div>
				</td>


				<td>
					<input style="float:left" type="submit" class="button success small" value="OK">
					{!! Form::close() !!}


					<form action="{{route('cart.destroy',$cartItem->rowId)}}" method="post">
						{{csrf_field()}}
						{{method_field('DELETE')}}
						<input class="button small alert" type="submit" value="Delete" class="button">
					</form>
				</td>
			</tr>
			@endforeach

		<hr>
			<tr>	
			<!-- 	<td>
					Tax: ${{Cart::tax()}}
					<br>
					Sub-Total: ${{Cart::subtotal()}}
					<br>
					Grand-Total: ${{Cart::total()}}
				</td> -->
				<td></td>
				<td></td>
				<td>Items: {{Cart::count()}}</td>
				
			</tr>	
		</tbody>
	</table>

	<div class="clearfix" style="display: block;float: right;">
		Tax: ${{Cart::tax()}}
		<br>	
		Sub-Total: ${{Cart::subtotal()}}
		<br>
		Grand-Total: ${{Cart::total()}}
		<br>
		<br>
		<a href="{{route('checkout.shipping')}}" class="button pull-right" style="display: block;">Checkout</a>
	</div>
	
	
	

</div>

@endsection