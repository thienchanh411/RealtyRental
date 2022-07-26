<?php
class TransactionDAO   {

    // Create a member to store the PDO agent
    private static $database;
    // create the init function to start the PDO wrapper
    static function initialize(){
        self::$database = new PDOWrapper("Transaction");
    }
    // function to create user
    static function createRequestTrans(Transaction $transaction){

        // query
        $sql = "INSERT INTO transaction (ternantID, postID, requestedDate, status)
        VALUES (:ternantID, :postID, :requestedDate, :status)";
        self::$database->query($sql);
        // bind
        self::$database->bind(":ternantID", trim($transaction->getTernantID()));
        self::$database->bind(":postID", trim($transaction->getPostID()));
        self::$database->bind(":requestedDate", trim($transaction->getRequestedDate()));
        self::$database->bind(":status", "pending");
        // execute
        self::$database->execute();
        // you may return the rowCount
        return self::$database->rowCount();
    }

    // method using for ternant to keep track with their requests 
    static function ternantTrackRequest(int $ternantID)  {
        
        $sql = "SELECT * FROM transaction where ternantID = :ternantID
                                            and status = 'pending'";
        self::$database->query($sql);
        self::$database->bind(":ternantID", $ternantID);
        //self::$database->bind(":status", $status);
        self::$database->execute();
        // return the set of result query
        return self::$database->getSetResult();
    }

    // method using for Owner to keep track with their posts which are requested
    static function ownerTrackPosting(int $ownerID)  {
        
        $sql = "SELECT tr.transactionID, tr.ternantID, tr.postID, tr.requestedDate, tr.approvedDate, tr.status
                FROM transaction tr, property prop, posting 
                where tr.postID = posting.postID 
                and posting.propertyID = prop.propertyID
                and prop.ownerID = :ownerID
                and tr.status = 'pending'";
        self::$database->query($sql);
        self::$database->bind(":ownerID", $ownerID);
       
        self::$database->execute();
        // return the set of results query
        return self::$database->getSetResult();
    }

    static function getTransactionsByPosting(int $postID) {
        $sql = "SELECT tr.*, user.fullName
                FROM transaction tr, user
                where tr.postID = :postID
                and user.userID = tr.ternantID";
        self::$database->query($sql);
        self::$database->bind(":postID", $postID);

        self::$database->execute();
        // return the set of results query
        return self::$database->getSetResult();
    }

    // get single Transaction => use for update (approved or reject)
    static function getTransaction(int $transactionID)  {
        
        $sql = "SELECT * FROM transaction 
                where transactionID = :transactionID";
        self::$database->query($sql);
        self::$database->bind(":transactionID", $transactionID);
       
        self::$database->execute();
        // return the single result query
        return self::$database->getSingleResult();
    }

    //function for confirm the new booking
    static function getConfirmNewBooking(int $ternantID, int $postID)  {
        
        $sql =  "SELECT u.fullName, u.phoneNumber, u.email, u.address, p.postTitle 
                FROM user u, transaction t, postingproperty p 
                WHERE t.postID = p.postID and p.ownerID = u.userID
                and t.ternantID = :ternantID and t.postID = :postID";
        self::$database->query($sql);
        self::$database->bind(":ternantID", $ternantID);
        self::$database->bind(":postID", $postID);

        self::$database->execute();
        // return the single result query
        return self::$database->getSingleResult();
    }

    // Ternant can cancel the request
    static function userCancelRequest(int $transactionID)    {

        // you know the drill
        $sql = "UPDATE transaction SET status  = 'canceled'
                WHERE transactionID = :transactionID";
        self::$database->query($sql);
        self::$database->bind(":transactionID", $transactionID);
        // you may return the rowCount        
        return self::$database->rowCount();
    }

    // Owner reject the request
    static function ownerRejectRequest(int $transactionID, $rejectedDate)    {

        // you know the drill
        $sql = "UPDATE transaction SET status  = 'rejected',
                rejectedDate = :rejectedDate
                WHERE transactionID = :transactionID";
        self::$database->query($sql);
        self::$database->bind(":transactionID", $transactionID);
        self::$database->bind(":rejectedDate", $rejectedDate);
        self::$database->execute();
        // you may return the rowCount        
        return self::$database->rowCount();
    }

    // Owner reject the request
    static function ownerApproveRequest(int $transactionID, $approvedDate)    {

        // you know the drill
        $sql = "UPDATE transaction SET status  = 'approved',
                approvedDate = :approvedDate
                WHERE transactionID = :transactionID";
        self::$database->query($sql);
        self::$database->bind(":transactionID", $transactionID);
        self::$database->bind(":approvedDate", $approvedDate);
        self::$database->execute();
        // you may return the rowCount        
        return self::$database->rowCount();
    }

    static function getAllTransactions()  {
        
        $sql = "SELECT * FROM transaction";
        self::$database->query($sql);
        self::$database->execute();
        // return the single result query
        return self::$database->getSetResult();
    }
}
?>