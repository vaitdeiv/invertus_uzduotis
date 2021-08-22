<?php

use My_app\classes\Product;

include_once __DIR__ . '/vendor/autoload.php';

$input = file('input.txt');
$cart_total = 0;
$product_data = [];

// making an array to store  all supported currencies and their ratio values

$currencies = array("EUR" => 1.0, "USD" => 1.14, "GBP" => 0.88);
$default_currency = "EUR"; // setting the default currency to be used

foreach($input as  $string){ // reading file line by line

    $params = explode(';',preg_replace('/\s+/', '', $string));

    // splitting every line into an array and triming the data to not include white-spaces

    if(count($params) == 5){ // only executing operations if 5 data columns have been inputed

        if(intval($params[2]) >= 1){ // checking if product should be added/updated

            if($default_currency != $params[4]){ // checking if product currency differs from the default one

                $params[3] = round($params[3] * ($currencies[$default_currency] / $currencies[$params[4]]), 2);
                
                // line above recalculates the product price by taking and using the ratio values of default currency and
                // the current product currency

            }
            
            if (array_key_exists($params[0], $product_data) == false){ // determining whether to add or update the product

                $product_data += [$params[0] => $params[3]]; // saving a list of product identification numbers and prices

                calculate_cart_total($product_data, $cart_total, $default_currency);

            }
            else {

                // updating the existing product price value
                
                $product_data[$params[0]] = $params[3];

                calculate_cart_total($product_data, $cart_total, $default_currency);

            }
            
    
        }
        else if(intval($params[2]) <= -1){ // checking if product should be removed
    
            unset($product_data[$params[0]]); // removing product id and price from the list

            calculate_cart_total($product_data, $cart_total, $default_currency);
    
        }
        else{ // skipping line due to parameters being input incorectly
    
            continue;
    
        }

    }
    

}

// printing out the contents of the cart concluding all operations

echo "\nProducts currently in cart:\n";
foreach($product_data as $x => $x_value){
    echo "Id = " . $x . ", Price = " . $x_value . " " . $default_currency;
    echo "\n";
}

// function for calculating cart total

function calculate_cart_total($product_data, $cart_total, $default_currency) {

    foreach($product_data as $x => $x_value){ // going through the list of products currently in cart

        $cart_total = $cart_total + floatval($x_value); // adding up the price of products in cart
    
    }
    
    echo ">$cart_total $default_currency\n"; // printing out the total price into the console
    $cart_total = 0; // resetting the total price

}