<?php

// NOTICE THE CHANGES IN PDOWRAPPER's FUNCTION NAMES: getSingleResult() and getSetResult()

class UserDAO   {

    // Create a member to store the PDO agent
    private static $database;
    // create the init function to start the PDO wrapper
    static function initialize(){
        self::$database = new PDOWrapper("User");
    }
    // function to create user
    static function createUser(User $user){
        // make sure the strings being stored in the database are cleaned 
        // and trimmed

        // query
        $sql = "INSERT INTO user (email, password, fullName, address, phoneNumber, role, status)
        VALUES (:email, :password, :fullName, :address, :phoneNumber, :role, :status)";
        self::$database->query($sql);
        // bind
        
        self::$database->bind(":email", trim($user->getEmail()));
        self::$database->bind(":password", trim($user->getPassword()));
        self::$database->bind(":fullName", trim($user->getFullName()));
        self::$database->bind(":address", trim($user->getAdress()));
        self::$database->bind(":phoneNumber", trim($user->getPhoneNumber()));
        self::$database->bind(":role", trim($user->getRole()));
        self::$database->bind(":status", trim($user->getStatus()));
        // execute
        self::$database->execute();
        // you may return the rowCount
        return self::$database->rowCount();
    }

    // get user detail
    static function getUser(string $email)  {
        
        // you know the drill
        $sql = "SELECT * FROM user where email = :email";
        self::$database->query($sql);
        self::$database->bind(":email", $email);
        self::$database->execute();
        // return the single result query
        return self::$database->getSingleResult();
    }

    // update the current user profile
    // certainly you don't have the form to facilitate this
    // so, it is not needed in our app, but hey.. more practice is better!
    static function updateUser(User $user)    {

        // you know the drill
        $sql = "UPDATE user SET password = :password,
               fullName = :fullName,
               address = :address  
               phoneNumber = :phoneNumber, 
               status  = :status
                WHERE email = :email";
        self::$database->query($sql);
        self::$database->bind(":password", $user->getPassword());
        self::$database->bind(":fullName", $user->getFullName());
        self::$database->bind(":address", $user->getAdress());
        self::$database->bind(":phoneNumber", $user->getPhoneNumber());
        self::$database->bind(":status", $user->getStatus());
        self::$database->bind(":email", $user->getEmail());
        // you may return the rowCount        
        return self::$database->rowCount();
    }

    // get multiple users detail
    // It is not needed in our app, but hey.. more practice is better!
    static function getUsers()  {

        // you know the drill
        // return the multiple result query 
        $sql = "SELECT * FROM user";
        self::$database->query($sql);
        self::$database->execute();
        return self::$database->getSetResult();   

    }
    
    
}