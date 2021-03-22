<?PHP
include 'db_connect.php';
if(isset($_POST[''])){

	$name=$_POST['name'];
	$email=$_POST['email'];
	$msg=$_POST['msg'];

	$to='wisdomwrite@gmail.com';
	$subject = $name;
    $from =$email;
    $message = $msg;
    $headers = "From:" . $from;

	 if (mail($to, $subject,$message,$headers)) {
		echo "<script>alert('Thank you,')</script>";
	}else{
		echo "<script>alert('Faild Try,again!')</script>";
	}
}

?>
<!DOCTYPE HTML>
<html lang="en">

<head>
	<title>Wisdom Writer</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="assets/images/logo-icon.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/images/logo-icon.png">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,600,700" rel="stylesheet">
    <link href="assets/fonts/ionicons.css" rel="stylesheet">
    <!-- Stylesheets -->
    <link href="assets/plugin-frameworks/bootstrap.css" rel="stylesheet">
    <link href="assets/common/styles.css" rel="stylesheet">
</head>

<body>

    <header>
    <div class="top-header">
			<div class="container">	
				<div class="oflow-hidden font-9 text-sm-center ptb-sm-5">
				
                     <div class="col-sm-4">
						<a class="logo" href="#"><img src="assets/images/logo-black.png" alt="Logo" style='height:300%;margin-top:-8%;'></a>
					</div><!-- col-sm-4 -->
					<!--<ul class="float-right float-sm-none font-13 list-a-plr-10 list-a-plr-sm-5 list-a-ptb-15 list-a-ptb-sm-5 color-ash">
						<li><a class="pl-0 pl-sm-10" href="#"><i class="ion-social-facebook"></i></a></li>
						<li><a href="#"><i class="ion-social-twitter"></i></a></li>
						<li><a href="#"><i class="ion-social-pinterest"></i></a></li>
						<li><a href="#"><i class="ion-social-google"></i></a></li>
						<li><a href="#"><i class="ion-social-rss"></i></a></li>
					</ul>-->
					
				</div><!-- top-menu -->
			</div><!-- container -->
		</div><!-- top-header -->

        <div class="bottom-menu">
            <div class="container">

                <a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>

				<ul class="main-menu" id="main-menu">
                    <li class="" id="home"><a href="index.php">Home</a></li>
                    <li class="drop-down"><a href="#!">Guidelines & Policies<i class="ion-chevron-down"></i></a>
                        <ul class="drop-down-menu drop-down-inner">
                        <li><a href="editorial_policies.php">Editorial Policies</a></li>
                            <li><a href="instructions_to_authors.php">Instructions to Authors</a></li>
                        </ul>
                    </li>
                    <li class="drop-down"><a href="#!">Online Submission<i class="ion-chevron-down"></i></a>
                        <ul class="drop-down-menu drop-down-inner">
                            <li><a href="registration.php">Registration</a></li>
                        </ul>
                    </li>
                    <li class="active" id="contact"><a href="contact.php">Contact Us</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <!-- container -->
        </div>
        <!-- bottom-menu -->
    </header>
	<section class="pt-30 pb-0">
		<div class="container">
		<div class="row">

				<div class="col-md-12 col-lg-8">
						<div class="ptb-0">
							<a class="mt-10" href="index.php"><i class="mr-5 ion-ios-home"></i><b>HOME</b></a>
							
							<a class="mt-10 color-ash" href="#"><i class="mlr-10 ion-chevron-right"></i><b>CONTACT</b></a>
						</div>
						<br>
					<div class="p-30 mb-30 card-view">
						<h4 class="p-title"><b>GET IN TOUCH</b></h4>
						<form>
							<div class="row">
								<div class="col-sm-6">
									<input class="mb-30" type="text" placeholder="Your name">
								</div><!-- col-sm-6 -->
								<div class="col-sm-6">
									<input class="mb-30" type="text" placeholder="Your email">
								</div><!-- col-sm-6 -->
								<div class="col-sm-12">
									<textarea class="mb-30" placeholder="Your message"></textarea>
								</div><!-- col-sm-12 -->
								
							</div><!-- row -->
							<a class="btn-fill-primary plr-20" href="#"><b>SUBMIT NOW</b></a>
						</form>
					</div><!-- card-view -->
				</div><!-- col-sm-12 -->
				<div class="col-md-12 col-lg-4"><br><br><br>
					<div class="p-30 mb-30 card-view">
					
						<h4 class="p-title"><b>Contact Details</b></h4>
						<ul class="list-contact list-li-mb-20">
							<!--<li><i class="ion-ios-home"></i>---</li>-->
							<li><a href="#"><i class="ion-ios-telephone"></i>+91 XXXXXXXX</a></li>
							<li><a href="#"><i class="ion-email"></i>wisdomwrite@gmail.com</a></li>
							<li class="mb-0"><a href="#"><i class="ion-ios-world"></i>wisdomwrite.in</a></li>
						</ul>
					</div><!-- card-view -->
				</div><!-- col-sm-12 -->
				
			</div>
		</div><!-- container -->
	</section>



    <footer class="bg-191 pos-relative color-ccc bg-primary pt-50">
		<div class="abs-tblr pt-50 z--1 text-center">
			<div class="h-80 pos-relative"><div class="bg-map abs-tblr opacty-1"></div></div>
		</div>
		
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-md-4 col-sm-4">	
					<h5 class="f-title"><b>QUICK LINKS</b></h5>
					<ul class="mb-30 list-hover list-block list-a-ptb-5">
						<li><a href="index.php">Home</a></li>
                        <li><a href="editorial_policies.php">Editorial Policies</a></li>
						<li><a href="instructions_to_authors.php">Instructions to Authors</a></li>
                        <li><a href="registration.php">Registration</a></li>
						<li><a href="contact.php">Contact Us</a></li>
					</ul>
				</div><!-- col-sm-2 -->
			
			</div><!-- row -->
			
			<div class="mt-20 brdr-ash-1 opacty-4"></div>
			
			<div class="text-center ptb-30">
				<div class="row">
					<div class="col-sm-3">
						<a class="mtb-10" href="#"><img src="assets/images/logo-white.png" alt=""style="margin-top:-8%;"></a>
					</div><!-- col-sm-3 -->
					
					<div class="col-sm-5">
						<p class="mtb-10">Wisdom writers research puiblishers <br>excellence in academics and reach your dream</p>
					</div><!-- col-sm-3 -->
					
				<!--<div class="col-sm-4">
						<ul class="mtb-10 font-12 list-radial-35 list-li-mlr-3">
							<li><a href="#"><i class="ion-social-facebook"></i></a></li>
							<li><a href="#"><i class="ion-social-twitter"></i></a></li>
							<li><a href="#"><i class="ion-social-pinterest"></i></a></li>
							<li><a href="#"><i class="ion-social-google"></i></a></li>
							<li><a href="#"><i class="ion-social-rss"></i></a></li>
						</ul>
                    </div>-->
                    <!-- col-sm-3 -->
				</div><!-- row -->
			</div><!-- text-center -->
		</div><!-- container -->
		
		<div class="bg-dark-primary ptb-15 text-left">
			<div class="container">
				<div class="row">
					
					<div class="col-sm-12 col-md-6">
						<p class="text-md-center font-9 pt-5 mtb-5">Deegine and developed by <b>FWF DEVELOPERS</b></p>
					</div><!-- col-sm-3 -->
					
					<div class="col-sm-12 col-md-6">
						<ul class="mtb-5 font-11 text-md-center text-right list-a-p-5">
						<!--<li><a href="#">Home</a></li>-->
						</ul>
					</div><!-- col-sm-3 -->
				</div><!-- row -->
				
			</div><!-- container -->
		</div><!-- container -->
	</footer>
	
    
    <!-- SCIPTS -->
    <script src="assets/plugin-frameworks/jquery-3.2.1.min.js"></script>
    <script src="assets/plugin-frameworks/tether.min.js"></script>
    <script src="assets/plugin-frameworks/bootstrap.js"></script>
    <script src="assets/common/scripts.js"></script>
    <script src="https://kit.fontawesome.com/82b716bd33.js" crossorigin="anonymous"></script>
    <!--/ SCIPTS -->
</body>

</html>