<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Laravel</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>


    <style>
    .register_col {
        background-color: #5dc8c1;
        border: 1px solid #dcdada8f;
        border-radius: 5px;
        padding: 20px;
        margin-top: 60px;
    }

    .bg_reg {
        color: #379aa9;
        margin-bottom: 32px;

    }

    label {
        color: #379aa9;
        font-size: 18px;
    }

    .success {
        padding: 3px 0px 20px;
    }

    .navbar_style {
        height: 80px;
        padding: 15px;
        background-color: #069fabed;
        margin-bottom: 15px;
    }

    .login_col {
        background-color: #5dc8c1;
        border: 1px solid #dcdada8f;
        border-radius: 5px;
        padding: 40px;
        margin-top: 50px;
    }

    .log_link,
    .logo>h4> {
        color: #f9fafa;
    }

    .StripeElement {
        background-color: #cae8e8b8;
        height: 40px;
        padding: 10px 12px;
        border-radius: 4px;
        border: 1px solid transparent;
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

    .payment_container {
        margin-top: 40px;
        padding: 60px;
        background-color: #ffffff;
    }

    .mb_3 {
        margin-bottom: 13px;
    }

    ::placeholder {
        font-size: 16px;
        color: #747474 !important;
    }

    .card-element_label {
        font-size: 25px;
    }

    .auth_user,
    .add_product>a {
        color: #ececf2;
    }

    .add_product {
        margin-right: 20px;
    }

    .delete_link {
        font-size: 17px;
        color: #ffffff;
        padding: 7px 35px;
        background-color: #dc1338;
        border-radius: 8px;
        border: 2px solid transparent;
        display: inline-block;
        margin-top: 7px;

    }

    .delete_link:hover {
        color: #dc1338;
        text-decoration: none;
        background-color: #ffffff;
        border: 2px solid #dc1338;


    }

    .products {
        margin-top: 70px;
    }

    .products_img {
        height: 200px;
        display: inline-block;
        max-width: 100%;
        padding: 2px;
        line-height: 1.42857143;
        background-color: #ddd;
        border-radius: 4px;
        -webkit-transition: all .2s ease-in-out;
        -o-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;

    }

    .product-col {
        margin-top: 10px;
        margin-bottom: 60px;
    }
    </style>

</head>

<body>

    <nav class="navbar_style">

        <div class='col-md-7 logo'>
            <h4><a href="#">Logo</a></h4>
        </div>



        @auth
        <div class='col-md-4'>
            <!-- <div class="add_product"></div> -->
            <h4 class="pull-right">
                <strong class="add_product"><a href="{{ url('/product') }}">Add product</a></strong>
                <strong class="auth_user">Welcome {{ Auth::user()->email }}</strong>

            </h4>
        </div>
        <div class='col-md-1'>
            <h4><strong><a href="{{ url('/logout') }}" class="log_link">Logout</a></strong></strong></h4>
        </div>
        </div>
        @endauth
        @guest
        <div class='col-md-5'>
            <h4 class='pull-right'>
                <a href="{{ url('/login') }}" class='text_color log_link'>Log In</a>
            </h4>
            <div class='clearfix'></div>
        </div>
        @endguest

    </nav>

    <main class="py-4">
        @yield('content')
    </main>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>

    <script>
    var stripe = Stripe('pk_test_IeI1z9HUstko52dR4Bm81fhb00Nlu3GBrh');
    var elements = stripe.elements();

    // Custom styling can be passed to options when creating an Element.
    var style = {
        base: {
            // Add your base input styles here. For example:
            fontSize: '16px',
            color: '#32325d',
        },
    };

    // Create an instance of the card Element.
    var card = elements.create('card', {
        style: style
    });

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');

    // Create a token or display an error when the form is submitted.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                // Inform the customer that there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
            }
        });
    });


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
    </script>

</body>

</html>