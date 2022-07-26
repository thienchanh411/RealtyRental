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

if($_GET && isset($_GET['action']) && $_GET['action'] == "booking"){
    if(isset($_GET['ternantID']) && isset($_GET['postID'])){

        $newBooking = new Transaction();

        $newBooking->setTernantID(($_GET['ternantID']));
        $newBooking->setPostID(($_GET['postID']));
        $newBooking->setRequestedDate(gmdate('Y-m-d H:i:s'));
        $newBooking->setStatus("requested");

        TransactionDAO::initialize();
        TransactionDAO::createRequestTrans($newBooking);

        $confirmBooking = TransactionDAO::getConfirmNewBooking($_GET['ternantID'], $_GET['postID']);
        header('Content-Type: application/json');
        echo json_encode($confirmBooking);
        exit;
    }
}

session_start();
$loggedIn = false;
$listAvailableProperties = [];

$currentUserName = $currentPhoto = $currentID = $currentFullName = '';
//Check user logged in or not by checking SESSION
if(session_id()!='' && isset($_SESSION['loggedin']) && $_SESSION['loggedin'] && $_SESSION['IDloggedin'] && $_SESSION['photoLogin'] 
    && $_SESSION['fullNameLoggedin']){

    $currentUserName = $_SESSION['loggedin'];
    $currentPhoto = $_SESSION['photoLogin'];
    $currentID = $_SESSION['IDloggedin'];
    $currentFullName = $_SESSION['fullNameLoggedin'];
    $loggedIn = true;

}


$listAvailableProperties;
if($loggedIn==true){
    $listAvailableProperties = PropertyDAO::userSearchAvailablePosts($currentID);
}else{
    $listAvailableProperties = PropertyDAO::getAllVailableProperties();
}

//Check if having POST
if($_POST){
    //CHeck if user click Seach button
    if($_POST['search'] == "search"){
        if($_POST['searchKeyword']){
            if($loggedIn==true){
                $listAvailableProperties = PropertyDAO::userSearchByKeyWord($currentID, $_POST['searchKeyword']);
            }else {
                $listAvailableProperties = PropertyDAO::getPropertiesByKeyword($_POST['searchKeyword']);
            }

        }
    }
}


PageSearchProperty::showHeader($currentFullName, $currentPhoto, $loggedIn);
PageSearchProperty::showBodyPage($listAvailableProperties,  $currentID);
PageSearchProperty::showFooter();
?>