<?php
class PageEditProperty{

    //function show header page Add Property
    public static function showHeader($currentFullName, $currentPhoto){ ?>
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
	<link rel="stylesheet" href="css/property_detail.css">
    
        <!--[if lt IE 9]>
          <script src="js/vendor/html5shiv.min.js"></script>
          <script src="js/vendor/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body>
	<!-- START: header -->
	<header role="banner" class="probootstrap-header">
		<div class="container">
			<a href="homepage.html" class="probootstrap-logo"><img src="img/logo.png"></a>

			<a href="#" class="probootstrap-burger-menu visible-xs"><i></i></a>
			<div class="mobile-menu-overlay"></div>

			<nav role="navigation" class="probootstrap-nav hidden-xs">
				<ul class="probootstrap-main-nav">
					<li><a href="homepage.html">Home</a></li>
					<li><a href="search.html">Search</a></li>
					<li class="dropdown">
						<a id="dropdownMenuLink" class="btn-secondary dropdown-toggle" type="button"
							data-toggle="dropdown" href="#">
							<img class="avatar" src="img/<?=$currentPhoto?>" alt="avatar">
							<?=$currentFullName?>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a href="Team02.UserProfile.php">Profile</a></li>
							<li><a href="Team02.MyProperties.php">My Properties</a></li>
							<li class="active" href="Team02.AddProperty.php?action=add"><a href="#">Add Property</a></li>
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
    
        //function show header page Add Property
        public static function showMainPage(PostingProperty $property,$errorInput){ 
            if(empty($errorInput)){
                self::showBeginEditPropForm($property);
            }else{
                $title = $description = $area = $monthlyrent = $rentcontract = $availabledate = "";
                $photo = $street = $city = $province = "";
                $Apartment= $House =$Commercial=$Garage=$Lot="";
                $bed1 = $bed2 = $bed3 = $bed4 = $bed5 = $bed6 = "";
                $bathroom1 = $bathroom2 = $bathroom3 = $bathroom4 = $bathroom5 = $bathroom6 = "";
                $garage0 = $garage1 = $garage2 = $garage3 = "";
    
    
                if($errorInput[0] = 1){
                    $title = $_POST['title'];
                }
                if($errorInput[1] == 1){ $description = $_POST['description'];}
    
                if($errorInput[2] == 1){
                    if($_POST['type'] == "Apartment") $Apartment = "selected";
                    if($_POST['type'] == "House") $House = "selected";
                    if($_POST['type'] == "Commercial") $Commercial = "selected";
                    if($_POST['type'] == "Garage") $Garage = "selected";
                    if($_POST['type'] == "Lot") $Lot = "selected";
                }
                if($errorInput[3] == 1){ $area = $_POST['area'];}
                if($errorInput[4] == 1){ $monthlyrent = $_POST['monthlyrent'];}
                if($errorInput[5] == 1){ $rentcontract = $_POST['rentcontract'];}
                if($errorInput[6] == 1){ $availabledate = $_POST['availabledate'];}
                if($errorInput[7] == 1){ 
                    if($_POST['bedrooms'] == 1) $bed1 = "selected";
                    if($_POST['bedrooms'] == 2) $bed2 = "selected";
                    if($_POST['bedrooms'] == 3) $bed3 = "selected";
                    if($_POST['bedrooms'] == 4) $bed4 = "selected";
                    if($_POST['bedrooms'] == 5) $bed5 = "selected";
                    if($_POST['bedrooms'] == 6) $bed6 = "selected";}
                if($errorInput[8] == 1){ 
                    if($_POST['bathrooms'] == 1) $bathroom1 = "selected";
                    if($_POST['bathrooms'] == 2) $bathroom2 = "selected";
                    if($_POST['bathrooms'] == 3) $bathroom3 = "selected";
                    if($_POST['bathrooms'] == 4) $bathroom4 = "selected";
                    if($_POST['bathrooms'] == 5) $bathroom5 = "selected";
                    if($_POST['bathrooms'] == 6) $bathroom6 = "selected";}
                if($errorInput[9] == 1){ 
                    if($_POST['garages'] == 0) $garage0 = "selected";
                    if($_POST['garages'] == 1) $garage1 = "selected";
                    if($_POST['garages'] == 2) $garage2 = "selected";
                    if($_POST['garages'] == 3) $garage3 = "selected";
                    
                }
                if($errorInput[10] == 1){ $photo = $_POST['photo'];}
                if($errorInput[11] == 1){ $street = $_POST['street'];}
                if($errorInput[12] == 1){ $city = $_POST['city'];}
                if($errorInput[13] == 1){ $province = $_POST['province'];}
    
                $displayError = '';
                foreach($errorInput as $error){
                    if($error !=1) $displayError .= "<li>" . $error . "</li>";
                }
                //Title
                echo '<section class="probootstrap-section main-section">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="mb50">Add Property</h2>
                            <div class="probootstrap-card add-property">
                                <form class="form-horizontal" method="post">
                                    <h3>Detailed Information</h3>
                                    <hr />
                                    <div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="title">Title</label>
                                            <div class="col-md-10">
                                                <input type="text" name="title" id="title" required class="form-control" 
                                                value="'.$title.'"/>
                                            </div>
                                        </div>';
                //Description
                echo '<div class="form-group">
                <label class="col-md-2 control-label" for="description">Description</label>
                <div class="col-md-10">
                    <textarea name="description" id="description" required class="form-control"
                        rows="4" value="">'.$description.'</textarea>
                </div>
                </div>';
    
                //Type
                echo '<div class="form-group">
                <label class="col-md-2 control-label" for="type">Type</label>
                <div class="col-md-2">
                    <select class="form-control" id="type" name="type">
                        <option value="Apartment" '.$Apartment.'>Apartment</option>
                        <option value="House" '.$House.'>House</option>
                        <option value="Commercial" '.$Commercial.'>Commercial</option>
                        <option value="Garage" '.$Garage.'>Garage</option>
                        <option value="Lot" '.$Lot.'>Lot</option>
                    </select>
                </div>';
    
                
                //area
                echo '<label class="col-md-2 control-label" for="area">Area</label>
                <div class="col-md-2">
                    <input type="text" name="area" id="area" required class="form-control" value="'.$area.'"/>
                </div>
            </div>';
    
                //monthlyrent
                echo '<div class="form-group">
                <label class="col-md-2 control-label" for="monthlyrent">Monthly Rent</label>
                <div class="col-md-2">
                    <input type="text" name="monthlyrent" id="monthlyrent" required value="'.$monthlyrent.'"
                        class="form-control" />
                </div>';
                //rentcontract
                echo '<label class="col-md-2 control-label" for="rentcontract">Rent Contract</label>
                <div class="col-md-2">
                    <input type="text" name="rentcontract" id="rentcontract" class="form-control" value="'.$rentcontract.'"/>
                </div>';
                //availabledate
                echo '<label class="col-md-2 control-label" for="availabledate">Available Date</label>
                <div class="col-md-2">
                    <input type="date" name="availabledate" id="availabledate" class="form-control" value="'.$availabledate.'"/>
                </div>
            </div>';
                //bedrooms
                echo '<div class="form-group">
                <label class="col-md-2 control-label" for="bedrooms">Bedrooms</label>
                <div class="col-md-2">
                    <select class="form-control" id="bedrooms" name="bedrooms">
                        <option value="1" '.$bed1.'>1</option>
                        <option value="2" '.$bed2.'>2</option>
                        <option value="3" '.$bed3.'>3</option>
                        <option value="4" '.$bed4.'>4</option>
                        <option value="5" '.$bed5.'>5</option>
                        <option value="6" '.$bed6.'>6</option>
                    </select>
                </div>';
                //bathrooms
                echo '<label class="col-md-2 control-label" for="bathrooms">Bathrooms</label>
                <div class="col-md-2">
                    <select class="form-control" id="bathrooms" name="bathrooms">
                        <option value="1" '.$bathroom1.'>1</option>
                        <option value="2" '.$bathroom2.'>2</option>
                        <option value="3" '.$bathroom3.'>3</option>
                        <option value="4" '.$bathroom4.'>4</option>
                        <option value="5" '.$bathroom5.'>5</option>
                        <option value="6" '.$bathroom6.'>6</option>
                    </select>
                </div>';
                //garages
                echo '<label class="col-md-2 control-label" for="garages">Garages</label>
                <div class="col-md-2">
                    <select class="form-control" id="garages" name="garages">
                        <option value="0" '.$garage0.'>0</option>
                        <option value="1" '.$garage1.'>1</option>
                        <option value="2" '.$garage2.'>2</option>
                        <option value="3" '.$garage3.'>3</option>
                    </select>
                        </div>
                    </div>
                </div>';
                //photo
                echo '<h3>Media</h3>
                <hr />
                <div>
                    <div class="form-group">
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <input type="file" name="photo" id="photo" class="form-control" value="'.$photo.'"/>
                        </div>
                    </div>
                </div>';
                //street
                echo '<h3>Location</h3>
                <hr />
                <div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="street">Street</label>
                        <div class="col-md-10">
                            <input type="text" name="street" id="street" required class="form-control" value="'.$street.'"/>
                        </div>
                    </div>';
                //city
                echo '<div class="form-group">
                <label class="col-md-2 control-label" for="city">City</label>
                <div class="col-md-4">
                    <input type="text" name="city" id="city" required class="form-control" value="'.$city.'"/>
                </div>';
                //province
                echo '<label class="col-md-2 control-label" for="province">Province</label>
                                        <div class="col-md-4">
                                            <input type="text" name="province" id="province" required
                                                class="form-control" value="'.$province.'"/>
                                        </div>
                                    </div>
                                </div>';
                //remain of form
                echo '<div class="showErrorAddProperty" style="color :red;">
                    <ul>'.$displayError.'</ul>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary" name="editProperty" value="editProperty">Edit Property</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    </section>';
    
    
    
            }
        }
    
        public static function showBeginEditPropForm(PostingProperty $property){

            $Apartment= $House =$Commercial=$Garage=$Lot="";
            $bed1 = $bed2 = $bed3 = $bed4 = $bed5 = $bed6 = "";
            $bathroom1 = $bathroom2 = $bathroom3 = $bathroom4 = $bathroom5 = $bathroom6 = "";
            $garage0 = $garage1 = $garage2 = $garage3 = "";
            if($property->getType()){
                if($property->getType() == "Apartment") $Apartment = "selected";
                if($property->getType() == "House") $House = "selected";
                if($property->getType() == "Commercial") $Commercial = "selected";
                if($property->getType() == "Garage") $Garage = "selected";
                if($property->getType() == "Lot") $Lot = "selected";
            }
            if($property->getNumberOfBed()){ 
                if($property->getNumberOfBed() == 1) $bed1 = "selected";
                if($property->getNumberOfBed() == 2) $bed2 = "selected";
                if($property->getNumberOfBed() == 3) $bed3 = "selected";
                if($property->getNumberOfBed() == 4) $bed4 = "selected";
                if($property->getNumberOfBed() == 5) $bed5 = "selected";
                if($property->getNumberOfBed() == 6) $bed6 = "selected";}
            if($property->getNumberOfBath()){ 
                if($property->getNumberOfBath() == 1) $bathroom1 = "selected";
                if($property->getNumberOfBath() == 2) $bathroom2 = "selected";
                if($property->getNumberOfBath() == 3) $bathroom3 = "selected";
                if($property->getNumberOfBath() == 4) $bathroom4 = "selected";
                if($property->getNumberOfBath() == 5) $bathroom5 = "selected";
                if($property->getNumberOfBath() == 6) $bathroom6 = "selected";}
            if($property->getNumberOfGarage()){ 
                if($property->getNumberOfGarage() == 0) $garage0 = "selected";
                if($property->getNumberOfGarage() == 1) $garage1 = "selected";
                if($property->getNumberOfGarage() == 2) $garage2 = "selected";
                if($property->getNumberOfGarage() == 3) $garage3 = "selected";
                
            }

            echo '<section class="probootstrap-section main-section">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="mb50">Add Property</h2>
                        <div class="probootstrap-card add-property">
                            <form class="form-horizontal" method="post">
                                <h3>Detailed Information</h3>
                                <hr />
                                <div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="title">Title</label>
                                        <div class="col-md-10">
                                            <input type="text" name="title" id="title" required class="form-control" 
                                            value = "'.$property->getPostTitle().'"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="description">Description</label>
                                        <div class="col-md-10">
                                            <textarea name="description" id="description" required class="form-control"
                                                rows="4">'.$property->getDescripition().'</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="type">Type</label>
                                        <div class="col-md-2">
                                        <select class="form-control" id="type" name="type">
                                            <option value="Apartment" '.$Apartment.'>Apartment</option>
                                            <option value="House" '.$House.'>House</option>
                                            <option value="Commercial" '.$Commercial.'>Commercial</option>
                                            <option value="Garage" '.$Garage.'>Garage</option>
                                            <option value="Lot" '.$Lot.'>Lot</option>
                                        </select>
                                        </div>
                                        <label class="col-md-2 control-label" for="area">Area</label>
                                        <div class="col-md-2">
                                            <input type="text" name="area" id="area" required class="form-control" 
                                            value = "'.$property->getArea().'"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="monthlyrent" >Monthly Rent</label>
                                        <div class="col-md-2">
                                            <input type="text" name="monthlyrent" id="monthlyrent" required
                                            value = "'.$property->getMonthlyRent().'" class="form-control" />
                                        </div>
                                        <label class="col-md-2 control-label" for="rentcontract" >Rent Contract</label>
                                        <div class="col-md-2">
                                            <input type="text" name="rentcontract" id="rentcontract" class="form-control" 
                                            value = "'.$property->getLengthContract().'"/>
                                        </div>
    
                                        <label class="col-md-2 control-label" for="availabledate">Available Date</label>
                                        <div class="col-md-2">
                                            <input type="date" name="availabledate" id="availabledate" class="form-control" 
                                            value = "'.$property->getAvailableDate().'"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="bedrooms">Bedrooms</label>
                                        <div class="col-md-2">
                                            <select class="form-control" id="bedrooms" name="bedrooms">
                                                <option value="1" '.$bed1.'>1</option>
                                                <option value="2" '.$bed2.'>2</option>
                                                <option value="3" '.$bed3.'>3</option>
                                                <option value="4" '.$bed4.'>4</option>
                                                <option value="5" '.$bed5.'>5</option>
                                                <option value="6" '.$bed6.'>6</option>
                                            </select>
                                        </div>
                                        <label class="col-md-2 control-label" for="bathrooms">Bathrooms</label>
                                        <div class="col-md-2">
                                            <select class="form-control" id="bathrooms" name="bathrooms">
                                                <option value="1" '.$bathroom1.'>1</option>
                                                <option value="2" '.$bathroom2.'>2</option>
                                                <option value="3" '.$bathroom3.'>3</option>
                                                <option value="4" '.$bathroom4.'>4</option>
                                                <option value="5" '.$bathroom5.'>5</option>
                                                <option value="6" '.$bathroom6.'>6</option>
                                            </select>
                                        </div>
                                        <label class="col-md-2 control-label" for="garages">Garages</label>
                                        <div class="col-md-2">
                                            <select class="form-control" id="garages" name="garages">
                                                <option value="0" '.$garage0.'>0</option>
                                                <option value="1" '.$garage1.'>1</option>
                                                <option value="2" '.$garage2.'>2</option>
                                                <option value="3" '.$garage3.'>3</option>
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
                                            <input type="text" name="street" id="street" required class="form-control" 
                                            value = "'.$property->getStreet().'"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="city">City</label>
                                        <div class="col-md-4">
                                            <input type="text" name="city" id="city" required class="form-control" 
                                            value = "'.$property->getCity().'"/>
                                        </div>
                                        <label class="col-md-2 control-label" for="province">Province</label>
                                        <div class="col-md-4">
                                            <input type="text" name="province" id="province" required
                                            value = "'.$property->getProvince().'" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="showErrorAddProperty">
    
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary" name="editProperty" value="editProperty">Edit Property</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>';
        }
    
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