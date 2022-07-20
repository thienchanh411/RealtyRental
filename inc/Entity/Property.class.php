<?php

class Property{

    private $propertyID;	
	private $ownerID;
	private $street;			
	private $city;
	private $province;	
	private $type;
	private $numberOfRoom;
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
    function getNumberOfRoom(){
        return $this->numberOfRoom;
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
    function setNumberOfRoom( $numberOfRoom){
        $this->numberOfRoom = $numberOfRoom;
    }
    function setStatus( $status){
        $this->status = $status;
    }
    function setDescription( $description){
        $this->description = $description;
    }

}


?>