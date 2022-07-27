<?php
//Include files
include_once('inc/config.inc.php');
include_once('inc/Entity/PageAddProperty.class.php');
include_once('inc/Entity/PageMyProperties.class.php');
include_once('inc/Entity/User.class.php');
include_once('inc/Entity/Property.class.php');
include_once('inc/Utility/PDOWrapper.class.php');
include_once('inc/Utility/UserDAO.class.php');
include_once('inc/Utility/Validate.class.php');
include_once('inc/Utility/PostingDAO.class.php');
include_once('inc/Utility/PropertyDAO.class.php');

session_start();
UserDAO::initialize();
PropertyDAO::initialize();

$currentUserName = $currentPhoto = $currentID = '';

if(session_id()!='' && $_SESSION['loggedin'] && $_SESSION['IDloggedin'] && $_SESSION['photoLogin']){
    $currentUserName = $_SESSION['loggedin'];
    $currentPhoto = $_SESSION['photoLogin'];
    $currentID = $_SESSION['IDloggedin'];
}else{
    header("Location: Team02.Login_Register.php");
   
}

$listPostingProperties = [];

$listPostingProperties = PropertyDAO::getPropertiesOfOwner($currentID);


PageMyProperties::showHeader($currentUserName, $currentPhoto);
PageMyProperties::showMainPage($listPostingProperties);
PageMyProperties::showFooter();
?>