<?php

class Page
{

    public static $heading = "Assignment4 - CSIS 3280";
    public static $studentID = STUDENT_ID;
    public static $studentName = STUDENT_NAME;
    public static $notifications;


    static function showHeader(){ ?>
        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="utf-8">
            <meta name="author" content="<?=self::$studentName?>">
            <link rel="stylesheet" href="css/styles.css">
        </head>

        <body>
            <section>
                <h1>Assignment4 (Authentication) - <?=self::$studentName?> (<?=self::$studentID?>)</h1>
            </section>
        <?php }


    static function showFooter()
    { ?>
        </body>
        </html>
        <?php }


    static function showAvatarProfile(User $user)
    { ?>
        <!-- profile section -->
        <section>
            <div>                              
                <form action="" method="post">
                    
                    <div>
                        <div>
                            <h2>Hi <?=$user->getAvatarName()?></h2>                            
                            <p>Email Address: <strong><?=$user->getEmail()?></strong></p>
                            <p>Affiliation: <strong><?=$user->getAffiliation()?></strong></p>
                            <p>Guild Name: <strong><?=$user->getGuildName()?></strong></p>
                            <input type="hidden" name="avatar_name" value="<?=$user->getAvatarName()?>">
                            <p><input type="submit" name="submit" value="Logout"></p>
                        </div> 
                        <img src="images/<?=$user->getAvatar()?>.png" width="50%">                                               
                    </div>
                </form>
            </div>
            
        </section>
        <?php }


    static function showLogin()
    { ?>
        <!-- login section -->        
        <section>
            <div>                
                <form action="" method="post">
                    <h2>Please Sign in</h2>
                    <div>
                        <label for="email">Email Address</label>
                        <input type="email" name="email" placeholder="Email address for login" required>
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <div>
                        <input type="submit" name="submit" value="Login">
                    </div>
                    <p class="error"><?=self::$notifications['loginError']?></p>
                    <p>Don not have an account? Please 
                        <a href="Assignment4_register_CVo49240.php">register</a></p>                
                </form>
            </div>
        </section>
        <?php }


    static function showRegistration()
    { ?>
        <!-- register section -->
        <section>
            <div>
                <p>Have an account? Please <a href="Assignment4_login_CVo49240.php">login</a></p>
        <?php
        if(!isset($_POST['submit'])){
            self::showEmptyForm();
        }else{
          // Page::$notifications['registerError'] = Validate::validateRegisterForm();
        if(Page::$notifications['registerError'] != "" || Page::$notifications['exitEmail'] != ""){
        //     self::showEmptyForm();
        // }else{
            
            $textError = "All inputs are required. <br>
            Please fix the error(s) in the".Page::$notifications['registerError'] ." figure inputs";

            echo '<p class="error">'.$textError.'<br>'.Page::$notifications['exitEmail'].'</p>';
            self::showEmptyForm();
        }
        }
        
    }

    static function showEmptyForm(){
        echo '<form action="" method="post">
        <h2>Please fill the form</h2>
        <div>
            <label for="email">Email Address</label>
            <input type="email" name="email" placeholder="Email address for login" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password" required>
        </div>
        <div>
            <label for="password">Password confirm</label>
            <input type="password" name="password2" placeholder="Password confirm" required>
        </div>                    
        <div>
            <label for="avatar_name">Avatar Name</label>
            <input type="text" name="avatar_name" placeholder="Avatar Name" required>
        </div>                                        
        <div>
            <label for="avatar">Avatar Image</label>                        
            <span>
                <input type="radio" name="avatar" value="picture1"><img src="images/picture1.png">
                <input type="radio" name="avatar" value="picture2"><img src="images/picture2.png">                    
                <input type="radio" name="avatar" value="picture3"><img src="images/picture3.png">
                <br>                            
                <input type="radio" name="avatar" value="picture4"><img src="images/picture4.png">
                <input type="radio" name="avatar" value="picture5"><img src="images/picture5.png">
                <input type="radio" name="avatar" value="picture6"><img src="images/picture6.png">
            </span>
        </div>
        <div>
            <label for="affiliation">Affiliation</label>
            <select name="affiliation" required>
                <option value="neutral">Neutral</option>
                <option value="chaos">Chaos</option>
                <option value="good">Good</option>
                <option value="evil">Evil</option>
            </select>                        
        </div>
        <div>
            <label for="guild">Guild Name</label>
            <input type="text" name="guild" placeholder="Guild Name" required>
        </div>
        <div>
            <input type="submit" name="submit" value="Register">
        </div>
    </form>
    </div>
    </section>';
    }

    static function showLogout()
    {
        ?>
        <section>                  
            <div>                
                <h2>Thank you for your visit <?=$_POST['avatar_name']?>!</h2>
            </div>
        </section>
        <?php
    }
}
