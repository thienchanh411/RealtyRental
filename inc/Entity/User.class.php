<?php

class User {

    //Properties
    private $userID;
    private $email;
    private $username;
    private $password;
    private $fullName;
    private $address;
    private $phoneNumber;
    private $photoUser;
    private $role;
    private $status;

    static $currentAvatarName;

    //Setters
    function setUserID($userID){
        $this->userID = $userID;
    }
    function setEmail($email){
        $this->email = $email;
    }
    function setUserName($username){
        $this->username = $username;
    }
    function setPassword($password){
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }
    function setFullName($fullName){
        $this->fullName = $fullName;
    }
    function setAddress($address){
        $this->address = $address;
    }
    function setPhoneNumber($phoneNumber){
        $this->phoneNumber = $phoneNumber;
    }
    function setPhotoUser($photoUser){
        $this->photoUser = $photoUser;
    }
    function setRole($role){
        $this->role = $role;
    }
    function setStatus($status){
        $this->status = $status;
    }
    
    //Getters
    function getUserID(){
        return $this->userID;
    }
    function getUserName(){
        return $this->username;
    }
    function getEmail(){
        return $this->email;
    }
    function getPassword(){
        return $this->password;
    }
    function getFullName(){
        return $this->fullName;
    }
    function getAdress(){
        return $this->address;
    }
    function getPhotoUser(){
        return $this->photoUser;
    }
    function getPhoneNumber(){
        return $this->phoneNumber;
    }
    function getRole(){
        return $this->role;
    }
    function getStatus(){
        return $this->status;
    }

    //Verify the password
    function verifyPassword(string $passwordToVerify) {
        //Return a boolean based on verifying if the password given is correct for the current user
        return password_verify($passwordToVerify, $this->password);
    }
}



?>