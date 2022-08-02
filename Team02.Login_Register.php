<?php
//Include all files
include_once('inc/config.inc.php');
include_once('inc/Entity/Page.class.php');
include_once('inc/Entity/User.class.php');
include_once('inc/Utility/PDOWrapper.class.php');
include_once('inc/Utility/UserDAO.class.php');
include_once('inc/Utility/Validate.class.php');

session_start();

if (session_id() != '' && isset($_SESSION['loggedin']) && $_SESSION['loggedin'] && $_SESSION['IDloggedin'] && $_SESSION['photoLogin']
    && $_SESSION['fullNameLoggedin']) {
        unset($_SESSION['loggedin']);
        unset($_SESSION['IDloggedin']);
        unset($_SESSION['photoLogin']);
        unset($_SESSION['fullNameLoggedin']);
        session_destroy();
}

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

        $defaultPhoto = "pngfind.com-privacy-icon-png-4703547.png";

        $newUser->setEmail($_POST['email']);
        $newUser->setPassword($_POST['password']);
        $newUser->setUserName($_POST['username']);
        $newUser->setAddress($_POST['address']);
        $newUser->setPhoneNumber($_POST['phone']);
        $newUser->setPhotoUser($defaultPhoto);
        $newUser->setFullName($_POST['fullname']);

        $newUser->setRole("user");

        // if($_POST['fullname'] == "owner"){
        //     $newUser->setRole("owner");
        // }else $newUser->setRole("user");

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
    if($verifiedUser && $verifiedUser->getStatus()=="active" 
        && $verifiedUser->verifyPassword($_POST['password'])){       
        @session_start();
        $_SESSION['loggedin'] = $verifiedUser->getUserName();
        $_SESSION['IDloggedin'] = $verifiedUser->getUserID();
        $_SESSION['photoLogin'] = $verifiedUser->getPhotoUser();
        $_SESSION['fullNameLoggedin'] = $verifiedUser->getFullName();
        $_SESSION['role'] = $verifiedUser->getRole();
        switch($verifiedUser->getRole()){
            case 'owner': 
                header("Location: Team02.MyProperties.php");
                exit;
                break;
            case 'user': 
                header("Location: Team02.SearchProperties.php");
                exit;
                break;
            case 'admin': 
                header("Location: TeamNumber02.php");
                exit;
                break;

        }
       // exit;
        // if($verifiedUser->getRole()=="owner"){
        //     header("Location: Team02.MyProperties.php");
        // }
        // if($verifiedUser->getRole()=='user'){
        //     header("Location: Team02.SearchProperties.php");
        // }
        // if($verifiedUser->getRole()=="admin"){
        //     header("Location: TeamNumber02.php.php");
        // }
        // exit;
    }else echo $errorAlert;
    }
    
}
    Page::showHeaderLogin();
    Page::showLogin_Register();
    Page::showFooter();
?>
