<?php
/**
 * Created by PhpStorm.
 * User: davidlopez
 * Date: 6/9/16
 * Time: 4:40 PM
 */

namespace App;

class address {

    private $authId = "65605c23-5015-5dd7-c238-050594d541c7";
    private $authToken = "VeT7OjTAAtb9vMEk58gE";

    public $street  = '';
    public $city    = '';
    public $state   = '';

    public $validated_street  = '';
    public $validated_city    = '';
    public $validated_state   = '';
    public $validated_zip     = '';



    function validate($input_street, $input_city, $input_state)
    {
        if(empty($input_street) || empty($input_city) || empty($input_state)){
            return ['error' => 'Empty input'];
        }

        // Address input
        $this->street = $input_street;
        $this->city = $input_city;
        $this->state = $input_state;

        $input1 = urlencode($input_street);
        $input2 = urlencode($input_city);
        $input3 = urlencode($input_state);

        // Build the URL
        $req = "https://api.smartystreets.com/street-address/?street={$input1}&city={$input2}&state={$input3}&auth-id={$this->authId}&auth-token={$this->authToken}";


        // GET request and turn into associative array
        $result = json_decode(file_get_contents($req),true);

        $this->validated_street = $result[0]['delivery_line_1'];
        $this->validated_city = $result[0][components]['city_name'];
        $this->validated_state = $result[0][components]['state_abbreviation'];
        $this->validated_zip = $result[0][components]['zipcode'];

        return $result;

    }

    function save($searched, $validated)
    {

    }

    function getAll()
    {

    }

    function show(){
        return [
            'searched_address'      =>  $this->street,
            'searched_city'         =>  $this->city,
            'searched_state'        =>  $this->state,
            'validated_address'     =>  $this->validated_street,
            'validated_city'        =>  $this->validated_city,
            'validated_state'       => $this->validated_state,
            'validated_zip'         => $this->validated_zip
        ];
    }

}