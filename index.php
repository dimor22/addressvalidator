<?php
/**
 * Created by PhpStorm.
 * User: davidlopez
 * Date: 6/9/16
 * Time: 4:38 PM
 */

require_once 'bootstrap.php';

echo 'starting the process';

use App\address;

$addressvalidator = new address();
$result = $addressvalidator->validate("5870 harmon", "las vegas", "nevada");



if( !empty($result) ){

    echo "<pre>";
    print_r($addressvalidator->show());
    echo "</pre>";
}



echo empty($result) ? "No results" : "Great";