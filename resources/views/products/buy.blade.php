@extends('layouts.app')

@section('content')
<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe('pk_test_your_stripe_key');
</script>
<form action="{{ route('products.charge', $product->id) }}" method="post" id="payment-form">
    @csrf
    <div class="form-row">
        <label for="card-element">
            Credit or debit card
        </label>
        <div id="card-element">

        </div>

        <div id="card-errors" role="alert"></div>
    </div>

    <button>Submit Payment</button>
</form>
<script>
    var elements = stripe.elements();
    var cardElement = elements.create('card');
    cardElement.mount('#card-element');

    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(cardElement).then(function(result) {
            if (result.error) {
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                stripeTokenHandler(result.token);
            }
        });
    });

    function stripeTokenHandler(token) {
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        form.submit();
    }
</script>


@endsection