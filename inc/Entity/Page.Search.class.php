<?php
class PageSearchProperty
{
    //function show header
    public static function showHeader($currentFullName, $currentPhoto, $loggedIn)
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
            <link rel="stylesheet" href="css/search.css">

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
                    <a href="Team02_HomePage.php" class="probootstrap-logo"><img src="img/logo.png"></a>

                    <a href="#" class="probootstrap-burger-menu visible-xs"><i></i></a>
                    <div class="mobile-menu-overlay"></div>

                    <nav role="navigation" class="probootstrap-nav hidden-xs">

                        <?php
                        if ($loggedIn == false) {
                            echo '<ul class="probootstrap-main-nav">
                <li class="active"><a href="Team02.HomePage.php">Home</a></li>
                <li><a href="Team02.Login_Register.php">Search</a></li>
                <li><a href="Team02.Login_Register.php">Login</a></li>
                </ul>';
                        } else {
                            echo '<ul class="probootstrap-main-nav">
                <li><a href="Team02_HomePage.php">Home</a></li>
                <li><a href="Team02.SearchProperties.php">Search</a></li>
                <li class="dropdown">
                    <a id="dropdownMenuLink" class="btn-secondary dropdown-toggle" type="button"
                        data-toggle="dropdown" href="#">
                        <img class="avatar" src="img/' . $currentPhoto . '" alt="avatar">
                        ' . $currentFullName . '
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a href="Team02.UserProfile.php">Profile</a></li>
                        <li><a href="Team02.MyProperties.php">My Properties</a></li>
                        <li class="active" href="Team02.AddProperty.php?action=add"><a href="#">Add Property</a></li>
                        <li ><a href="?action=signout">Sign out</a></li>
                    </ul>
                </li>

            </ul>';
                        }
                        ?>

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

    //function show header
    public static function showBodyPage($listAvailableProperties, $currentID)
    {
        ?>
            <section class="probootstrap-slider flexslider2 page-inner">
                <div class="probootstrap-wrap-banner">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">

                                <div class="probootstrap-home-search">
                                    <form action="" method="post">
                                        <h2 class="heading">Search your next dream home here</h2>
                                        <div class="probootstrap-field-group">
                                            <div class="probootstrap-fields">

                                                <div class="search-field">
                                                    <i class="icon-location2"></i>
                                                    <input type="text" class="form-control" name="searchKeyword" placeholder="Enter address, ZIP code, Neighborhoods">
                                                </div>
                                            </div>
                                            <button class="btn btn-success" type="submit" name="search" value="search"><i class="icon-magnifying-glass t2"></i>
                                                Start
                                                Search
                                            </button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <ul class="slides">
                    <li class="overlay" style="background-image: url(img/slider_1.jpg);"></li>
                    <li class="overlay" style="background-image: url(img/slider_4.jpg);"></li>
                    <li class="overlay" style="background-image: url(img/slider_2.jpg);"></li>
                </ul>
            </section>
            <!-- END: slider  -->


            <!-- The modal -->
            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="modalLabel">Book Property</h4>
                        </div>
                        <div class="modal-body" id="modalBody">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <section class="probootstrap-section probootstrap-section-lighter">
                <div class="container">
                    <div class="row">

                        <?php
                        if (isset($listAvailableProperties)) {
                            foreach ($listAvailableProperties as $property) {
                                echo '<div class="col-md-4 col-sm-6">
                    <div class="probootstrap-card probootstrap-listing">
                        <div class="probootstrap-card-media">
                            <img src="img/' . $property->getPicture() . '" class="img-responsive" alt="Free HTML5 Template by uicookies.com">
                            
                            <a href="#" class="probootstrap-love" onClick="(function(e){
                                $.getJSON(href=\'' . $_SERVER["PHP_SELF"] . '?action=booking&postID=' . $property->getPostID() . '&ternantID=' . $currentID . '\', function(data) {
                                    $(\'#modalBody\').html(\'<p>Congratulations! You have booked property \\\'\' + data.postTitle + \'\\\'.</p>\' +
                                    \'<div>Here\\\'s the owner contact info:</div>\'+
                                    \'<ul>\'+
                                        \'<li>Full name: \' + data.fullName + \'</li>\' +
                                        \'<li>Email: \' + data.email + \'</li>\' +
                                        \'<li>Address: \' + data.address + \'</li>\' +
                                        \'<li>Phone: \' + data.phoneNumber + \'</li>\' +
                                    \'</ul>\');
                                    $(\'#modal\').modal(\'show\');
                                  });
                                return false;
                            })(arguments[0]);return false;">
                                <i class="icon-heart"></i>
                            </a>
                            
                        </div>
                        <div class="probootstrap-card-text">
                            <h2 class="probootstrap-card-heading"><a href="#">' . $property->getPostTitle() . '</a></h2>
                            <div class="probootstrap-listing-location">
                                <i class="icon-location2"></i> 
                                <span>' . $property->getStreet() . ', ' . $property->getCity() . ', ' . $property->getProvince() . '</span>
                            </div>
                            <div class="probootstrap-listing-price"><strong>$ ' . $property->getMonthlyRent() . '</strong> / month</div>
                        </div>
                        <div class="probootstrap-card-extra">
                            <ul>
                                <li>
                                    Area
                                    <span>' . $property->getArea() . ' m2</span>
                                </li>
                                <li>
                                    Beds
                                    <span>' . $property->getNumberOfBed() . '</span>
                                </li>
                                <li>
                                    Baths
                                    <span>' . $property->getNumberOfBath() . '</span>
                                </li>
                                <li>
                                    Garages
                                    <span>' . $property->getNumberOfGarage() . '</span>
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

    //function show header
    public static function showFooter()
    { ?>
            <footer class="probootstrap-footer probootstrap-bg" style="background-image: url(img/slider_3.jpg)">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="probootstrap-footer-widget">
                                <h4 class="heading">About RealtyRental</h4>
                                <p>A real estate rental platform and a team project for Douglas College course CSIS 3280,
                                    "Web Based Scripting"</p>
                                <p><a href="https://www.douglascollege.ca/course/csis-3280">Learn more about the course...</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="row copyright">
                        <div class="col-xs-12">
                            <div class="probootstrap-footer-widget">
                                <p>&copy; 2017 <a href="https://uicookies.com/">uiCookies:Haus</a>. Designed by <a href="https://uicookies.com/">uicookies.com</a> <br> Demo Photos from <a href="https://pixabay.com/">Pixabay</a> &amp; <a href="https://unsplash.com/">Unsplash</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

            <div class="gototop js-top">
                <a href="#" class="js-gotop"><i class="icon-chevron-thin-up"></i></a>
            </div>

            <script src="js/scripts.min.js"></script>
            <script src="js/main.min.js"></script>

        </body>

        </html>
<?php }
}
?>