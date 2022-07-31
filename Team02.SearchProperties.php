<?php
//Include all files
include_once('inc/config.inc.php');
include_once('inc/Entity/Page.Search.class.php');
include_once('inc/Entity/User.class.php');
include_once('inc/Entity/Posting.class.php');
include_once('inc/Entity/Property.class.php');
include_once('inc/Utility/PDOWrapper.class.php');
include_once('inc/Utility/UserDAO.class.php');
include_once('inc/Utility/Validate.class.php');
include_once('inc/Utility/PostingDAO.class.php');
include_once('inc/Utility/PropertyDAO.class.php');

PropertyDAO::initialize();
PostingDAO::initialize();
session_start();
$loggedIn = false;
$listAvailableProperties = [];

$currentUserName = $currentPhoto = $currentID = $currentFullName = '';
//Check user logged in or not by checking SESSION
if(session_id()!='' && $_SESSION['loggedin'] && $_SESSION['IDloggedin'] && $_SESSION['photoLogin'] 
    && $_SESSION['fullNameLoggedin']){
    $currentUserName = $_SESSION['loggedin'];
    $currentPhoto = $_SESSION['photoLogin'];
    $currentID = $_SESSION['IDloggedin'];
    $currentFullName = $_SESSION['fullNameLoggedin'];
    $loggedIn = true;
}else{
    header("Location: Team02.Login_Register.php");
    exit;
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
$listAvailableProperties;
if($loggedIn=true){
    $listAvailableProperties = PropertyDAO::userSearchAvailablePosts($currentID);
}

//Check if having POST
if($_POST){
    if($_POST['search'] == "search" && $loggedIn=true){
            
        if($_POST['searchKeyword']){

            $listAvailableProperties = PropertyDAO::userSearchByKeyWord($currentID, $_POST['searchKeyword']);
            
            
        }else{
            $listAvailableProperties = PropertyDAO::userSearchAvailablePosts($currentID);
        }
        
    }else{//If User not loggedin => redirect to login page
            header("Location: Team02.Login_Register.php");
            exit;
        }
}




PageSearchProperty::showHeader($currentFullName, $currentPhoto, $loggedIn);
if(!empty($listAvailableProperties)){
    PageSearchProperty::showBodyPage($listAvailableProperties,  $loggedIn);
}


PageSearchProperty::showFooter();
?>