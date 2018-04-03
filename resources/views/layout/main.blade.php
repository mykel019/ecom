<!doctype html>
<html class="no-js" lang="en" dir="ltr">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="x-ua-compatible" content="ie=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>
            @yield('title','Michael Shirts')
        </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="{{asset('dist/css/foundation.css')}}"/>
        <link rel="stylesheet" href="{{asset('dist/css/app.css')}}"/>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel="stylesheet">
        <script type="text/javascript" src="https://js.stripe.com/v3/"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
    </head>
    <body>
        <div  class="top-bar">
            <div style="color:white" class="top-bar-left">
                <h4 class="brand-title">
                    <a href="{{route('home')}}">
                        <i class="fa fa-home fa-lg" aria-hidden="true">
                        </i>
                       Michael Shirts
                    </a>
                </h4>
            </div>
            <div class="top-bar-right">
                <ol class="menu">
                    <li>
                        <a href="{{route('shirts')}}">
                            SHIRTS
                        </a>
                    </li>
                    <li>
                        <a href="{{route('contact')}}">
                            CONTACT
                        </a>
                    </li>
                    <li>
                        <a href="{{route('cart.index')}}">
                            <i class="fa fa-shopping-cart fa-2x" aria-hidden="true">
                            </i>
                            CART
                            <span class="alert badge">
                                {{Cart::count()}}
                            </span>
                        </a>
                    </li>
                    @guest
                    <li>
                        <li><a href="{{route('login')}}">LOGIN</a></li>
                    </li>
                    @else
                        <!-- <li><a href="">Welcome {{Auth::user()->name}}</a></li> -->
                        <li>
                            <a href="{{route('logout')}}">LOGOUT</a>
                        </li>
                    @endguest
                </ol>
            </div>
        </div>

        @yield('content')

        <footer class="footer">
              <div class="row full-width">
                <div class="small-12 medium-4 large-4 columns">
                  <i class="fi-marker"></i>
                  <p>Location: 121 Alley F Telecom Compd. Sta. Cruz Manila</p>
                  <p>Contact: 09293835885</p>
                  <p>Email: michaelcapistrano.19@gmail.com</p>
                </div>
                <div class="small-12 medium-4 large-4 columns">
                  <i class="fi-laptop"></i>
                  <p>Web Development</p>
                  <p>Web Design</p>
                  <p>System Application</p>
                  <p></p>
                  <br>
                  <p>All rights reserved. 2018</p>
                </div>
                
                <div class="small-6 medium-4 large-4 columns">
                  <h4>Follow Us</h4>
                  <ul class="footer-links">
                    <li><a href="https://github.com/">GitHub</a></li>
                    <li><a href="https://facebook.com">Facebook</a></li>
                    <li><a href="https://twitter.com/">Twitter</a></li>
                  <ul>
                </div>
              </div>
        </footer>

    <script src="{{asset('dist/js/vendor/jquery.js')}}"></script>
    <script src="{{asset('dist/js/app.js')}}"></script>
    <script>


                    // Create a Stripe client.
            var stripe = Stripe('pk_test_VkK0IcfjlvaDTBJKDO3az9h7');

            // Create an instance of Elements.
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
              base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                  color: '#aab7c4'
                }
              },
              invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
              }
            };

            // Create an instance of the card Element.
            var card = elements.create('card', {style: style});

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
              var displayError = document.getElementById('card-errors');
              if (event.error) {
                displayError.textContent = event.error.message;
              } else {
                displayError.textContent = '';
              }
            });

            // Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
              event.preventDefault();

              stripe.createToken(card).then(function(result) {
                if (result.error) {
                  // Inform the user if there was an error.
                  var errorElement = document.getElementById('card-errors');
                  errorElement.textContent = result.error.message;
                } else {
                  // Send the token to your server.
                  stripeTokenHandler(result.token);
                }
              });
            });
       

            function stripeTokenHandler(token){

                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');

                hiddenInput.setAttribute('type','hidden');
                hiddenInput.setAttribute('name','stripeToken');
                hiddenInput.setAttribute('value',token.id);
                form.appendChild(hiddenInput);

                form.submit();
            }

    </script>
    </body>
</html>
