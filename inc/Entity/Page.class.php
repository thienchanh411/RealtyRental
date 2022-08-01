<?php

class Page
{

    public static $notifications;

    static function showHeaderLogin()
    { ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>RealtyRental &mdash; A real estate rental platform</title>
            <meta name="description" content="A real estate rental platform">
            <meta name="keywords" content="real estate, room, house, property, rental">

            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
            <link rel="stylesheet" href="css/styles-merged.css">
            <link rel="stylesheet" href="css/style.min.css">
            <link rel="stylesheet" href="css/login.css">

            <!--[if lt IE 9]>
         <script src="js/vendor/html5shiv.min.js"></script>
        <script src="js/vendor/respond.min.js"></script>
        <![endif]-->
        </head>

        <body>
            <!-- START: header -->
            <header role="banner" class="probootstrap-header">
                <div class="container">
                    <a href="index.html" class="probootstrap-logo"><img src="img/logo.png"></a>

                    <a href="#" class="probootstrap-burger-menu visible-xs"><i></i></a>
                    <div class="mobile-menu-overlay"></div>

                    <nav role="navigation" class="probootstrap-nav hidden-xs">
                        <ul class="probootstrap-main-nav">
                            <li><a href="Team02_HomePage.php">Home</a></li>
                            <li><a href="Team02.SearchProperty.php">Search</a></li>
                            <li class="active"><a href="Team02.Login_Register.php">Login</a></li>
                        </ul>
                        <div class="extra-text visible-xs">
                            <a href="#" class="probootstrap-burger-menu"><i></i></a>
                            <h5>About RealtyRental</h5>
                            <p>A real estate rental platform and a team project for Douglas College course
                                CSIS 3280, "Web Based Scripting"</p>
                        </div>
                    </nav>
                </div>
            </header>
            <!-- END: header -->
        <?php }


    static function showFooter()
    { ?>
            <footer class="probootstrap-footer probootstrap-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="probootstrap-footer-widget">
                                <h4 class="heading">About RealtyRental</h4>
                                <p>A real estate rental platform and a team project for Douglas College
                                    course CSIS 3280, "Web Based Scripting"</p>
                                <p><a href="https://www.douglascollege.ca/course/csis-3280">Learn more about the course...</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row copyright">
                        <div class="col-xs-12">
                            <div class="probootstrap-footer-widget">
                                <p>&copy; 2017 <a href="https://uicookies.com/">uiCookies:Haus</a>. Designed by <a href="https://uicookies.com/">uicookies.com</a> <br> Demo Photos from <a href="https://pixabay.com/">Pixabay</a> &amp; <a href="https://unsplash.com/">Unsplash</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

            <script src="js/scripts.min.js"></script>
            <script src="js/main.min.js"></script>

        </body>

        </html>
    <?php }

    //Function to show Login and Register forms
    static function showLogin_Register()
    { ?>
        <!--Login-->
        <section class="main-section">
            <div class="main">
                <input type="checkbox" id="chk" aria-hidden="true">
                <div class="login">
                    <form action="" method="post">
                        <label for="chk" aria-hidden="true">Login</label>
                        <input type="text" name="username" placeholder="Username" required="" class="form-control">
                        <input type="password" name="password" placeholder="Password" required="" class="form-control">
                        <div class="col text-center">
                            <button class="btn btn-primary" name="login" type="submit" value="login">Login</button>
                        </div>
                    </form>
                </div>
                <!--Login-->
                <div class="signup">
                    <form action="" method="post">
                        <label for="chk" aria-hidden="true">Sign up</label>
                        <div class="row">
                            <div class="col-xs-6">
                                <input type="text" name="username" placeholder="Username" required="" class="form-control">
                                <input type="password" name="password" placeholder="Password" required="" class="form-control">
                                <input type="email" name="email" placeholder="Email" required="" class="form-control">
                            </div>
                            <div class="col-xs-6">
                                <input type="text" name="fullname" placeholder="Full name" required="" class="form-control">
                                <input type="text" name="address" placeholder="Address" required="" class="form-control">
                                <input type="tel" name="phone" placeholder="Phone, i.e. 123-456-7890" required="" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <button class="btn btn-primary" name="signup" type="submit" value="signup">Sign up</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    <?php }

    //Function show Header file List Properties
    static function showHeaderListPostingProperties(){ ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>RealtyRental &mdash; A real estate rental platform</title>
            <meta name="description" content="A real estate rental platform">
            <meta name="keywords" content="real estate, room, house, property, rental">

            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
            <link rel="stylesheet" href="css/styles-merged.css">
            <link rel="stylesheet" href="css/style.min.css">

            <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.min.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
        </head>

        <body>

            <!-- START: header -->

            <div class="probootstrap-loader"></div>

            <header role="banner" class="probootstrap-header">
                <div class="container">
                    <a href="index.html" class="probootstrap-logo"><img src="img/logo.png"></a>

                    <a href="#" class="probootstrap-burger-menu visible-xs"><i></i></a>
                    <div class="mobile-menu-overlay"></div>

                    <nav role="navigation" class="probootstrap-nav hidden-xs">
                        <ul class="probootstrap-main-nav">
                            <li><a href="index.html">Home</a></li>
                            <li class="active"><a href="properties.html">Properties</a></li>
                            <li><a href="login.html">Login</a></li>
                        </ul>
                        <div class="extra-text visible-xs">
                            <a href="#" class="probootstrap-burger-menu"><i></i></a>
                            <h5>About RealtyRental</h5>
                            <p>A real estate rental platform and a team project for Douglas College course CSIS 3280,
                                "Web Based Scripting"</p>
                        </div>
                    </nav>
                </div>
            </header>
            <!-- END: header -->
            <section class="probootstrap-slider flexslider2 page-inner">
                <div class="overlay"></div>
                <div class="probootstrap-wrap-banner">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">

                                <div class="page-title probootstrap-animate">
                                    <div class="probootstrap-breadcrumbs">
                                        <a href="/index.html">Home</a><span>Properties</span>
                                    </div>
                                    <h1>Properties</h1>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <ul class="slides">
                    <li style="background-image: url(img/slider_1.jpg);"></li>
                    <li style="background-image: url(img/slider_4.jpg);"></li>
                    <li style="background-image: url(img/slider_2.jpg);"></li>
                </ul>
            </section>
            <!-- END: slider  -->
        <?php }

    //Function show body List Properties
    static function showListPostingProperties($listProperties){ ?>
            <section class="probootstrap-section probootstrap-section-lighter">
                <div class="container">
                    <div class="row">
                        <!-- BEGINNING listing -->
        <?php

        if(!empty($listProperties)){
            foreach($listProperties as $property){
                echo '<div class="col-md-4 col-sm-6">
                <div class="probootstrap-card probootstrap-listing">
                  <div class="probootstrap-card-media">
                    <img src="img/'.$property->getPicture().'" class="img-responsive" alt="Free HTML5 Template by uicookies.com">
                    <a href="#" class="probootstrap-love"><i class="icon-mail2"></i></a>
                  </div>
                  <div class="probootstrap-card-text">
                    <h2 class="probootstrap-card-heading"><a href="#">'.$property->postTitle.'</a></h2>
                    <div class="probootstrap-listing-location">
                      <i class="icon-location2"></i> <span>'.$property->getStreet().$property->getCity().
                      $property->getProvince().'</span>
                    </div>
                    <div class="probootstrap-listing-price"><strong>$ '.$property->monthlyRent.'</strong> / month</div>
                  </div>
                  <div class="probootstrap-card-extra">
                    <ul>
                      <li>
                        Area
                        <span>'.$property->getArea().' m2</span>
                      </li>
                      <li>
                        Beds
                        <span>'.$property->getNumberOfBed().'</span>
                      </li>
                      <li>
                        Baths
                        <span>'.$property->getNumberOfBath().'</span>
                      </li>
                      <li>
                        Garages
                        <span>'.$property->getNumberOfGarage().'</span>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- END listing -->
              </div>';
                
            }
        }
        
        ?>
                    
                </div>
                </div>
            </section>
            <!-- END: section -->
    <?php }

    static function showHeaderProfile(User $user){ ?>
        <!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>RealtyRental &mdash; A real estate rental platform</title>
	<meta name="description" content="A real estate rental platform">
	<meta name="keywords" content="real estate, room, house, property, rental">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
	<link rel="stylesheet" href="css/styles-merged.css">
	<link rel="stylesheet" href="css/style.min.css">
	<link rel="stylesheet" href="css/profile.css">

	<!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.min.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
</head>

<body>
	<!-- START: header -->
	<header role="banner" class="probootstrap-header">
		<div class="container">
			<a href="Team02_HomePage.php" class="probootstrap-logo"><img src="img/logo.png"></a>

			<a href="#" class="probootstrap-burger-menu visible-xs"><i></i></a>
			<div class="mobile-menu-overlay"></div>

			<nav role="navigation" class="probootstrap-nav hidden-xs">
				<ul class="probootstrap-main-nav">
					<li><a href="Team02_HomePage.php">Home</a></li>
					<li><a href="Team02.SearchProperties.php">Search</a></li>
					<li class="dropdown">
						<a id="dropdownMenuLink" class="btn-secondary dropdown-toggle" type="button"
							data-toggle="dropdown" href="#">
							<img class="avatar" src="img/<?=$user->getPhotoUser()?>" alt="avatar">
							<?=$user->getFullName()?>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
							<li class="active"><a href="Team02.UserProfile.php">Profile</a></li>
							<li><a href="Team02.MyProperties.php">My Properties</a></li>
							<li><a href="Team02.AddProperty.php">Add Property</a></li>
							<li><a href="Team02.Login_Register.php">Sign out</a></li>
						</ul>
					</li>

				</ul>
				<div class="extra-text visible-xs">
					<a href="#" class="probootstrap-burger-menu"><i></i></a>
					<h5>About RealtyRental</h5>
					<p>A real estate rental platform and a team project for Douglas College course
						CSIS 3280, "Web Based Scripting"</p>
				</div>
			</nav>
		</div>
	</header>
	<!-- END: header -->
    <?php }

    static function showEditFormProfile(User $user){
        
        if($user->getPhotoUser() != null){
            $photoUser = $user->getPhotoUser();
        }else $photoUser = "pngfind.com-privacy-icon-png-4703547.png";
    ?>
    <section class="probootstrap-section main-section">
		<div class="container">
			<div class="row equal">
				<div class="col-md-3 padding-0">
					<div class="probootstrap-card probootstrap-person">
						<div class="probootstrap-card-media">
							<img src="img/<?=$photoUser?>" class="img-responsive"
								alt="Free HTML5 Template by uicookies.com">
						</div>
						<div class="probootstrap-card-text">
							<h2 class="probootstrap-card-heading mb0"><?=$user->getFullName()?></h2>
							<hr />
							<div>
								<p><?=$user->getEmail()?></p>
								<p><?=$user->getAdress()?></p>
								<p><?=$user->getPhoneNumber()?></p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-9 padding-0">
					<div class="probootstrap-card profile-detail">
						<form class="form-horizontal" method="post">
							<div>
								<h2>Profile Settings</h2>
								<div class="form-group">
									<label class="col-md-3 control-label" for="photo">Photo</label>
									<div class="col-md-9">
										<input type="file" name="photo" id="photo" class="form-control" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="password">New password</label>
									<div class="col-md-9">
										<input type="password" name="password" id="password" required
											class="form-control" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="fullname">Full name</label>
									<div class="col-md-9">
										<input type="text" name="fullname" id="fullname" required class="form-control"
											value="<?=$user->getFullName()?>" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="email">Email</label>
									<div class="col-md-9">
										<input type="email" name="email" id="email" required class="form-control"
											value="<?=$user->getEmail()?>" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="address">Address</label>
									<div class="col-md-9">
										<input type="text" name="address" id="address" required class="form-control"
											value="<?=$user->getAdress()?>" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="phone">Phone</label>
									<div class="col-md-9">
										<input type="tel" name="phone" id="phone" required
											pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="form-control"
											value="<?=$user->getPhoneNumber()?>">
									</div>
								</div>
							</div>
							<div>
								<div class="col-md-offset-3 col-md-9 text-center">
									<button class="btn btn-primary" name="editProfile" type="submit" value="editProfile">
                                        Save Profile</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		</div>
	</section>

    <?php
    
    }

    static function showFooterUserProfile(){ ?>
    <footer class="probootstrap-footer probootstrap-bg">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="probootstrap-footer-widget">
						<h4 class="heading">About RealtyRental</h4>
						<p>A real estate rental platform and a team project for Douglas College
							course CSIS 3280, "Web Based Scripting"</p>
						<p><a href="https://www.douglascollege.ca/course/csis-3280">Learn more about the course...</a>
						</p>
					</div>
				</div>
			</div>
			<div class="row copyright">
				<div class="col-xs-12">
					<div class="probootstrap-footer-widget">
						<p>&copy; 2017 <a href="https://uicookies.com/">uiCookies:Haus</a>. Designed by <a
								href="https://uicookies.com/">uicookies.com</a> <br> Demo Photos from <a
								href="https://pixabay.com/">Pixabay</a> &amp; <a
								href="https://unsplash.com/">Unsplash</a></p>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<script src="js/scripts.min.js"></script>
	<script src="js/main.min.js"></script>

</body>

</html>
    <?php }
}
?>