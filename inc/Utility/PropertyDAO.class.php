<?php
class PropertyDAO   {

    // Create a member to store the PDO agent
    private static $database;
    // create the init function to start the PDO wrapper
    static function initialize(){
        self::$database = new PDOWrapper("Property");
    }
    // function to create user
    static function createProperty(Property $property){
        
        // query
        $sql = "INSERT INTO property (ownerID, street, city, province, type, area, 
                numberOfBed, numberOfBath, numberOfGarage, picture, status, description)
                 VALUES (:ownerID, :street, :city, :province, :type, :area, 
                 :numberOfBed, :numberOfBath, :numberOfGarage, :picture, :status, :description)";
        self::$database->query($sql);
        // bind
        
        self::$database->bind(":ownerID", trim($property->getOwnerID()));
        self::$database->bind(":street", trim($property->getStreet()) );
        self::$database->bind(":city", trim($property->getCity()));
        self::$database->bind(":province", trim($property->getProvince()));
        self::$database->bind(":type", trim($property->getType()));
        self::$database->bind(":area", trim($property->getArea()));
        self::$database->bind(":numberOfBed", trim($property->getNumberOfBed()));
        self::$database->bind(":numberOfBath", trim($property->getNumberOfBath()));
        self::$database->bind(":numberOfGarage", trim($property->getNumberOfGarage()));
        self::$database->bind(":picture", trim($property->getPicture()));
        self::$database->bind(":status", "Available");
        self::$database->bind(":description", trim($property->getDescripition()));
        
        // execute
        self::$database->execute();
        // you may return the rowCount
        return self::$database->rowCount();
    }

    // get Property detail
    static function getProperty(string $propertyID)  {
        
        $sql = "SELECT * FROM property where propertyID = :propertyID";
        self::$database->query($sql);
        self::$database->bind(":propertyID", $propertyID);
        self::$database->execute();
        // return the single result query
        return self::$database->getSingleResult();
    }

    //get posting Properties
    static function getPostedProperties(){
        $sql = "SELECT prop.*, p.postTitle, p.monthlyRent FROM property prop, posting p 
            WHERE p.propertyID = prop.propertyID";

        self::$database->query($sql);
        self::$database->execute();
        // return the set value
        return self::$database->getSetResult();
    }

    // update the current property information
    static function updateProperty(Property $property)    {

        $sql = "UPDATE property SET street = :street, 
               city = :city, 
               province: province, 
               type = :type,
               area = :area, 
               numberOfBed = :numberOfBed, 
               numberOfBath = :numberOfBath,
               numberOfGarage = :numberOfGarage,
               status = :status, 
               description = :description
               WHERE propertyID = :propertyID";
        self::$database->query($sql);


        self::$database->bind(":street", trim($property->getStreet()) );
        self::$database->bind(":city", trim($property->getCity()));
        self::$database->bind(":province", trim($property->getProvince()));
        self::$database->bind(":type", trim($property->getType()));
        self::$database->bind(":area", trim($property->getArea()));
        self::$database->bind(":numberOfBed", trim($property->getNumberOfBed()));
        self::$database->bind(":numberOfBath", trim($property->getNumberOfBath()));
        self::$database->bind(":numberOfGarage", trim($property->getNumberOfGarage()));
        self::$database->bind(":status", trim($property->getStatus()));
        self::$database->bind(":description", trim($property->getDescripition()));
        // you may return the rowCount        
        return self::$database->rowCount();
    }

    // get a set of property of an owner
    static function getProperties(int $ownerID)  {

        // return the multiple result query 
        $sql = "SELECT * FROM property WHERE onwerID = :onwerID";
        self::$database->query($sql);
        self::$database->bind(":ownerID", $ownerID);
        self::$database->execute();
        return self::$database->getSetResult();   

    }
    
    
}
?>