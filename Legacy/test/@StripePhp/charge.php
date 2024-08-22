<?php
  

  if(!$_POST){ 
    echo 'No Card Post Came';
    exit;
  }
  require_once('../../vendor/autoload.php');
  // require_once('config/db.php');
  // require_once('lib/pdo_db.php');
  // require_once('models/Customer.php');
  // require_once('models/Transaction.php');

  \Stripe\Stripe::setApiKey('sk_test_51PqJpNEnH91tsX6RqrHwjj9xf1LCTK9Qbksb9x2WDhNnFELk2OEx4SPjkrcSkZqO11t7q5uL5axUxFIXVx45GBS600W1hFhKmB');

//  // Sanitize POST Array
$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

$first_name = $POST['first_name'];
$last_name = $POST['last_name'];
$email = $POST['email'];
$stripeToken = $POST['stripeToken'];

//echo 'stripeToken: '.$stripeToken;

// // Create Customer In Stripe
$customer = \Stripe\Customer::create(array(
  "email" => $email,
  "source" => $stripeToken
));

// // Charge Customer
$charge = \Stripe\Charge::create(array(
  "amount" => 5000,
  "currency" => "usd",
  "description" => "Car Dealer Invoice #0001",
  "customer" => $customer->id
));

print_r($charge)

// // Customer Data
// $customerData = [
//   'id' => $charge->customer,
//   'first_name' => $first_name,
//   'last_name' => $last_name,
//   'email' => $email
// ];

// // Instantiate Customer
// $customer = new Customer();

// // Add Customer To DB
// $customer->addCustomer($customerData);


// // Transaction Data
// $transactionData = [
//   'id' => $charge->id,
//   'customer_id' => $charge->customer,
//   'product' => $charge->description,
//   'amount' => $charge->amount,
//   'currency' => $charge->currency,
//   'status' => $charge->status,
// ];

// // Instantiate Transaction
// $transaction = new Transaction();

// // Add Transaction To DB
// $transaction->addTransaction($transactionData);

// // Redirect to success
// header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);
?>