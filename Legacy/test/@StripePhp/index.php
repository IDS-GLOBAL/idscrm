<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strip Parent page</title>
</head>
<body>
    <h1>Pay Amount Due Below:</h1>

    <div class="container">
        <h2 class="my-4 text-center">Intro To React Course [$50]</h2>
        <form action="./charge.php" method="post" id="payment-form">
          <div class="form-row">
           <input type="text" name="first_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="First Name">
           <input type="text" name="last_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Last Name">
           <input type="email" name="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Email Address">
            <div id="card-element" class="form-control">
              <!-- a Stripe Element will be inserted here. -->
            </div>
    
            <!-- Used to display form errors -->
            <div id="card-errors" role="alert"></div>
          </div>
    
          <button>Submit Payment</button>
        </form>
      </div>

      <script src="https://js.stripe.com/v3/"></script>
</body>
</html>