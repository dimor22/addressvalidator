<?php
/**
 * Created by PhpStorm.
 * User: davidlopez
 * Date: 6/9/16
 * Time: 4:40 PM
 */

namespace App;

use ORM;

class Address {

    private $authId = "65605c23-5015-5dd7-c238-050594d541c7";
    private $authToken = "VeT7OjTAAtb9vMEk58gE";

    public $street  = '';
    public $city    = '';
    public $state   = '';

    public $validated_street  = '';
    public $validated_city    = '';
    public $validated_state   = '';
    public $validated_zip     = '';




    function validate()
    {


        $input1 = urlencode($this->street);
        $input2 = urlencode($this->city);
        $input3 = urlencode($this->state);

        // Build the URL
        $req = "https://api.smartystreets.com/street-address/?street={$input1}&city={$input2}&state={$input3}&auth-id={$this->authId}&auth-token={$this->authToken}";


        // GET request and turn into associative array
        $result = json_decode(file_get_contents($req),true);

        // Persist to database if API response returns valid data
        if( !empty($result) ){
            $this->validated_street = $result[0]['delivery_line_1'];
            $this->validated_city = $result[0]['components']['city_name'];
            $this->validated_state = $result[0]['components']['state_abbreviation'];
            $this->validated_zip = $result[0]['components']['zipcode'];

            $this->save();

            return true;
        }


        return false;

    }

    function save()
    {
        $address = ORM::for_table('addresses')->create();

        $address->searched_address1     = $this->street;
        $address->searched_city         = $this->city;
        $address->searched_state        = $this->state;
        $address->validated_address1    = $this->validated_street;
        $address->validated_city        = $this->validated_city;
        $address->validated_state       = $this->validated_state;
        $address->validated_zip         = $this->validated_zip;

        $address->save();

        //return $address->save() ? true : false;
        return true;

    }

    function getAll()
    {
        $addresses = ORM::for_table('addresses')->order_by_desc('created_at')->find_many()->as_array();

        return $addresses;
    }

    function show(){
        return [
            'searched_address'      =>  $this->street,
            'searched_city'         =>  $this->city,
            'searched_state'        =>  $this->state,
            'validated_address'     =>  $this->validated_street,
            'validated_city'        =>  $this->validated_city,
            'validated_state'       =>  $this->validated_state,
            'validated_zip'         =>  $this->validated_zip
        ];
    }

    function getInput($street, $city, $state)
    {
        if(empty($street) || empty($city) || empty($state)){
            return false;
        }

        // Address input
        $this->street = $street;
        $this->city = $city;
        $this->state = $state;
        return true;
    }

    function getAjaxResponse(){
        $address = [
            'street'    =>  $this->validated_street,
            'city'      =>  $this->validated_city,
            'state'     =>  $this->validated_state,
            'zip'       =>  $this->validated_zip
        ];
        return $address;
    }

}