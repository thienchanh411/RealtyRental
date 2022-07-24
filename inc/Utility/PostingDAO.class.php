<?php
class PostingDAO{
    // Create a member to store the PDO agent
    private static $database;
    // create the init function to start the PDO wrapper
    static function initialize(){
        self::$database = new PDOWrapper("Posting");
    }
    // function to create a posting
    static function createRequestTrans(Posting $posting){

        // query
        $sql = "INSERT INTO posting (propertyID, postDate, postTitle,availableDate, monthlyRent, lengthContract)
        VALUES (:propertyID, :postDate, :postTitle, :availableDate, :monthlyRent, :lengthContract)";
        self::$database->query($sql);
        // bind
        self::$database->bind(":propertyID", trim($posting->getPropertyID()));
        self::$database->bind(":postTitle", trim($posting->getPostTitle()));
        self::$database->bind(":postDate", trim($posting->getPostDate()));
        self::$database->bind(":availableDate", trim($posting->getAvailableDate()));
        self::$database->bind(":monthlyRent", trim($posting->getMonthlyRent()));
        self::$database->bind(":lengthContract", trim($posting->getLengthContract()));
                
        // execute
        self::$database->execute();
        // you may return the rowCount
        return self::$database->rowCount();
    }

    // method using for Owner to keep track with their posts
    // if user need more information of the specific room 
    // => can use getProperty() in PropertyDAO class 
    static function listOwnerPosts(int $ownerID)  {
        
        $sql = "SELECT p.postID, p.propertyID, p.postDate, p.monthlyRent, p.lengthContract 
                FROM property prop, posting p
                WHERE p.propertyID = prop.propertyID
                and prop.ownerID = :ownerID";
        self::$database->query($sql);
        self::$database->bind(":ownerID", $ownerID);
       
        self::$database->execute();
        // return the set of results query
        return self::$database->getSetResult();
    }

    // method using for User to find the posted Rooms
    static function listAvailablePosts()  {
        
        $sql = "SELECT p.postID, p.propertyID, p.postDate, p.monthlyRent, p.lengthContract 
                FROM property prop, posting p
                WHERE p.propertyID = prop.propertyID
                and prop.status = 'Available'";
        self::$database->query($sql);
       
        self::$database->execute();
        // return the set of results query
        return self::$database->getSetResult();
    }

    // get single Posting => use for updating 
    static function getSinglePosting(int $postID)  {
        
        $sql = "SELECT * FROM posting 
                where postID = :postID";
        self::$database->query($sql);
        self::$database->bind(":postID", $postID);
       
        self::$database->execute();
        // return the single result query
        return self::$database->getSingleResult();
    }

    // Owner reject the request
    static function updatePosting(Posting $posting)    {

        $sql = "UPDATE posting SET propertyID  = :propertyID,
                postDate = :postDate,
                postTitle = :postTitle, 
                monthlyRent = :monthlyRent, 
                availableDate = :availableDate,
                lengthContract = :lengthContract
                WHERE postID = :postID";

        self::$database->bind(":postID", $posting->getPostID());

        self::$database->bind(":propertyID", $posting->getPropertyID());
        self::$database->bind(":postDate", $posting->getPostDate());
        self::$database->bind(":postTitle", $posting->getPostTitle());
        self::$database->bind(":monthlyRent", $posting->getMonthlyRent());
        self::$database->bind(":lengthContract", $posting->getLengthContract());
        self::$database->bind(":availableDate", $posting->getAvailableDate());
        self::$database->bind(":postID", $posting->getPostID());
        
        // you may return the rowCount        
        return self::$database->rowCount();
    }

    
}
?>