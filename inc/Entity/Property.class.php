<?php

class Property{

    private $propertyID;	
	private $ownerID;
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
    function getPropertyID(){
        return $this->propertyID;
    } 
    function getOwnerID(){
        return $this->ownerID;
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
    function setPropertyID( $propertyID){
        $this->propertyID = $propertyID;
    }
    function setOwnerID( $ownerID){
        $this->ownerID = $ownerID;
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