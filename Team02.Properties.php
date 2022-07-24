<?php
//Include all files
include_once('inc/config.inc.php');
include_once('inc/Entity/Page.class.php');
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

$listProperties = PropertyDAO::getPostedProperties();

Page::showHeaderListPostingProperties();
if(!empty($listProperties)){
    Page::showListPostingProperties($listProperties);
}



Page::showFooter();
?>