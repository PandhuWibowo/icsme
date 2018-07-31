<?php
error_reporting(E_ERROR | E_PARSE);

require '../vendor/autoload.php';

// Set your Merchant Server Key
Veritrans_Config::$serverKey = 'SB-Mid-server-nuJ1LN5m5J_e-SHzWT3XUfvN'; // sandbox
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
Veritrans_Config::$isProduction = false;
// Set sanitization on (default)
Veritrans_Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
Veritrans_Config::$is3ds = true;

/**
 * Extract data from cookie
 */
$user_data = json_decode( base64_decode($_COOKIE['user_data']) );
$payment_data = json_decode( base64_decode($_COOKIE['payment_data']) );

if (empty($user_data) && empty($payment_data)) {
	exit('Oops, no data found!');
}

// var_dump($payment_data);
// var_dump($user_data);

// exit();

// Required
$transaction_details = array(
  'order_id' => $payment_data->order_number,
  'gross_amount' => $payment_data->total_akhir, // no decimal allowed for creditcard
);

// Empty bag...
$item_details = array();

// Optional
$item_details[] = array(
  'id' => 'ticket-'.time(),
  'price' => $payment_data->price,
  'quantity' => $payment_data->quantity,
  'name' => $payment_data->product
);

// Optional
// $item2_details = array(
//   'id' => 'a2',
//   'price' => 20000,
//   'quantity' => 2,
//   'name' => "Orange"
// );

// Optional
$billing_address = array(
  'first_name'    => $user_data->fullname,
  'last_name'     => "",
  'address'       => $user_data->address,
  'city'          => "",
  'postal_code'   => "",
  'phone'         => $user_data->phone,
  'country_code'  => '',
);

// Optional
$customer_details = array(
  'first_name'    => $user_data->fullname,
  'last_name'     => "",
  'email'         => $user_data->email,
  'phone'         => $user_data->phone,
  'billing_address'  => $billing_address,
  'shipping_address' => '',
);

// Fill transaction details
$transaction = array(
  'transaction_details' => $transaction_details,
  'customer_details' => $customer_details,
  // 'enabled_payments' => $enable_payments,
  // 'item_details' => $item_details,
);

$snapToken = Veritrans_Snap::getSnapToken($transaction);
// echo "snapToken = ".$snapToken;

// exit();

$page = "payment";
$title = "Payment";
$content = "content.php";
include("../tpl.php");
?>