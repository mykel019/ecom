@extends('layout.main')

@section('content')

<h2>Make your payment</h2>

<div class="container">
	<div class="row">
		<div class="small-6 small-centered columns">
			<form action="api/paymentstore" method="post" id="payment-form">
				{{csrf_field()}}
			  <div class="form-row">
			    <label for="card-element">
			      Credit or debit card
			    </label>
			    <div id="card-element">
			      <!-- A Stripe Element will be inserted here. -->
			    </div>

			    <!-- Used to display form errors. -->
			    <div id="card-errors" role="alert"></div>
			  </div>

			  <button>Submit Payment</button>
			</form>
		</div>
	</div>
</div>
	
@endsection