<?php

class ValidateProperty
{

    //(ownerID, postTitle, postDate, availableDate, lengthContract, monthlyRent
    //street, city, province, type, area, numberOfBed, numberOfBath, 
    //numberOfGarage, picture, status, description)

    static $inputError = array();
    // create a function to validate the input property form
    static function validateInputProperty()
    {

        //Validate postTitile
        if (!isset($_POST['title'])) {
            array_push(self::$inputError, "Please enter the title");
            //self::$registerError['address'] = "Please enter your address";
        } else {
            array_push(self::$inputError, 1);
        }
        //Validate description
        if (!isset($_POST['description'])) {
            array_push(self::$inputError, "Please enter the brief description");
        } else {
            array_push(self::$inputError, 1);
        }
        //Validate type
        if (!isset($_POST['type'])) {
            array_push(self::$inputError, "Please select the type of your property");
        } else {
            array_push(self::$inputError, 1);
        }
        //Validate area
        $filterArea = filter_input(INPUT_POST, 'area', FILTER_VALIDATE_INT);
        if (!$filterArea) {
            array_push(self::$inputError, "Then area must be an integer number");
            
        } else {
            array_push(self::$inputError, 1);
        }
        //Validate monthly rent
        $filterMonthlyRent = filter_input(INPUT_POST, 'monthlyrent', FILTER_VALIDATE_INT);
        if (!$filterMonthlyRent) {
            array_push(self::$inputError, "Then monthly rent must be an integer number");
            
        } else {
            array_push(self::$inputError, 1);
        }
        //Validate length contract 
        $filterLengthContract = filter_input(INPUT_POST, 'rentcontract', FILTER_VALIDATE_INT);
        if (!$filterLengthContract) {

            array_push(self::$inputError, "Then rent contract must be an integer number");
        } else {
            array_push(self::$inputError, 1);
        }
        //Validate availabledate
        if (!isset($_POST['availabledate'])) {

            array_push(self::$inputError, "Please enter the available date of the property");
        } else {
            array_push(self::$inputError, 1);
        }
        //Validate number of beds
        $filterMonthlyRent = filter_input(INPUT_POST, 'bedrooms', FILTER_VALIDATE_INT);
        if (!$filterMonthlyRent) {
            array_push(self::$inputError, "Then number of beds must be an integer number");
            //self::$registerError['email'] = "Please enter a valid email";
        } else {
            array_push(self::$inputError, 1);
        }

        //Vaidate number of baths
        $filterMonthlyRent = filter_input(INPUT_POST, 'bathrooms', FILTER_VALIDATE_INT);
        if (!$filterMonthlyRent) {
            array_push(self::$inputError, "The number of baths must be an integer number");
            //self::$registerError['email'] = "Please enter a valid email";
        } else {
            array_push(self::$inputError, 1);
        }
        //Validate number of garages
        //$filterMonthlyRent = filter_input(INPUT_POST, 'garages', FILTER_VALIDATE_INT);
        if (!isset($_POST['availabledate'])) {
            array_push(self::$inputError, "The number of garages must be an integer number");
            //self::$registerError['email'] = "Please enter a valid email";
        } else {
            array_push(self::$inputError, 1);
        }
        //Validate pictures
        if (!isset($_POST['photo'])) {
            array_push(self::$inputError, "Please upload a photo of your property");
        } else {
            array_push(self::$inputError, 1);
        }
        //Validate street

        if (!isset($_POST['street'])) {
            array_push(self::$inputError, "Please enter the street");
        } else {
            array_push(self::$inputError, 1);
        }
        //Validate city
        if (!isset($_POST['city'])) {
            array_push(self::$inputError, "Please enter the city");
        } else {
            array_push(self::$inputError, 1);
        }
        //Validate province
        if (!isset($_POST['province'])) {
            array_push(self::$inputError, "Please enter the province");
        } else {
            array_push(self::$inputError, 1);
        }

        return self::$inputError;
    }
}
