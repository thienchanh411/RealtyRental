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

if(session_id() != "" && isset($_SESSION['loggedin'])){

    $currentUser = UserDAO::getUserByUsername($_SESSION['loggedin']);
        
}else{
        header("Location: Team02.Login_Register.php");
       
}

$listPostingProperties = [];

$listPostingProperties = PropertyDAO::getPropertiesOfOwner($currentUser->getUserID());


PageMyProperties::showHeader($currentUser);
PageMyProperties::showMainPage($listPostingProperties);
PageMyProperties::showFooter();
?>