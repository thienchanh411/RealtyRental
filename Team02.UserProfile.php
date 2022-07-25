<?php
//Include all files
include_once('inc/config.inc.php');
include_once('inc/Entity/Page.class.php');
include_once('inc/Entity/User.class.php');
include_once('inc/Utility/PDOWrapper.class.php');
include_once('inc/Utility/UserDAO.class.php');
include_once('inc/Utility/Validate.class.php');

session_start();
UserDAO::initialize();
        $currentUser = UserDAO::getUserByUsername($_SESSION['loggedin']);
        Page::showHeaderLogin();
        Page::showEditFormProfile($currentUser);
        Page::showFooterUserProfile();
//Check if there is logout button clicked
// if(!isset($_POST['submit'])){
//     //if not => 
//     if(isset($_SESSION['loggedin'])){
//         UserDAO::initialize();
//         $currentUser = UserDAO::getUserByUsername($_SESSION['loggedin']);
//         Page::showHeaderLogin();
//         Page::showEditFormProfile($currentUser);
//         Page::showFooter();
//     }else{
//         header("Location: Team02.Login_Register.php");
//     }
// // If the logout button is clicked =>     
// }else{
//     unset($_SESSION['loggedin']);
//     session_destroy();
//     Page::showHeaderProfile();
//     Page::showLogin_Register();
//     Page::showFooter();
// }

?>