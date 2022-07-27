<?php


//Include files
include_once('inc/config.inc.php');
include_once('inc/Entity/PageEditProperty.class.php');
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

if($_GET){
    if($_GET['postID']){
        PropertyDAO::initialize();

        $currentProperty = PropertyDAO::getProperty($_GET['postID']);
    }
}

$errorInput = [];
if(!empty($_POST)){
    if($_POST['editProperty'] = "editProperty"){

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
            //PropertyDAO::initialize();

        $editProperty = new PostingProperty();

        //(ownerID, postTitle, postDate, availableDate, lengthContract, monthlyRent
        //street, city, province, type, area, numberOfBed, numberOfBath, 
        //numberOfGarage, picture, status, description)

        $editProperty->setPostID($_GET['postID']);
        $editProperty->setOwnerID($currentID);
        $editProperty->setPostTitle($_POST['title']);
        $editProperty->setAvailableDate($_POST['availabledate']);
        $editProperty->setLengthContract($_POST['rentcontract']);
        $editProperty->setMonthlyRent($_POST['monthlyrent']);
        $editProperty->setStreet($_POST['street']);
        $editProperty->setCity($_POST['city']);
        $editProperty->setProvince($_POST['province']);
        $editProperty->setType($_POST['type']);
        $editProperty->setArea($_POST['area']);
        $editProperty->setNumberOfBed($_POST['bedrooms']);
        $editProperty->setNumberOfBath($_POST['bathrooms']);
        $editProperty->setNumberOfGarage($_POST['garages']);
        if($_POST['photo']){
            $editProperty->setPicture($_POST['photo']);
        }else $editProperty->setPicture($currentProperty->getPicture());
        
        $editProperty->setStatus('available');
        $editProperty->setDescription($_POST['description']);

        PropertyDAO::updateProperty($editProperty);

        header("Location: Team02.MyProperties.php");
        exit;
        }

        
    }
}

PageEditProperty::showHeader($currentUserName, $currentPhoto);

PageEditProperty::showMainPage($currentProperty, $errorInput);
PageEditProperty::showFooter();
?>
