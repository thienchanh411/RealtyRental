<?php
//Include all files
include_once('inc/config.inc.php');
include_once('inc/Entity/Page.Search.class.php');
include_once('inc/Entity/User.class.php');
include_once('inc/Entity/Transaction.class.php');
include_once('inc/Entity/Property.class.php');
include_once('inc/Utility/PDOWrapper.class.php');
include_once('inc/Utility/UserDAO.class.php');
include_once('inc/Utility/Validate.class.php');
include_once('inc/Utility/TransactionDAO.class.php');
include_once('inc/Utility/PropertyDAO.class.php');

PropertyDAO::initialize();

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


$listAvailableProperties;
if($loggedIn==true){
    $listAvailableProperties = PropertyDAO::userSearchAvailablePosts($currentID);
}

//Check if having POST
if($_POST){
    //CHeck if user click Seach button
    if($_POST['search'] == "search" && $loggedIn==true){
            
        if($_POST['searchKeyword']){

            $listAvailableProperties = PropertyDAO::userSearchByKeyWord($currentID, $_POST['searchKeyword']);
            
            
        }else{
            $listAvailableProperties = PropertyDAO::userSearchAvailablePosts($currentID);
        }
        
    }else{//If User not loggedin => redirect to login page
            // header("Location: Team02.Login_Register.php");
            // exit;
        }
}


//When user click sign out

if(($_GET)){
    var_dump($_GET);
    if(isset($_GET['action']) && $_GET['action'] == "signout"){
        unset($_SESSION['loggedin']);
        unset($_SESSION['IDloggedin']);
        unset($_SESSION['photoLogin']);
        unset($_SESSION['fullNameLoggedin']);
        session_destroy();
        header("Location: Team02.Login_Register.php");
        exit;
    }

    if(isset($_GET['action']) && $_GET['action'] == "booking"){
        if(isset($_GET['ternantID']) && isset($_GET['postID'])){

            $newBooking = new Transaction();

            $now = new DateTime();

            $newBooking->setTernantID(($_GET['ternantID']));
            $newBooking->setPostID(($_GET['postID']));
            $newBooking->setRequestedDate($now->format('Y-m-d'));
            $newBooking->setStatus("requested");

            TransactionDAO::initialize();
            TransactionDAO::createRequestTrans($newBooking);

            $confirmBooking = TransactionDAO::getConfirmNewBooking($_GET['ternantID'], $_GET['postID']);
            if(isset($confirmBooking)){
                //echo "<script>alert('Congratulation! Your booking is successful!')</script>";
            }
            
        }
    }
}
//





PageSearchProperty::showHeader($currentFullName, $currentPhoto, $loggedIn);
PageSearchProperty::showBodyPage($listAvailableProperties,  $currentID);
PageSearchProperty::showFooter();
?>