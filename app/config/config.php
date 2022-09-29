<?php 
//db Params
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '123456');
define('DB_NAME', 'avida');
//App Root
define('APPROOT', dirname(dirname(__FILE__)));
//url root
define('URLROOT', 'http://localhost/avida');

//site name

define('SITENAME', 'Avida hotel');



$stripeDetails = array(
    "secretKey" => "sk_test_51Lj0jSLurj3fjTl9aws9XLlZGN5jdDYzNDXfcT7dupC31ybU4ChhLLN9u7FU2gaisoDfVvhwrAsKV0nUckku8rXI00Ryin4g9N",
    "publishableKey" => "pk_test_51Lj0jSLurj3fjTl9NilNF3EoSRF93XuNnOHCH3AJxJYliNSrItH2INq85NN4abETbxpDbQCXF3TXrcoZNwABlKyl00LUG5N1Km"
);

\Stripe\Stripe::setApiKey($stripeDetails["secretKey"]);