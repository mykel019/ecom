@extends('admin.layout.admin')

@section('content')

	<h3>Add Products</h3>

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			{!! Form::open(['route' => 'product.store','method' => 'post', 'files' => true]) !!}

			{{csrf_field()}}
				<div class="form-group">
					{{ Form::label('name','Name')}}
					{{ Form::text('name',null,array('class'=>'form-control')) }}
				</div>

				<div class="form-group">
					{{ Form::label('description', 'Description') }}
					{{ Form::text('description',null,array('class'=>'form-control'))}}
				</div>

				<div class="form-group">
					{{ Form::label('price','Price') }}
					{{ Form::text('price',null, ['class'=>'form-control'])}}
				</div>
				
				<div class="form-group">
					{{ Form::label('size','Size') }}
					{{ Form::select('size',[null,'small' => 'Small','medium' => 'Medium', 'large' => 'Large'],null, ['class'=>'form-control'])}}
				</div>


				<div class="form-group">
					{{ Form::label('category_id','Categories') }}
					{{ Form::select('category_id',$categories,null, ['class'=>'form-control','placeholder'=>'Select Category'])}}
				</div>

				<div class="form-group">
					{{ Form::label('image','Image')}}
					{{ Form::file('image',array('class' => 'form-control'))}}
				</div>

				{{ Form::submit('Create',array('class' => 'btn btn-default'))}}
			{!! Form::close() !!}
		</div>
	</div>


@endsection