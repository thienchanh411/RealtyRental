<?php
//Include files
include_once('inc/config.inc.php');
include_once('inc/Entity/PageAdmin.class.php');
include_once('inc/Entity/User.class.php');
include_once('inc/Entity/Property.class.php');
include_once('inc/Entity/Transaction.class.php');
include_once('inc/Utility/PDOWrapper.class.php');
include_once('inc/Utility/UserDAO.class.php');
include_once('inc/Utility/PropertyDAO.class.php');
include_once('inc/Utility/TransactionDAO.class.php');

session_start();
$currentUserName = $currentPhoto = $currentID = $currentFullName = '';

if (session_id() != '' && isset($_SESSION['loggedin']) && $_SESSION['loggedin'] && $_SESSION['IDloggedin'] && $_SESSION['photoLogin']
     && $_SESSION['role'] == 'admin') {
    $currentUserName = $_SESSION['loggedin'];
    $currentPhoto = $_SESSION['photoLogin'];
    $currentID = $_SESSION['IDloggedin'];
    $currentFullName = $_SESSION['fullNameLoggedin'];
} else {
    header("Location: Team02.Login_Register.php");
}

UserDAO::initialize();
PropertyDAO::initialize();
TransactionDAO::initialize();

if (isset($_GET['action'])){
    if ($_GET['action'] == 'deleteProperty' && isset($_GET['postID'])) {
        PropertyDAO::ownerDeleteProperty($_GET['postID']);
        header("Location: ".$_SERVER['PHP_SELF']);
    }
    else if ($_GET['action'] == 'deleteUser' && isset($_GET['userID'])) {
        UserDAO::adminDeleteUser($_GET['userID']);
        PropertyDAO::ownerDeleteAllProperties($_GET['userID']);
        header("Location: ".$_SERVER['PHP_SELF']);
    }
}

$listUsers = UserDAO::getUsers();
$listPostingProperties = PropertyDAO::getAllProperties();
$listTransactions = TransactionDAO::getAllTransactions();

PageAdmin::showHeader($currentFullName, $currentPhoto);
PageAdmin::showMainPage(count($listPostingProperties), count($listTransactions), count($listUsers), 
    $listPostingProperties, $listUsers);
PageAdmin::showFooter();
