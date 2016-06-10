<?php
/**
 * Created by PhpStorm.
 * User: davidlopez
 * Date: 6/9/16
 * Time: 10:17 PM
 */


ORM::configure([
    'connection_string' => 'mysql:host=localhost;dbname=avalidator',
    'username' => 'root',
    'password' => 'root',
]);
ORM::configure('return_result_sets', true); // returns result sets
ORM::configure('logging', true); // access with ORM::get_last_query() or ORM::get_query_log()

