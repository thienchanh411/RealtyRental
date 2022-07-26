<?php
class PageAddProperty{

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
	<link rel="stylesheet" href="css/add_property.css">

	<!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.min.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
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
					<li><a href="Team02.Properties.php">Properties</a></li>
					<li class="dropdown">
						<a id="dropdownMenuLink" class="btn-secondary dropdown-toggle" type="button"
							data-toggle="dropdown" href="#">
							<img class="avatar" src="img/<?=$user->getPhotoUser()?>" alt="avatar">
							<?=$user->getUserName()?>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
							<li><a href="Team02.UserProfile.php">Profile</a></li>
							<li><a href="Team02.MyProperties.php">My Properties</a></li>
							<li class="active" href="add_property.html"><a href="#">Add Property</a></li>
							<li><a href="login.html">Sign out</a></li>
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

    //function show header page Add Property
    public static function showMainPage(){ ?>
    <section class="probootstrap-section main-section">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2 class="mb50">Add Property</h2>
					<div class="probootstrap-card add-property">
						<form class="form-horizontal">
							<h3>Detailed Information</h3>
							<hr />
							<div>
								<div class="form-group">
									<label class="col-md-2 control-label" for="title">Title</label>
									<div class="col-md-10">
										<input type="text" name="title" id="title" required class="form-control" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label" for="description">Description</label>
									<div class="col-md-10">
										<textarea name="description" id="description" required class="form-control"
											rows="4"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label" for="type">Type</label>
									<div class="col-md-2">
										<select class="form-control" id="type" name="type">
											<option value="Apartment">Apartment</option>
											<option value="House">House</option>
											<option value="Commercial">Commercial</option>
											<option value="Garage">Garage</option>
											<option value="Lot">Lot</option>
										</select>
									</div>
									<label class="col-md-2 control-label" for="area">Area</label>
									<div class="col-md-2">
										<input type="text" name="area" id="area" required class="form-control" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label" for="monthlyrent">Monthly Rent</label>
									<div class="col-md-2">
										<input type="text" name="monthlyrent" id="monthlyrent" required
											class="form-control" />
									</div>
									<label class="col-md-2 control-label" for="rentcontract">Rent Contract</label>
									<div class="col-md-2">
										<input type="text" name="rentcontract" id="rentcontract" class="form-control" />
									</div>

									<label class="col-md-2 control-label" for="availabledate">Available Date</label>
									<div class="col-md-2">
										<input type="date" name="availabledate" id="availabledate" class="form-control" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label" for="bedrooms">Bedrooms</label>
									<div class="col-md-2">
										<select class="form-control" id="bedrooms" name="bedrooms">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
										</select>
									</div>
									<label class="col-md-2 control-label" for="bathrooms">Bathrooms</label>
									<div class="col-md-2">
										<select class="form-control" id="bathrooms" name="bathrooms">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
										</select>
									</div>
									<label class="col-md-2 control-label" for="garages">Garages</label>
									<div class="col-md-2">
										<select class="form-control" id="garages" name="garages">
											<option value="0">0</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
										</select>
									</div>
								</div>
							</div>
							<h3>Media</h3>
							<hr />
							<div>
								<div class="form-group">
									<div class="col-md-2"></div>
									<div class="col-md-4">
										<input type="file" name="photo" id="photo" class="form-control" />
									</div>
								</div>
							</div>
							<h3>Location</h3>
							<hr />
							<div>
								<div class="form-group">
									<label class="col-md-2 control-label" for="street">Street</label>
									<div class="col-md-10">
										<input type="text" name="street" id="street" required class="form-control" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label" for="city">City</label>
									<div class="col-md-4">
										<input type="text" name="city" id="city" required class="form-control" />
									</div>
									<label class="col-md-2 control-label" for="province">Province</label>
									<div class="col-md-4">
										<input type="text" name="province" id="province" required
											class="form-control" />
									</div>
								</div>
							</div>
							<div class="text-center">
								<button class="btn btn-primary">Submit Property</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
    <?php }

    //function show header page Add Property
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