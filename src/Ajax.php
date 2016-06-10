<?php
/**
 * Created by PhpStorm.
 * User: davidlopez
 * Date: 6/10/16
 * Time: 3:02 AM
 */


require '../bootstrap.php';


$address = new \App\Address();

$address->getInput($_GET['input1'],$_GET['input2'],$_GET['input3']);

$address->validate();

echo json_encode($address->getAjaxResponse());


