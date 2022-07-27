<?php

class PostingProperty{
   
    private $postID;
    private $ownerID;
    private $postTitle;
    private $postDate;
    
    private $availableDate;
    private $monthlyRent;
    private $lengthContract;
    
	
	private $street;			
	private $city;
	private $province;	
	private $type;
    private $area;
	private $numberOfBed;
    private $numberOfBath;
    private $numberOfGarage;
	private $picture;
    private $status; 
	private $description;

    //Getters
    function getPostID(){
        return $this->postID;
    } 
    function getOwnerID(){
        return $this->ownerID;
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
    function getStreet(){
        return $this->street;
    }
    function getCity(){
        return $this->city;
    }
    function getProvince(){
        return $this->province;
    }
    function getType(){
        return $this->type;
    }
    function getArea(){
        return $this->area;
    }
    function getNumberOfBed(){
        return $this->numberOfBed;
    }
    function getNumberOfBath(){
        return $this->numberOfBath;
    }
    function getNumberOfGarage(){
        return $this->numberOfGarage;
    }
    function getPicture(){
        return $this->picture;
    }
    function getStatus(){
        return $this->status;
    }
    function getDescripition(){
        return $this->description;
    }

    //Setters
    function setPostID( $postID){
        $this->postID = $postID;
    }
    function setOwnerID( $ownerID){
        $this->ownerID = $ownerID;
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

    function setStreet( $street){
        $this->street = $street;
    }
    function setCity( $city){
        $this->city = $city;
    }
    function setProvince( $province){
        $this->province = $province;
    }
    function setType( $type){
        $this->type = $type;
    }
    function setArea( $area){
        $this->area = $area;
    }
    function setNumberOfBed( $numberOfBed){
        $this->numberOfBed = $numberOfBed;
    }
    function setNumberOfBath( $numberOfBath){
        $this->numberOfBath = $numberOfBath;
    }
    function setNumberOfGarage( $numberOfGarage){
        $this->numberOfGarage = $numberOfGarage;
    }
    function setPicture( $picture){
        $this->picture = $picture;
    }
    function setStatus( $status){
        $this->status = $status;
    }
    function setDescription( $description){
        $this->description = $description;
    }

}


?>