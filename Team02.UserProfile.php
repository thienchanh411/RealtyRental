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
if(isset($_SESSION['loggedin'])){
    $currentUser = UserDAO::getUserByUsername($_SESSION['loggedin']);
    $isViewProfile = false;
}else{
    header("Location: Team02.Login_Register.php");   
    exit;
}

if(isset($_GET["action"]) && isset($_GET["id"]) && $_GET["action"] == "view"){
    $viewUser = UserDAO::getUserById($_GET["id"]);
    $isViewProfile = true;
}

//Check if there is Edit button clicked
if(!empty($_POST)){
    if(isset($_POST['editProfile']) && $_POST['editProfile']=="editProfile") {
    
    $editUser = new User();
    $editUser->setUserName(trim($_SESSION['loggedin']));
    if(isset($_POST['photo']) && $_POST['photo'] != ""){
        $editUser->setPhotoUser($_POST['photo']);
    }else $editUser->setPhotoUser($currentUser->getPhotoUser());

    $editUser->setPassword(trim($_POST['password']));
    $editUser->setFullName(trim($_POST['fullname']));
    
    //CHeck if new email is existing or not
    if(!(UserDAO::getUserByUsernameAndEmail($_SESSION['loggedin'], $_POST['email']))){
        $editUser->setEmail(trim($_POST['email']));
    }else{

        //Should put the notification if the email already exist
    }
    
    $editUser->setAddress(trim($_POST['address']));
    $editUser->setPhoneNumber(trim($_POST['phone']));

    UserDAO::updateUser($editUser);
    //header("Location: Team02.Login_Register.php");
    unset($_SESSION['loggedin']);
    session_destroy();
    header("Location: Team02.Login_Register.php");
    exit;
    }
}
Page::showHeaderProfile($currentUser);

if($isViewProfile)
    Page::showEditFormProfile($viewUser, $isViewProfile);
else
    Page::showEditFormProfile($currentUser, $isViewProfile);
Page::showFooter();
    
// If the logout button is clicked =>     



?>