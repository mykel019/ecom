@extends('admin.layout.admin')

@section('content')
	<h3>Orders</h3>

	<ul>
		@foreach($orders as $order)
			<li>
				<h4>Order by: {{$order->user->name}} <br> Total Price {{$order->total}}</h4>

			
					<form action="{{route('toggle.deliver',$order->id)}}" method="post" class="pull-right">
						{{csrf_field()}}
						<label for="delivered"></label>
						<input type="checkbox" value="1" name="delivered" {{$order->delivered==1?"checked":""}}>
						<input type="submit" class="button default">
					</form>
	
				<hr>
				<h5>Items</h5>
				<table class="table table-bordered">
					<tr>
						<th>Name</th>
						<th>Qty</th>
						<th>Price</th>
					</tr>
					@foreach($order->orderItems as $item)
					<tr>
						<td>{{$item->name}}</td>
						<td>{{$item->pivot->qty}}</td>
						<td>{{$item->pivot->total}}</td>
					</tr>
					@endforeach
				</table>
			</li>
		@endforeach
	</ul>
@endsection