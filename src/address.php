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



    function validate()
    {


        $input1 = urlencode($this->street);
        $input2 = urlencode($this->city);
        $input3 = urlencode($this->state);

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
            'validated_state'       =>  $this->validated_state,
            'validated_zip'         =>  $this->validated_zip
        ];
    }

    function getInput()
    {
        if(empty($_REQUEST['address']) || empty($_REQUEST['city']) || empty($_REQUEST['state'])){
            return false;
        }

        // Address input
        $this->street = $_REQUEST['address'];
        $this->city = $_REQUEST['city'];
        $this->state = $_REQUEST['state'];
        return true;
    }

}