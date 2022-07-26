<?php
Class Posting{
    private $postID;
    private $propertyID;
    private $postDate;
    private $postTitle;
    private $availableDate;
    private $monthlyRent;
    private $lengthContract;

    //Getters
    function getPropertyID(){
        return $this->propertyID;
    } 
    function getPostID(){
        return $this->postID;
    }
    function getPostTitle(){
        return $this->postTitle;
    }
    function getPostDate(){
        return $this->postDate;
    }
    function getAvailableDate(){
        return $this->availableDate;
    }
    function getMonthlyRent(){
        return $this->monthlyRent;
    }
    function getLengthContract(){
        return $this->lengthContract;
    }
    

    //Setters
    function setPropertyID( $propertyID){
        $this->propertyID = $propertyID;
    }
    
    function setPostTitle( $postTitle){
        $this->postTitle = $postTitle;
    }
    function setPostDate( $postDate){
        $this->postDate = $postDate;
    }
    function setAvailableDate( $availableDate){
        $this->availableDate = $availableDate;
    }
    function setMonthlyRent( $monthlyRent){
        $this->monthlyRent = $monthlyRent;
    }
    function setLengthContract( $lengthContract){
        $this->lengthContract = $lengthContract;
    }
    
}
?>

