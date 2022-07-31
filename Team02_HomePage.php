<?php
//Include files
include_once('inc/config.inc.php');
include_once('inc/Entity/PageHome.class.php');
include_once('inc/Entity/User.class.php');
include_once('inc/Entity/Property.class.php');
include_once('inc/Utility/PDOWrapper.class.php');
include_once('inc/Utility/UserDAO.class.php');
include_once('inc/Utility/Validate.class.php');
include_once('inc/Utility/PostingDAO.class.php');
include_once('inc/Utility/PropertyDAO.class.php');
include_once('inc/Utility/TransactionDAO.class.php');

//include RestAPI files

//BECAREFUL! NOT INCLUDE THE REST_API FILE
//IF NOT THE JSON WILL BE PRINTED AND THE HTML SYSTAX WILL BE ERRORED => 
//=> CANNOT DISPLAY!!!

include_once('inc/Utility/SimpleRoute.class.php');
include_once('inc/Utility/RestHomePage.class.php');

//start session
//session_start();
//initialize DAOs
UserDAO::initialize();
PropertyDAO::initialize();
TransactionDAO::initialize();

SimpleRoute::initialize(APP_NAME_HOMEPAGE);
$route = SimpleRoute::getRouteHomePage();

//
session_start();
$jsonProperties;

$loggedIn = false;
$currentUserName = $currentPhoto = $currentID = $currentFullName = '';
//Check user logged in or not by checking SESSION
if(session_id()!='' && $_SESSION['loggedin'] && $_SESSION['IDloggedin'] && $_SESSION['photoLogin'] 
    && $_SESSION['fullNameLoggedin']){
    $currentUserName = $_SESSION['loggedin'];
    $currentPhoto = $_SESSION['photoLogin'];
    $currentID = $_SESSION['IDloggedin'];
    $currentFullName = $_SESSION['fullNameLoggedin'];
    $loggedIn = true;

    $route['userID'] = $currentID;
    $jsonProperties = json_decode(RestClient::call("GET",$route));
    

}else{
    //header("Location: Team02.Login_Register.php");
    $jsonProperties = json_decode(RestClient::call("GET",array()));//just send empty array

}

//When user click search button
if($_POST){
    if($_POST['search'] == "search"){
            
        if($loggedIn=true){
            header("Location: Team02.SearchProperties.php");
            exit;
        
            //If User not loggedin => redirect to login page
        }else{
            header("Location: Team02.Login_Register.php");
            exit;
        }
        
    }
}
//When user click sign out
if(!empty($_GET)){
    if(isset($_GET['action']) && $_GET['action'] == "signout"){
        unset($_SESSION['loggedin']);
        unset($_SESSION['IDloggedin']);
        unset($_SESSION['photoLogin']);
        unset($_SESSION['fullNameLoggedin']);
        session_destroy();
        header("Location: Team02.Login_Register.php");
        exit;
    }
}

//The commend block work fine when using DAO

// $listAvailableProperties = [];

// if($loggedIn=true){
//     $listAvailableProperties = PropertyDAO::userSearchAvailablePosts($currentID);
// }else{
//     $listAvailableProperties = PropertyDAO::getAllVailableProperties();
// }


$listAvailableProperties = [];
foreach($jsonProperties as $property){
    $prop = new PostingProperty();

    $prop->setPostID($property->postID);
    $prop->setOwnerID($property->ownerID);
    $prop->setPostTitle($property->postTitle);
    $prop->setPostDate($property->postDate);
    $prop->setAvailableDate($property->availableDate);
    $prop->setLengthContract($property->lengthContract);
    $prop->setMonthlyRent($property->monthlyRent);
    $prop->setStreet($property->street);
    $prop->setCity($property->city);
    $prop->setProvince($property->province);
    $prop->setType($property->type);
    $prop->setArea($property->area);
    $prop->setNumberOfBed($property->numberOfBed);
    $prop->setNumberOfBath($property->numberOfBath);
    $prop->setNumberOfGarage($property->numberOfGarage);
    $prop->setPicture($property->picture);
    $prop->setStatus($property->status);
    $prop->setDescription($property->description);


    $listAvailableProperties[] = $prop;
}


PageHome::showHeader($loggedIn, $currentFullName, $currentPhoto);
PageHome::showBodyPage($listAvailableProperties, $loggedIn);
PageHome::showFooter();
?>