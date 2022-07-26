<?php
class PageMyProperties{

    //function show header page Add Property
    public static function showHeader(User $user){ ?>
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
	<link rel="stylesheet" href="css/my_properties.css">

	
</head>

<body>
	<!-- START: header -->
	<header role="banner" class="probootstrap-header">
		<div class="container">
			<a href="home.html" class="probootstrap-logo"><img src="img/logo.png"></a>

			<a href="#" class="probootstrap-burger-menu visible-xs"><i></i></a>
			<div class="mobile-menu-overlay"></div>

			<nav role="navigation" class="probootstrap-nav hidden-xs">
				<ul class="probootstrap-main-nav">
					<li><a href="home.html">Home</a></li>
					<li><a href="properties.html">Properties</a></li>
					<li class="dropdown">
						<a id="dropdownMenuLink" class="btn-secondary dropdown-toggle" type="button"
							data-toggle="dropdown" href="#">
							<img class="avatar" src="img/<?=$user->getPhotoUser()?>" alt="avatar">
							<?=$user->getFullName()?>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
							<li><a href="Team02.UserProfile.php">Profile</a></li>
							<li class="active"><a href="Team02.MyProperties.php">My Properties</a></li>
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

    //function show header page My Properties
    public static function showMainPage($listPostingProperties){ 
		
		?> 
		<section class="probootstrap-section main-section">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<h2 class="mb50">My Properties<span class="pull-right"><a class="btn btn-primary"
									href="Team02.AddProperty.php">Add Property</a></span></h2>
		<?php
		
		//Check if list Posting porperties is not null
		if(isset($listPostingProperties)){
			//if yes => get every single property and set into the form
			foreach($listPostingProperties as $property){
				echo '<div class="probootstrap-card probootstrap-listing container">
				<div class="row equal">
					<div class="probootstrap-card-media col-md-3">
						<img src="img/'.$property->getPicture().'" class="img-responsive" alt="3 Bed Room Property for Sale">
					</div>
					<div class="probootstrap-card-text-main col-md-4">
						<h2 class="probootstrap-card-heading"><a href="#">'.$property->getPostTitle().'</a></h2>
						<div class="probootstrap-listing-location">
							<i class="icon-location2"></i> <span>'.$property->getStreet().','.$property->getCity()
							.', ' .$property->getProvince().'</span>
						</div>
						<div class="probootstrap-listing-description">
							<p>New Westminster High School(just behind the house)</p>
							<p>Douglas College: Walking Distance</p>
							<p>SFU: 10 minutes driving</p>
							<p>New Westminster Town Center: 1 block away, with tons of restaurants, stores, Tim
								Hortons, McDonalds, Starbucks</p>
							<p>SaveOnFood, Walmart: 10 minutes walking</p>
							<p>Metrotown: 10 minutes driving</p>
							<p>Downtown: 25 Minutes driving</p>
							<p>UBC: 30 minutes driving</p>
							<p>Bus Stops: #123, #106, #128, #101,</p>
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
					<div class="probootstrap-card-text col-md-3">
						<div class="probootstrap-listing-price"><strong>$ '.$property->getMonthlyRent().'</strong> / month</div>
						<div class="probootstrap-listing-posted"><i class="icon-calendar"></i> '.$property->getPostDate().'
							(Posted)
						</div>
						<div class="probootstrap-listing-available"><i class="icon-calendar"></i> '.$property->getAvailableDate().'
							(Available)</div>
						<div class="probootstrap-listing-contract"><i class="icon-profile"></i> '.$property->getLengthContract().' months</div>
					</div>
					<div class="probootstrap-card-action col-md-2">';
						echo '<a href="Team02.EditProperty.php?action=edit&postID='.$property->getPostID().'"><i class="icon-pencil"></i> Edit</a>';
						echo '<a href="'.$_SERVER["PHP_SELF"].'?action=delete&postID='.$property->getPostID().'"><i class="icon-bin"></i> Delete</a>';
						echo '<a href="#" onclick="(function(e){';
							echo "$(e.target).closest('.probootstrap-card').find('.manage-bookings').slideToggle();
							return false";
						echo '})(arguments[0]);return false;">
							<div class="manage-bookings-link">
								<i class="icon-bubbles3"></i>
								<div>
									<div>Manage</div>
									<div>Bookings</div>
								</div>
							</div>
						</a>
					</div>
				</div>
				<div class="row manage-bookings">
					<div class="col-md-offset-3 col-md-9">
						<ul class="timeline">
							<li class="timeline-item">
								<p class="time">On 20-Jul-2022, 09:30 AM</p>
								<div class="content">
									<span>User <a href="profile.html?action=view&id=2">Nhat Tan Vu</a> booked this property.</span>
									<a href="bookings.html?action=approve&id=2">Approve</a>
									<a class="text-danger" href="bookings.html?action=reject&id=2">Reject</a>
								</div>
							</li>
							<li class="timeline-item">
								<p class="time">On 22-Jul-2022, 11:15 PM</p>
								<div class="content">
									<span>User <a href="profile.html?action=view&id=1">Chanh Vo</a> booked this property.</span>
									<a href="bookings.html?action=approve&id=1">Approve</a>
									<a class="text-danger" href="bookings.html?action=reject&id=1">Reject</a>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>';
			}
		}
		
		// End list Properties -->
		echo '</div>
			</div>
		</div>
	</section>';

		?>

    <?php }

    //function show footer page My Properties
    public static function showFooter(){ ?>
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