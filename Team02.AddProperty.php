<?php
//Include files
include_once('inc/config.inc.php');
include_once('inc/Entity/PageAddProperty.class.php');
include_once('inc/Entity/User.class.php');
include_once('inc/Entity/Property.class.php');
include_once('inc/Utility/PDOWrapper.class.php');
include_once('inc/Utility/UserDAO.class.php');
include_once('inc/Utility/ValidateProperty.class.php');
include_once('inc/Utility/PostingDAO.class.php');
include_once('inc/Utility/PropertyDAO.class.php');
session_start();

$currentUserName = $currentPhoto = $currentID = '';

if(session_id()!='' && $_SESSION['loggedin'] && $_SESSION['IDloggedin'] && $_SESSION['photoLogin']){
    $currentUserName = $_SESSION['loggedin'];
    $currentPhoto = $_SESSION['photoLogin'];
    $currentID = $_SESSION['IDloggedin'];
}else{
    header("Location: Team02.Login_Register.php");
    exit;
}
$errorInput = [];
if(!empty($_POST)){
    if($_POST['addProperty'] = "addProperty"){

        //Check if there are any errors
        
        $hasError = 0;
        $errorInput = ValidateProperty::validateInputProperty();
        foreach($errorInput as $status){
            if($status != 1) {
                $hasError++;
            }
        }
        //If there is no error during input
        if($hasError ==0){
            PropertyDAO::initialize();

        $newProperty = new PostingProperty();

        //(ownerID, postTitle, postDate, availableDate, lengthContract, monthlyRent
        //street, city, province, type, area, numberOfBed, numberOfBath, 
        //numberOfGarage, picture, status, description)
        $now = new DateTime();

        $newProperty->setOwnerID($currentID);
        $newProperty->setPostTitle($_POST['title']);
        $newProperty->setPostDate($now->format('Y-m-d'));
        $newProperty->setAvailableDate($_POST['availabledate']);
        $newProperty->setLengthContract($_POST['rentcontract']);
        $newProperty->setMonthlyRent($_POST['monthlyrent']);
        $newProperty->setStreet($_POST['street']);
        $newProperty->setCity($_POST['city']);
        $newProperty->setProvince($_POST['province']);
        $newProperty->setType($_POST['type']);
        $newProperty->setArea($_POST['area']);
        $newProperty->setNumberOfBed($_POST['bedrooms']);
        $newProperty->setNumberOfBath($_POST['bathrooms']);
        $newProperty->setNumberOfGarage($_POST['garages']);
        $newProperty->setPicture($_POST['photo']);
        $newProperty->setStatus('available');
        $newProperty->setDescription($_POST['description']);

        PropertyDAO::createProperty($newProperty);

        header("Location: Team02.MyProperties.php");
        exit;
        }

        
    }
}

PageAddProperty::showHeader($currentUserName, $currentPhoto);

PageAddProperty::showMainPage($errorInput);
PageAddProperty::showFooter();
?>