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
        $sql = "INSERT INTO user (email, username, password, fullName, address, phoneNumber, photoUser, role, status)
        VALUES (:email, :username, :password, :fullName, :address, :phoneNumber, :photoUser, :role, :status)";
        self::$database->query($sql);
        // bind
        
        self::$database->bind(":email", trim($user->getEmail()));
        self::$database->bind(":username", trim($user->getUserName()));
        self::$database->bind(":password", trim($user->getPassword()));
        self::$database->bind(":fullName", trim($user->getFullName()));
        self::$database->bind(":address", trim($user->getAdress()));
        self::$database->bind(":phoneNumber", trim($user->getPhoneNumber()));
        self::$database->bind(":photoUser", trim($user->getPhotoUser()));
        self::$database->bind(":role", trim($user->getRole()));
        self::$database->bind(":status", trim($user->getStatus()));
        // execute
        self::$database->execute();
        // you may return the rowCount
        return self::$database->rowCount();
    }

    // get user detail by Email => check email is unique
    static function getUserByEmail(string $email)  {
        
        // you know the drill
        $sql = "SELECT * FROM user where email = :email";
        self::$database->query($sql);
        self::$database->bind(":email", $email);
        self::$database->execute();
        // return the single result query
        return self::$database->getSingleResult();
    }

    // get user detail
    static function getUserByUsername(string $username)  {
        
        // you know the drill
        $sql = "SELECT * FROM user where username = :username";
        self::$database->query($sql);
        self::$database->bind(":username", $username);
        self::$database->execute();
        // return the single result query
        return self::$database->getSingleResult();
    }
    //This function used to check if the new email is existing or not
    static function getUserByUsernameAndEmail(string $username, string $newEmail)  {
        
        // you know the drill
        $sql = "SELECT * FROM user where username != :username and email = :email";
        self::$database->query($sql);
        self::$database->bind(":username", $username);
        self::$database->bind(":email", $newEmail);
        self::$database->execute();
        // return the single result query
        return self::$database->getSingleResult();
    }

    // update the current user profile
    
    static function updateUser(User $user)    {

        // you know the drill
        $sql = "UPDATE user SET password = :password,
               fullName = :fullName,
               address = :address,  
               phoneNumber = :phoneNumber,
               photoUser = :photoUser, 
               email  = :email
               WHERE username = :username";

   //username | email  | password   | fullName  | address | phoneNumber  | photoUser
        self::$database->query($sql);
        self::$database->bind(":username", $user->getUserName());
        self::$database->bind(":password", $user->getPassword());
        self::$database->bind(":fullName", $user->getFullName());
        self::$database->bind(":address", $user->getAdress());
        self::$database->bind(":phoneNumber", $user->getPhoneNumber());
        self::$database->bind(":photoUser", $user->getPhotoUser());
        self::$database->bind(":email", $user->getEmail());

        self::$database->execute();
        // you may return the rowCount        
        return self::$database->rowCount();
    }

    static function adminDeleteUser(User $user)    {

        // you know the drill
        $sql = "UPDATE user SET status = :status,
              
                WHERE username = :username";
    //username | email  | password   | fullName  | address | phoneNumber  | photoUser
        self::$database->query($sql);
        self::$database->bind(":username", $user->getUserName());
        
        self::$database->bind(":status", "Inactive");
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

    static function getUserById(string $userID)  {
        
        // you know the drill
        $sql = "SELECT * FROM user where username = :userID";
        self::$database->query($sql);
        self::$database->bind(":userID", $userID);
        self::$database->execute();
        // return the single result query
        return self::$database->getSingleResult();
    }
    
    
}