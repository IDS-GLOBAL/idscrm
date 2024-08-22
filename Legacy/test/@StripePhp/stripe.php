<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Strip Parent page</title>
    
    <!-- Custom Style Sheet -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!-- Boot Strap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<body>
    <h1>Pay Amount Due Below:</h1>

    <div class="container">
        <h2 class="my-4 text-center">Pay Invoice [$50]</h2>
        <form action="./charge.php" method="post" id="payment-form">
          <div class="form-row">
           <input id="first_name"  type="text" name="first_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="First Name">
           <input id="last_name" type="text" name="last_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Last Name">
           <input id="email" type="email" name="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Email Address">
            
            <div id="card-element" class="form-control">
                <!-- a Stripe Element will be inserted here. -->
            </div>
    
            <!-- Used to display form errors -->
            <div id="card-errors" role="alert"></div>
          </div>
    
          <button>Submit Payment</button>
        </form>
      </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://js.stripe.com/v3/"></script>
      <script src="./assets/js/charge.js"></script>
</body>
</html>