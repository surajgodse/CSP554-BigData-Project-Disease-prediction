<?php

    session_start();




    if(isset($_SESSION['username']))
     {
		if($_SESSION['user_type'] == "patient")
		{
			$username=$_SESSION['username'];    
			
		} else
         {
             echo "<script>
                alert('please login ');
                window.location.href='index.html';              
                </script>";
                die();
         }

		   
     } 
     else
         {
             echo "<script>
                alert('please login ');
                window.location.href='index.html';              
                </script>";
                die();
         }
		 


require 'vendor/autoload.php'; // Include Composer's autoloader

// Manager Class
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

// Specify the database
$databaseName = 'medical_test';

// Define the collection name
$collectionName = 'patient';

// Define the filter to match the 'p_username'
$filter = ['p_username' => $username];

// Define options for the query
$options = [];

// Execute the query
$query = new MongoDB\Driver\Query($filter, $options);
$cursor = $manager->executeQuery("$databaseName.$collectionName", $query);

foreach ($cursor as $document) {
    $name = $document->p_name;

}

?>



<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>CSP554 || A20547793</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <meta name="keywords" content="Poly Clinic Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Custom Theme files -->
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="all">
    <!-- font-awesome icons -->
    <link href="css/fontawesome-all.min.css" rel="stylesheet">
    <!-- //Custom Theme files -->
    <!-- online-fonts -->
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
</head>


<body>
    <!-- banner -->
    <div class="inner-banner" id="home">
<!-- header -->
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-gradient-secondary pt-3">

                <h1>
                    <a class="navbar-brand text-white" href="index.html">
                    WellnessNavigator Clinic
                    </a>
                </h1>
                <button class="navbar-toggler ml-md-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-lg-auto text-center">

                        <li class="nav-item  mr-3">
                            <a class="nav-link text-white text-capitalize" href="give_feedback.php">Give Feedback</a>
                        </li>
 					
						<li class="nav-item">
                            <a class="nav-link  text-white text-capitalize" href="logout.php">Logout</a>
                        </li>
						
						
						
						
                    </ul>
                </div>

            </nav>
        </header>
        <!-- //header -->
        <!-- //container -->
    </div>
    <!-- breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- //banner -->
    <!-- about -->
    <div class="agileits-about py-md-5 py-5" id="services">
        <div class="container pt-lg-5">
            <div class="title-section text-center pb-md-5">
                <h4>Poly clinic</h4>
                <h3 class="w3ls-title text-center text-capitalize">hospital that you can trust</h3>

			
            <div class="agileits-about-row row  text-centre pt-md-0 pt-5">
			
			
				<div class="heading">Give feedback</div>
				<div class="form-col">
					<form action="add_feedback_back.php" method="post">
				
<?php

require 'vendor/autoload.php'; // Include Composer's autoloader

// Manager Class
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

// Specify the database
$databaseName = 'medical_test';

// Define the collection name
$collectionName = 'test_category';

// Define options for the query
$options = [];

// Execute the query
$query = new MongoDB\Driver\Query([], $options);
$cursor = $manager->executeQuery("$databaseName.$collectionName", $query);

?>
<div class="form-group">
    <select name="test_id" class="form-control">
        <option value="test">Select Test</option>
        <?php
        foreach ($cursor as $document) {
            $test_name = $document->test_name;
            $test_id = $document->test_id;
            ?>
            <option value="<?php echo $test_id; ?>"><?php echo $test_name; ?></option>
        <?php
        }
        ?>
    </select>
</div>

					
					
					<?php

require 'vendor/autoload.php'; // Include Composer's autoloader

// Manager Class
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

// Specify the database
$databaseName = 'medical_test';

// Define the collection name
$collectionName = 'doctors';

// Define options for the query
$options = [];

// Execute the query
$query = new MongoDB\Driver\Query([], $options);
$cursor = $manager->executeQuery("$databaseName.$collectionName", $query);

?>
<div class="form-group">
    <select name="doctor_name" class="form-control">
        <option value="doctor">Select Doctor</option>
        <?php
        foreach ($cursor as $document) {
            $doctor_name = $document->name;
            ?>
            <option value="<?php echo $doctor_name; ?>"><?php echo $doctor_name; ?></option>
        <?php
        }
        ?>
    </select>
</div>

		
						<br>
						<textarea  type="text" class="form-control" placeholder="Add feedback" name="feedback" class="form-control"></textarea>
						<br>
						
						<input type="hidden" id="test_id" name="given_by" value="<?php echo $name; ?>">
					
						<input type="submit" value="Submit" class="btn_apt">
					</form>
				</div>
			</div>
			
        </div>
    </div>
    <!-- //about -->
    <!--services-->
    
    <!-- //services-->
    <!-- footer -->
    <footer class="footer py-md-5 pt-md-3 pb-sm-5">
        <div class="footer-position">
            <div class="container">
                <div class="row newsletter-inner">
                    <div class="col-md-4 py-3">
                        <h3 class="w3ls-title text-white">
                            Get notified</h3>
                        <p class="text-white">sociosqu ad litora torquent per conubia.</p>
                    </div>
                    <div class="col-md-8 newsright">
                        <form action="#" method="post" class="d-flex">
                            <input class="form-control" type="email" placeholder="Enter your email..." name="email" required="">
                            <input class="form-control" type="submit" value="Subscribe">
                        </form>
                    </div>
                    <div class="up-arrow"></div>
                </div>
            </div>
        </div>
        <div class="container-fluid py-lg-5 mt-sm-5">
            <div class="row p-sm-4 px-3 py-5">
                <div class="col-lg-4 col-md-6 footer-top mt-lg-0 mt-md-5">
                    <h2>
                        <a href="index.html" class="text-theme text-uppercase">
                            poly clinic
                        </a>
                    </h2>
                    <p class="mt-2">
                    </p>
                </div>
                <div class="col-lg-2  col-md-6 mt-lg-0 mt-5">
                    <div class=".footerv2-w3ls">
                        <h3 class="mb-3 w3f_title">Navigation</h3>
                        <hr>
                        <ul class="list-agileits">
     
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mt-lg-0 mt-5">
                    <div class="footerv2-w3ls">
                        <h3 class="mb-3 w3f_title">Contact Us</h3>
                        <hr>
                        <div class="fv3-contact">
                            <span class="fas fa-envelope-open mr-2"></span>
                            <p>
                                <a href="mailto:example@email.com">info@example.com</a>
                            </p>
                        </div>
                        <div class="fv3-contact my-2">
                            <span class="fas fa-phone-volume mr-2"></span>
                            <p>+456 123 7890</p>
                        </div>
                        <div class="fv3-contact">
                            <span class="fas fa-home mr-2"></span>
                            <p>+90 nsequursu dsdesdc,
                                <br>xxx Street State 34789.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mt-lg-0 mt-5">
                    <div class="footerv2-w3ls">
                        <h3 class="mb-3 w3f_title">Links</h3>
                        <hr>
                        <ul class="list-agileits">
     
                            </li>
                            <li class="mb-2">
                                <a href="contact.html">
                                    Find us
                                </a>
                            </li>
                            <li>
                                <a href="index.html">
                                    Privacy Policy
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- //footer bottom -->
    </footer>
    <!-- //footer -->
    <!-- copyright -->
    <div class="cpy-right text-center">
        <p>© 2018 Poly Clinic. All rights reserved | Design by

        </p>
    </div>
    <!-- //copyright -->
    <!-- quick contact -->
    <div class="container">
        <div class="outer-col">
            <div class="heading">Quick Enquiry</div>
            <div class="form-col">
                <form action="#" method="post">
                    <input type="text" class="form-control" placeholder="Name" name="Name" id="user-name" required="">
                    <input type="email" class="form-control" placeholder="Email" name="Name" id="Email-id" required="">
                    <input type="text" class="form-control" placeholder="phone number" name="Name" id="phone-number" required="">
                    <textarea placeholder="your message" class="form-control"></textarea>
                    <input type="submit" value="send" class="btn_apt">
                </form>
            </div>
        </div>
    </div>
    <!-- //quick contact -->
    <!-- js -->
    <script src="js/jquery-2.2.3.min.js"></script>
    <!-- //js -->
    <!-- //fixed quick contact -->
    <script>
        $(function () {
            var hidden = true;
            $(".heading").click(function () {
                if (hidden) {
                    $(this).parent('.outer-col').animate({
                        bottom: "0"
                    }, 1200);
                } else {
                    $(this).parent('.outer-col').animate({
                        bottom: "-305px"
                    }, 1200);
                }
                hidden = !hidden;
            });
        });
    </script>
    <!-- //fixed quick contact -->
    <!-- start-smooth-scrolling -->
    <script src="js/easing.js"></script>
    <script>
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();

                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <script src="js/SmoothScroll.min.js"></script>
    <!-- //end-smooth-scrolling -->
    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
</body>

</html>