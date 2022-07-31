<?php
class PropertyDAO   {

    // Create a member to store the PDO agent
    private static $database;
    // create the init function to start the PDO wrapper
    static function initialize(){
        self::$database = new PDOWrapper("PostingProperty");
    }
    // function to create user
    static function createProperty(PostingProperty $property){

        // query
        $sql = "INSERT INTO postingproperty (ownerID, postTitle, postDate, availableDate, lengthContract, monthlyRent,
                street, city, province, type, area, numberOfBed, numberOfBath, numberOfGarage, picture, status, description)
                VALUES (:ownerID, :postTitle, :postDate, :availableDate, :lengthContract, :monthlyRent,
                :street, :city, :province, :type, :area, 
                :numberOfBed, :numberOfBath, :numberOfGarage, :picture, :status, :description)";
        self::$database->query($sql);
        // bind
        
        self::$database->bind(":ownerID", trim($property->getOwnerID()));
        self::$database->bind(":postTitle", trim($property->getPostTitle()));
        self::$database->bind(":postDate", trim($property->getPostDate()));
        self::$database->bind(":availableDate", trim($property->getAvailableDate()));
        self::$database->bind(":monthlyRent", trim($property->getMonthlyRent()));
        self::$database->bind(":lengthContract", trim($property->getLengthContract()));
        self::$database->bind(":street", trim($property->getStreet()) );
        self::$database->bind(":city", trim($property->getCity()));
        self::$database->bind(":province", trim($property->getProvince()));
        self::$database->bind(":type", trim($property->getType()));
        self::$database->bind(":area", trim($property->getArea()));
        self::$database->bind(":numberOfBed", trim($property->getNumberOfBed()));
        self::$database->bind(":numberOfBath", trim($property->getNumberOfBath()));
        self::$database->bind(":numberOfGarage", trim($property->getNumberOfGarage()));
        self::$database->bind(":picture", trim($property->getPicture()));
        self::$database->bind(":status", trim($property->getStatus()));
        self::$database->bind(":description", trim($property->getDescripition()));
        
        // execute
        self::$database->execute();
        // you may return the rowCount
        return self::$database->lastInsertedId();
    }

    // get Property detail
    static function getProperty(string $postID)  {
        
        $sql = "SELECT * FROM postingproperty where postID = :postID";
        self::$database->query($sql);
        self::$database->bind(":postID", $postID);
        self::$database->execute();
        // return the single result query
        return self::$database->getSingleResult();
    }

    //get posting Properties
    static function getAllVailableProperties(){
        $sql = "SELECT * FROM postingproperty where status = 'available'";

        self::$database->query($sql);
        self::$database->execute();
        // return the set value
        return self::$database->getSetResult();
    }

    // method using for User to find the posted Rooms
    static function userSearchAvailablePosts(int $userID)  {
        
        $sql = "SELECT * FROM postingproperty
                WHERE ownerID != :ownerID
                and status = 'available'";
        self::$database->query($sql);
        self::$database->bind(":ownerID", $userID);
        self::$database->execute();
        // return the set of results query
        return self::$database->getSetResult();
    }

    static function userSearchByKeyWord(int $userID, string $keyword)  {
        
        $sql = "SELECT * FROM postingproperty
                WHERE ownerID != :ownerID
                and status = 'available'
                and (street like :keyword
                or city like :keyword
                or province like :keyword)";
               
        self::$database->query($sql);
        self::$database->bind(":ownerID", $userID);
        self::$database->bind(":keyword", "%".$keyword."%");
        self::$database->execute();
        // return the set of results query
        return self::$database->getSetResult();
    }

    // update the current property information
    static function updateProperty(PostingProperty $property)    {

    
        $sql = "UPDATE postingproperty SET postTitle = :postTitle, 
                monthlyRent = :monthlyRent, 
                availableDate = :availableDate,
                lengthContract = :lengthContract,
                street = :street, 
                city = :city, 
                province = :province, 
                picture = :picture,
                type = :type,
                area = :area, 
                numberOfBed = :numberOfBed, 
                numberOfBath = :numberOfBath,
                numberOfGarage = :numberOfGarage,
                status = :status, 
                description = :description
                WHERE postID = :postID";
        self::$database->query($sql);
        self::$database->bind(":postID", trim($property->getPostID()));
        self::$database->bind(":postTitle", trim($property->getPostTitle()));
        self::$database->bind(":availableDate", trim($property->getAvailableDate()));
        self::$database->bind(":monthlyRent", trim($property->getMonthlyRent()));
        self::$database->bind(":lengthContract", trim($property->getLengthContract()));
        self::$database->bind(":street", trim($property->getStreet()) );
        self::$database->bind(":city", trim($property->getCity()));
        self::$database->bind(":province", trim($property->getProvince()));
        self::$database->bind(":picture", trim($property->getPicture()));
        self::$database->bind(":type", trim($property->getType()));
        self::$database->bind(":area", trim($property->getArea()));
        self::$database->bind(":numberOfBed", trim($property->getNumberOfBed()));
        self::$database->bind(":numberOfBath", trim($property->getNumberOfBath()));
        self::$database->bind(":numberOfGarage", trim($property->getNumberOfGarage()));
        self::$database->bind(":status", trim($property->getStatus()));
        self::$database->bind(":description", trim($property->getDescripition()));

        self::$database->execute();
        
        return self::$database->rowCount();
    }

    // get a set of property of an owner
    static function getPropertiesOfOwner(int $ownerID)  {

        // return the multiple result query 
        $sql = "SELECT * FROM postingproperty WHERE ownerID = :ownerID and status != 'deleted'";
        self::$database->query($sql);
        self::$database->bind(":ownerID", $ownerID);
        self::$database->execute();
        return self::$database->getSetResult();   

    }
    
    static function ownerDeleteProperty(int $postID)  {

        // return the multiple result query 
        $sql = "UPDATE postingproperty SET status = 'deleted' WHERE postID = :postID";
        self::$database->query($sql);
        self::$database->bind(":postID", $postID);
        self::$database->execute();
        return self::$database->getSetResult();   

    }

    static function ownerApprovedPropertyBooking(int $postID) {

        // return the multiple result query 
        $sql = "UPDATE postingproperty SET status = 'booked' WHERE postID = :postID";
        self::$database->query($sql);
        self::$database->bind(":postID", $postID);
        self::$database->execute();
        return self::$database->getSetResult();   

    }
}
?>