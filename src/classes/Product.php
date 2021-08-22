<?php 

namespace My_app\classes;

// Tried to use a product class, however got stuck on dynamically generating  products.
// The class is not used in the current version of the code

class Product {

    // setting product parameters

    public $id;
    public $name;
    public $amount;
    public $price;
    public $currency;

    public function __construct($id, $name, $amount, $price, $currency)
    {
        $this->id = $id;
        $this->name = $name;
        $this->amount = $amount;
        $this->price = $price;
        $this->currency = $currency;

    }

    // setting functions for parameters that will be updated in the app

    public function setAmount($amount){

        $this->amount = $amount;

    }

    public function setPrice($price){

        $this->price = $price;

    }

    public function setCurrency($currency){

        $this->currency = $currency;

    }

}