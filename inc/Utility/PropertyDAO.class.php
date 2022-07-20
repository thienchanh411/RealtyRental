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
        $sql = "INSERT INTO user (ownerID, street, city, province, type, numberOfRoom, status, description)
        VALUES (:ownerID, :street, :city, :province, :type, :numberOfRoom, :status, :description)";
        self::$database->query($sql);
        // bind
        
        self::$database->bind(":ownerID", trim($property->getOwnerID()));
        self::$database->bind(":street", trim($property->getStreet()) );
        self::$database->bind(":city", trim($property->getCity()));
        self::$database->bind(":province", trim($property->getProvince()));
        self::$database->bind(":type", trim($property->getType()));
        self::$database->bind(":numberOfRoom", trim($property->getNumberOfRoom()));
        self::$database->bind(":status", "Available");
        self::$database->bind(":description", trim($property->getDescripition()));
        
        // execute
        self::$database->execute();
        // you may return the rowCount
        return self::$database->rowCount();
    }

    // get Property detail
    static function getProperty(string $propertyID)  {
        
        // you know the drill
        $sql = "SELECT * FROM property where propertyID = :propertyID";
        self::$database->query($sql);
        self::$database->bind(":propertyID", $propertyID);
        self::$database->execute();
        // return the single result query
        return self::$database->getSingleResult();
    }

    // update the current property information
    static function updateProperty(Property $property)    {

        // you know the drill
        $sql = "UPDATE property SET street = :street, 
               city = :city, 
               province: province, 
               type = :type, 
               numberOfRoom = :numberOfRoom, 
               status = :status, 
               description = :description
               WHERE propertyID = :propertyID";
        self::$database->query($sql);

        self::$database->bind(":street", trim($property->getPropertyID()) );

        self::$database->bind(":street", trim($property->getStreet()) );
        self::$database->bind(":city", trim($property->getCity()));
        self::$database->bind(":province", trim($property->getProvince()));
        self::$database->bind(":type", trim($property->getType()));
        self::$database->bind(":numberOfRoom", trim($property->getNumberOfRoom()));
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