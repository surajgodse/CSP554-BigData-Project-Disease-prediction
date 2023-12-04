<?php

    session_start();



    if(isset($_SESSION['username']))
     {
		if($_SESSION['user_type'] == "admin")
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

?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>CSP554 || A20547793</title>
    <link rel="icon" href="images/logo.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <meta name="keywords" content="WellnessNavigator Clinic Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
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
                            <a class="nav-link text-white text-capitalize" href="add_test.php">Add Test</a>
                        </li>
                        <li class="nav-item  mr-3 ">
                            <a class="nav-link text-white text-capitalize" href="add_question.php">Add Question to Test</a>
                        </li>
                       
                        <li class="nav-item">
                            <a class="nav-link  text-white text-capitalize" href="add_remedy.php">Add Remedy to test</a>
                        </li>
						
						<li class="nav-item">
                            <a class="nav-link  text-white text-capitalize" href="add_doctor.php">Add Doctor to Test</a>
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
            <li class="breadcrumb-item active" aria-current="page">Services</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- //banner -->
    <!-- about -->
    <div class="agileits-about py-md-5 py-5" id="services">
        <div class="container pt-lg-5">
            <div class="title-section text-center pb-md-5">
                <h4>WellnessNavigator Clinic</h4>
                <h3 class="w3ls-title text-center text-capitalize">hospital that you can trust</h3>
            </div>
            <div class="agileits-about-row row  text-center pt-md-0 pt-5">
			
			
				<div class="heading">Add Test</div>
				<div class="form-col">
					<form action="add_test_back.php" method="post">
					

					
													
								
						<input type="text" class="form-control" placeholder="Name" name="name" id="name" required="">
						<br>
						<textarea placeholder="Test description" name="description" class="form-control"></textarea>
						<br>
						<input type="submit" value="Add" class="btn_apt">
					</form>
				</div>
			</div>
					
                
            </div>
			
			

        </div>
    </div>
    <!-- //about -->
    <!--services-->
    <div class="agileits-services py-lg-5 pb-5" id="explore">
        <div class="container py-lg-5">
            <div class="title-section text-center pb-5 border-bottom">
                <h4>world of medicine</h4>
                <h3 class="w3ls-title text-center text-capitalize">centres of excellence</h3>
            </div>
            <div class="agileits-services-row row pt-5">
                <div class="col-lg-3 col-sm-6 agileits-services-grids py-lg-5 py-sm-4 pb-4">
                    <span class="fas fa-user-md"></span>
                    <h4 class="my-3">Gastroenterology</h4>
                </div>
                <div class="col-lg-3 col-sm-6 agileits-services-grids  py-lg-5 py-4">
                    <span class="fas fa-thermometer"></span>
                    <h4 class="my-3">critical care</h4>
                </div>
                <div class="col-lg-3 col-sm-6 agileits-services-grids  py-lg-5 py-4">
                    <span class="far fa-hospital"></span>
                    <h4 class="my-3">Orthopaedics</h4>
                </div>
                <div class="col-lg-3 col-sm-6 agileits-services-grids   py-lg-5 py-4">
                    <span class="fas fa-heartbeat"></span>
                    <h4 class="my-3">Transplants</h4>
                </div>
            </div>
            <div class="row pb-md-5">
                <div class="col-lg-3 col-sm-6 agile_service_bottom agileits-services-grids  py-lg-5 py-4">
                    <span class="fas fa-pills"></span>
                    <h4 class="my-3">preventive medicine</h4>
                </div>
                <div class="col-lg-3 col-sm-6 agile_service_bottom agileits-services-grids  py-lg-5 py-4">
                    <span class="fas fa-ambulance"></span>
                    <h4 class="my-3">emergency care</h4>
                </div>
                <div class="col-lg-3 col-sm-6 agile_service_bottom agileits-services-grids   py-lg-5 py-4">
                    <span class="fas fa-hospital-symbol"></span>
                    <h4 class="my-3">oncology</h4>
                </div>
                <div class="col-lg-3 col-sm-6 agile_service_bottom agileits-services-grids   py-lg-5 py-sm-4 pt-4">
                    <span class="fab fa-medrt"></span>
                    <h4 class="my-3">cardiology</h4>
                </div>
            </div>
        </div>
    </div>
    <!-- //services-->
    <!-- footer -->
    <footer class="footer py-md-5 pt-md-3 pb-sm-5">
        <div class="footer-position">
            <div class="container">
                <div class="row newsletter-inner">
                    <div class="col-md-4 py-3">
                        <h3 class="w3ls-title text-white">
                            Get notified</h3>
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
                        WellnessNavigator Clinic
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
                                <a href="mailto:example@email.com">contact@WellnessNavigatorClinic.com</a>
                            </p>
                        </div>
                        <div class="fv3-contact my-2">
                            <span class="fas fa-phone-volume mr-2"></span>
                            <p>+312 555 0888</p>
                        </div>
                        <div class="fv3-contact">
                            <span class="fas fa-home mr-2"></span>
                            <p>10 W 35th St,
                                <br>Chicago, IL 60616.</p>
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
        <p>Illinois Institute Of Technology | Suraj Godse | A20547793

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