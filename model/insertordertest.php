<?php
session_start();
require_once "utils.php";

$cart = array(
	array(
		'id' => 124,
        'name' => "BURKE",
        'details' => "Semi-Body Fit Size/s: S, M, L, XL Color: black",
               'price' => 500.00,
                    'date' => '0000-00-00',
                    'sub_id' => 31,
                    'sub_name' => 'Natasha Mens Wear',
                    'size' => 'Small',
                    'color' => 'black',
                    'quantity' => 1,
                    'subtotal' => 500.00,
                    'key' => 0
	)
);

$order = Util::insertOrder($_SESSION);
echo $order;

?>
