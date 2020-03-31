@extends('default.layout.layout')


@section('content')

<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <div class="payment_container">

            <form action="{{route('payment')}}" method="POST" id="payment-form">
                @csrf
                <div class="form-row mb_3">
                    <label for="card-element" class="card-element_label">
                        Credit or debit card
                    </label>
                    <input type="text" name="c_firstname" class="mb_3 form-control StripeElement StripeElement--empty"
                        placeholder="First Name">
                    <input type="text" name="c_lastname" class="mb_3 form-control StripeElement StripeElement--empty"
                        placeholder="Last Name">
                    <input type="email" name="c_email" class="mb_3 form-control StripeElement StripeElement--empty"
                        placeholder="Email">

                    <div id="card-element">
                        <!-- A Stripe Element will be inserted here. -->
                    </div>

                    <!-- Used to display Element errors. -->
                    <div id="card-errors" role="alert"></div>
                </div>

                <input type="submit" class="btn btn-info btn-block" name="payment" value="Submit Payment" />

            </form>

        </div>
    </div>
</div>

@endsection