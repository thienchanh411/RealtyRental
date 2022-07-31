<?php
//Include files
include_once('inc/config.inc.php');
include_once('inc/Entity/PageAddProperty.class.php');
include_once('inc/Entity/PageMyProperties.class.php');
include_once('inc/Entity/User.class.php');
include_once('inc/Entity/Property.class.php');
include_once('inc/Entity/Transaction.class.php');
include_once('inc/Utility/PDOWrapper.class.php');
include_once('inc/Utility/UserDAO.class.php');
include_once('inc/Utility/Validate.class.php');
include_once('inc/Utility/PropertyDAO.class.php');
include_once('inc/Utility/TransactionDAO.class.php');

session_start();
UserDAO::initialize();
PropertyDAO::initialize();
TransactionDAO::initialize();

$currentUserName = $currentPhoto = $currentID = '';

if (session_id() != '' && $_SESSION['loggedin'] && $_SESSION['IDloggedin'] && $_SESSION['photoLogin']) {
    $currentUserName = $_SESSION['loggedin'];
    $currentPhoto = $_SESSION['photoLogin'];
    $currentID = $_SESSION['IDloggedin'];
} else {
    header("Location: Team02.Login_Register.php");
}

if (isset($_GET["action"]) && isset($_GET["transactionID"])) {
    if ($_GET["action"] == "approve") {
        TransactionDAO::ownerApproveRequest($_GET["transactionID"], gmdate('Y-m-d H:i:s'));
        $transaction = TransactionDAO::getTransaction($_GET["transactionID"]);
        PropertyDAO::ownerApprovedPropertyBooking($transaction->getPostID());
        header("Location: ".$_SERVER['PHP_SELF']);
    } else if ($_GET["action"] == "reject") {
        TransactionDAO::ownerRejectRequest($_GET["transactionID"], gmdate('Y-m-d H:i:s'));
        header("Location: ".$_SERVER['PHP_SELF']);
    }
}

$listPostingProperties = PropertyDAO::getPropertiesOfOwner($currentID);
for ($i = 0; $i < count($listPostingProperties); $i++) {
    $postID = $listPostingProperties[$i]->getPostID();
    $listPostingProperties[$i]->transactions = TransactionDAO::getTransactionsByPosting($postID);
}

PageMyProperties::showHeader($currentUserName, $currentPhoto);
PageMyProperties::showMainPage($listPostingProperties);
PageMyProperties::showFooter();
