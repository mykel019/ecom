@extends('layout.main')

@section('title,Contact')

@section('content')
	
<div class="row">
	<div class="small-8 small-centered columns">	
	<form action="">
		<label for="name">Name</label>
		<input type="text">

		<label for="name">Address</label>
		<input type="text">

		<label for="name">Contact</label>
		<input type="text">

		<label for="name">Email</label>
		<input type="text">

		
		<input type="submit" class="button primary">
	</form>
		<center>
		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d734.0280515261754!2d120.98492414287341!3d14.605148557288022!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sen!2sph!4v1522676034219" width="600" height="350" frameborder="0" style="border:1" allowfullscreen></iframe>
		</center>
	</div>
</div>
@endsection