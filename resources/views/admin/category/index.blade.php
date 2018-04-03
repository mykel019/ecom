@extends('admin.layout.admin')


@section('content')
	
	<div class="navbar">
		<a href="" class="navbar-brand">Categories</a>
		<ul class="nav navbar-nav list-stlyed">
			@if(!empty($categories))
				@forelse($categories as $category) 
					<li class="list-group-item">
						<a href="{{route('category.show',$category->id)}}">{{$category->name}}</a>
					</li>
				@empty
					<li>No Data</li>
				@endforelse
			@endif
		</ul>
		
		<a href="#modal-id" class="btn btn-primary" data-toggle="modal">Add Category</a>
		<div class="modal fade" id="modal-id">
			<div class="modal-dialog">


				{!! Form::open(['route'=>'category.store','method'=>'post']) !!}
						
					<div class="modal-content">
						<div class="modal-header	">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Add Category</h4>
						</div>
						<div class="modal-body">
							{{ Form::label('name','Name')}}
							{{ Form::text('name',null,array('class'=>'form-control'))}}
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save Changes</button>
						</div>
					</div>
					
				{!! Form::close() !!}

			</div>
		</div>
	</div>

@if(!empty($products))
	<section>
		<h3>Products</h3>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Products</th>
				</tr>
			</thead>
			<tbody>
				@forelse($products as $product)
				<tr>
					<td>{{$product->name}}</td>
					<td>{{$product->category->name}}</td>
				</tr>
					@empty
					<tr>
						<td>No Products</td>
					</tr>
				@endforelse
			</tbody>
		</table>
	</section>
@endif

@endsection