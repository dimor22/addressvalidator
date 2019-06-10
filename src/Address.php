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

    /*
     * This class handles all the behaviour related to the address object.
     *
     * # Validates
     * # Saves
     * # Displays
     * # Returns ajax response
     */
    private $authId = AUTH_ID;
    private $authToken = AUTH_TOKEN;



    public $street  = '';
    public $city    = '';
    public $state   = '';

    public $validated_street  = '';
    public $validated_city    = '';
    public $validated_state   = '';
    public $validated_zip     = '';


    /**
     * Encodes the variables to send them to the SMARTYSTREETS API.
     * Checks that a valid response is received and then saves the whole address
     * in the database.
     * @return bool
     */
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

    /**
     * Saves new Addresses to the db
     * @return bool
     */
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

    /**
     * Displays all the records on the table
     * @return array
     */
    function getAll()
    {
        $addresses = ORM::for_table('addresses')->order_by_desc('created_at')->find_many()->as_array();

        return $addresses;
    }


    /**
     * Validates the input and saves them
     * @param $street
     * @param $city
     * @param $state
     * @return bool
     */
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

    /**
     * Sends a formatted response
     * @return array
     */
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