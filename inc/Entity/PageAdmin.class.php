<?php

class PageAdmin
{
    public static function showHeader($currentUserName, $currentPhoto)
    { ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>RealtyRental Admin Dashboard</title>
            <meta name="description" content="A real estate rental platform">
            <meta name="keywords" content="real estate, room, house, property, rental">

            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
            <link rel="stylesheet" href="css/styles-merged.css">
            <link rel="stylesheet" href="css/style.min.css">
            <link rel="stylesheet" href="css/dashboard.css">


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
                                <a id="dropdownMenuLink" class="btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" href="#">
                                    <img class="avatar" src="img/<?= $currentPhoto ?>" alt="avatar">
                                    <?= $currentUserName ?>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a href="Team02.UserProfile.php">Profile</a></li>
                                    <li class="active"><a href="Team02.Admin.php">Admin</a></li>
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

    private static function findUserById($users, $userID)
    {
        foreach ($users as $user) {
            if ($user->getUserID() == $userID) {
                return $user;
            }
        }

        return null;
    }

    public static function showMainPage($totalProperties, $totalBookings, $totalUsers, $listProperties, $listUsers)
    { ?>
            <section class="main-section probootstrap-section">
                <div class="container">
                    <div class="row mb20 mt20 statistic">
                        <div class="col-md-4">
                            <div class="card total-properties">
                                <h2 class="mb20">
                                    Total Properties
                                </h2>
                                <div class="content">
                                    <i class="icon-home3"></i>
                                    <div><?= $totalProperties ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card total-bookings">
                                <h2 class="mb20">
                                    Total Bookings
                                </h2>
                                <div class="content">
                                    <i class="icon-heart"></i>
                                    <div><?= $totalBookings ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card total-users">
                                <h2 class="mb20">
                                    Total Users
                                </h2>
                                <div class="content">
                                    <i class="icon-user-plus"></i>
                                    <div><?= $totalUsers ?></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb20">
                        <div class="col-xs-12">
                            <div class="card">
                                <h2 class="mb20">
                                    Property Overview
                                </h2>
                                <table class="table table-striped table-responsive">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th class="visible-md visible-lg">Customer Name</th>
                                            <th>Property Title</th>
                                            <th class="visible-md visible-lg">Monthly Rent</th>
                                            <th class="visible-md visible-lg">Posted Date</th>
                                            <th class="visible-md visible-lg">Available Date</th>
                                            <th>Status</th>
                                            <th class="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($i = 0; $i < count($listProperties); $i++) { ?>
                                            <tr>
                                                <th scope="row"><?= $i + 1 ?></th>
                                                <td class="visible-md visible-lg"><?= self::findUserById($listUsers, $listProperties[$i]->getOwnerID())->getFullName() ?></td>
                                                <td><?= $listProperties[$i]->getPostTitle() ?></td>
                                                <td class="visible-md visible-lg"><?= $listProperties[$i]->getMonthlyRent() ?></td>
                                                <td class="visible-md visible-lg"><?= $listProperties[$i]->getPostDate() ?></td>
                                                <td class="visible-md visible-lg"><?= $listProperties[$i]->getAvailableDate() ?></td>
                                                <td><?= $listProperties[$i]->getStatus() ?></td>
                                                <td class="action">
                                                    <?php if (strToLower($listProperties[$i]->getStatus()) != "deleted" && strToLower($listProperties[$i]->getStatus()) != "booked") { ?>
                                                        <a class="btn btn-primary" href="<?= $_SERVER['PHP_SELF'] ?>?action=deleteProperty&postID=<?= $listProperties[$i]->getPostID() ?>"><i class="icon-bin"></i></a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <h2 class="mb20">
                                    User Overview
                                </h2>
                                <table class="table table-striped table-responsive">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Full name</th>
                                            <th class="visible-md visible-lg">Email</th>
                                            <th class="visible-md visible-lg">Address</th>
                                            <th class="visible-md visible-lg">Phone</th>
                                            <th>Status</th>
                                            <th class="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($i = 0; $i < count($listUsers); $i++) { ?>
                                            <tr>
                                                <th scope="row"><?= $i + 1 ?></th>
                                                <td><?= $listUsers[$i]->getFullName() ?></td>
                                                <td class="visible-md visible-lg"><?= $listUsers[$i]->getEmail() ?></td>
                                                <td class="visible-md visible-lg"><?= $listUsers[$i]->getAdress() ?></td>
                                                <td class="visible-md visible-lg"><?= $listUsers[$i]->getPhoneNumber() ?></td>
                                                <td><?= $listUsers[$i]->getStatus() ?></td>
                                                <td class="action">
                                                    <?php if (strToLower($listUsers[$i]->getStatus()) != "inactive") { ?>
                                                        <a class="btn btn-primary" href="<?= $_SERVER['PHP_SELF'] ?>?action=deleteUser&userID=<?= $listUsers[$i]->getUserID() ?>"><i class="icon-bin"></i></a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </section>
        <?php }

    public static function showFooter()
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
}

?>