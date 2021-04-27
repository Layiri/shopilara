<?php

// Set variables for our request
$shop = $_GET['shop'];
$api_key = "7ef9f3b4be2e4d88a72439fccdf26b20";
$scopes = "read_orders,write_products";
//$scopes = "";
$redirect_uri = "http://127.0.0.1:8000/generate_token.php";

// Build install/approval URL to redirect to
$install_url = "https://" . $shop . ".myshopify.com/admin/oauth/authorize?client_id=" . $api_key . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri);

// Redirect
header("Location: " . $install_url);
die();
