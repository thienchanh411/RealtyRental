<?php

// See the textbook CH 9 for more information about string functions
//Page::$notifications['exitEmail'] = "";
class Validate {
    
    static $registerError = array();
    // create a function to validate the registration form
    // Please use filter to validate the inputs whenever possible    
    static function validateRegisterForm(){

        UserDAO::initialize();
    
    // Validate Username => check if entered and unique
    if(!isset($_POST['username'])){
        array_push(self::$registerError, "Please enter your username");
        
        //self::$registerError['username'] = "Please enter your username";
    }else{
        $verifiedUser = UserDAO::getUserByUsername($_POST['username']);
        if($verifiedUser){
            array_push(self::$registerError, "The Username is already existing!");
            //self::$registerError['exitUsername'] = "The Username is already existing!";
        }  
    }
    
    //Validate Email => check if correct format and also unique
    $filterEmail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if(!$filterEmail){
            array_push(self::$registerError, "Please enter a valid email");
            //self::$registerError['email'] = "Please enter a valid email";
        }
        else{
            $verifiedUser = UserDAO::getUserByEmail($_POST['email']);
            if($verifiedUser){
                array_push(self::$registerError, "The Email already existing!");
                //self::$registerError['exitEmail'] = "The Email already existing!";
            }          
        }

    //Validate password
    
    if(!isset($_POST['password'])){
        array_push(self::$registerError, "Please enter your password");
        //self::$registerError['password'] = "Please enter your password";
    }
        
    
    //Validate the phone number, use filter_input with regexp
    $phoneNumber = $_POST['phone'];
    $regexp = "/"."^\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/";
    $filterPhoneNumber = preg_match($regexp, $_POST['phone']);
    if($filterPhoneNumber!=1){
        array_push(self::$registerError, "Please enter a valid phone number follow the pattern");
        //self::$registerError['phone'] = "Please enter a valid phone number follow the pattern";
    }

    // address
    if(!isset($_POST['address'])){
        array_push(self::$registerError, "Please enter your address");
        //self::$registerError['address'] = "Please enter your address";
    }
    
    // Fullname
    $number = "@[0-9]@";
    $specialChar = "/[\'"."^£$%&*()}{@#~?><>,|=_+¬-]/";

    $filterNumber = preg_match($number, $_POST["fullname"]);
    $filterSpecialChar = preg_match($specialChar, $_POST["fullname"]);

    if($filterSpecialChar || $filterNumber){
        array_push(self::$registerError, "Please enter your fullname");
        //self::$registerError['fullname'] = "Please enter your fullname";
    }

    // the function should update the page's notifications
    // you can also return some value to the calling function
    //return self::$valid_status;
    return self::$registerError;
    }
}



?>