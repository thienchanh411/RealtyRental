<?php
//Include all files
include_once('inc/config.inc.php');
include_once('inc/Entity/Page.class.php');
include_once('inc/Entity/User.class.php');
include_once('inc/Utility/PDOWrapper.class.php');
include_once('inc/Utility/UserDAO.class.php');
include_once('inc/Utility/Validate.class.php');

//Check if POST or not
if(!empty($_POST)){
    //Check if has POST from sign up button
    if(!empty($_POST['signup'])){
        
        //Check if there are any errors
        
        $hasError = 0;
        $errors= "";
        $validStatus = Validate::validateRegisterForm();
    foreach($validStatus as $status){
        if($status != null) {
            $hasError++;
            $errors .= $status.' ' ;
        }else {
            
        }
    }
    //If has error => display the errors
    if($hasError!=0){
         $errorAlert = '<script>alert("'.$errors.'")</script>';
         echo $errorAlert;
        
    // Else =>
    }else{
        
        UserDAO::initialize();

        $newUser = new User();

        $newUser->setEmail($_POST['email']);
        $newUser->setPassword($_POST['password']);
        $newUser->setUserName($_POST['username']);
        $newUser->setAddress($_POST['address']);
        $newUser->setPhoneNumber($_POST['phone']);
        $newUser->setFullName($_POST['fullname']);
        $newUser->setRole("user");
        $newUser->setStatus("active");

        UserDAO::createUser($newUser);

    }
    }

    //Check if the Post from Log in
    if(!empty($_POST['login'])){
        UserDAO::initialize();
    //Get the current user 
    $verifiedUser = UserDAO::getUserByUsername($_POST['username']);
    //if there is no such user, update the page notifications
    //otherwise, check the DAO if it returns an object of type user

        //Verify the password with the posted data
        $errorAlert = "<script>alert('Wrong username or password')</script>";
    if($verifiedUser && $verifiedUser->getStatus()=="active" && $verifiedUser->verifyPassword($_POST['password'])){       
        session_start();
        $_SESSION['loggedin'] = $verifiedUser->getUserName();
        header("Location: Team02.UserProfile.php");
        exit;
    }else echo $errorAlert;
    }
    
}
    Page::showHeaderLogin();
    Page::showLogin_Register();
    Page::showFooter();
?>