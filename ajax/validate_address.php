<?php
/**
 * Created by PhpStorm.
 * User: davidlopez
 * Date: 6/10/16
 * Time: 3:02 AM
 */

/*
 * Sends the user input over to the Address class to validate and save.
 * It returns the new complete validated address ready to be
 * appended at the top of the table.
 */

require_once '../vendor/autoload.php';

date_default_timezone_set('America/Los_Angeles');

require_once '../config/db.php';

use App\Address;

$address = new Address();

$address->getInput($_GET['input1'],$_GET['input2'],$_GET['input3']);

$address->validate();

echo json_encode($address->getAjaxResponse());


