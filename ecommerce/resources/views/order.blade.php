@extends('layouts.app')

@section('content')
    <style type="text/css">
        .StripeElement {
            box-sizing: border-box;

            height: 40px;

            padding: 10px 12px;

            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;

            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }



    </style>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Your Products

                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product Image</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i=1 @endphp
                            @foreach($cart->items as $key=>$item)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td><img src="/images/{{$item->image}}" width="100" alt="{{$item->name}}"></td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->qty}}</td>
                                    <td>{{$item->price}}</td>
                                </tr>
                            @endforeach

                            </tbody>


                        </table>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <div class="d-flex"><a href="{{route('home')}}" class="btn btn-primary">Back Home</a></div>
                        <div class="d-flex">Total Price : {{ $cart->totalprice }} ₺</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Order
                    </div>
                    <div class="card-body">
                        <script src="https://js.stripe.com/v3/"></script>
                        <form action="/charge" method="POST" id="payment-form">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>

                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" name="city" id="city">
                            </div>

                            <div class="form-group">
                                <label for="zipcode">Zip Code</label>
                                <input type="text" class="form-control" name="zipcode" id="zipcode">
                            </div>
                            <div class="form-group">
                                <label for="adress">Adress</label>
                                <textarea name="adress" id="adress" class="form-control" cols="30" rows="10"></textarea>

                            </div>
                            <input type="hidden" name="totalprice" id="totalprice" value="{{$cart->totalprice}}">
                            <div class="mb-2">
                                <label for="card-element">
                                    Credit or debit card
                                </label>
                                <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>

                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div>

                            <button class="btn btn-success" type="submit">Submit Payment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        window.onload=function(){
            // Create a Stripe client.
            var stripe = Stripe('pk_test_51HEgrRIPpbXRbtQfOm2YsAgkiWocAadSnwO5BKlczusC0HaEHcViQ5pFUDEEyVN2RrkWmnvHzNiJrQbebYpboK1R000TokHTKo');

            // Create an instance of Elements.
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
                base: {
                    color: '#32325d',
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
            card.on('change', function(event) {
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
                var options={
                    name:document.getElementById('name').value,
                    city:document.getElementById('city').value,
                    zipcode:document.getElementById('zipcode').value,
                    adress:document.getElementById('adress').value,
                    totalprice:document.getElementById('totalprice').value
                }
                stripe.createToken(card,options).then(function(result) {
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

            // Submit the form with the token ID.
            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');

                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }
        }

    </script>

    @endsection

