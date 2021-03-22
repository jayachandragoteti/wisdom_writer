<?PHP
include '../db_connect.php';
session_start();
if(!isset($_SESSION['user']))
{header('location:logout.php');}
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <title>Wisdom Writer</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../assets/images/logo-icon.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/images/logo-icon.png">
	

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,600,700" rel="stylesheet"><script src="https://kit.fontawesome.com/82b716bd33.js" crossorigin="anonymous"></script>
    <!-- Stylesheets -->
    <script src="../assets/plugin-frameworks/jquery-3.2.1.min.js"></script>
    <link href="../assets/plugin-frameworks/bootstrap.css" rel="stylesheet">

    <link href="../assets/fonts/ionicons.css" rel="stylesheet">


    <link href="../assets/common/styles.css" rel="stylesheet">



</head>

<body>
<header>
    <div class="top-header">
			<div class="container">	
				<div class="oflow-hidden font-9 text-sm-center ptb-sm-5">
				
                     <div class="col-sm-4">
						<a class="logo" href="#"><img src="../assets/images/logo-black.png" alt="Logo" style='height:300%;margin-top:-8%;'></a>
					</div><!-- col-sm-4 -->
					<ul class="float-right float-sm-none font-13 list-a-plr-10 list-a-plr-sm-5 list-a-ptb-15 list-a-ptb-sm-5 color-ash">
                        <li><a class="pl-0 pl-sm-10" href="logout.php"><small><i class="fas fa-sign-out-alt"></i> Logout</small></a></li>
					</ul>
					
				</div><!-- top-menu -->
			</div><!-- container -->
		</div><!-- top-header -->

        <div class="bottom-menu">
            <div class="container">

                <a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>

                <ul class="main-menu" id="main-menu">
                    <li><a href="dashboard.php">Home</a></li>
					<li ><a href="journal_requests.php">Journal Requests</a></li>
					<li class='active'><a href="add_journal.php">Add Journal</a></li>
                    
                   <!--<li class="drop-down"><a href="#!">FEATURES<i class="ion-chevron-down"></i></a>
                        <ul class="drop-down-menu drop-down-inner">
                            <li><a href="#">PAGE 1</a></li>
                            <li><a href="#">PAGE 2</a></li>
                        </ul>
                    </li>-->
                </ul>
                <div class="clearfix"></div>
            </div>
            <!-- container -->
        </div>
        <!-- bottom-menu -->
    </header>




    <section class="pt-30 pb-0">
        <div class="container">
            <!-- row -->
        </div>
        <!-- container -->
    </section>

    <section class="pt-0 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8"><br>
                    <div class="ptb-0">
						<a class="mt-10" href="dashboard.php"><i class="mr-5 ion-ios-home"></i><b>HOME</b></a>
						<a class="mt-10" href=""><i class="mlr-10 ion-chevron-right"></i><b>Add Journal</b></a>
						
					</div><br>
                    <form action="add_journal_php.php" method="post" enctype="multipart/form-data">
                        <div class="p-30 mb-30 card-view"  id="applicant_details" > 
                            <h4 class="p-title"><b>Applicant Details </b> <small class="text-danger"> <sub>*All fields are required</sub></small></h4>
                            
                                <div class="row">
                                    <!-- col-sm-6 -->
                                    <div class="col-sm-6">
                                        <input class="mb-30" name="first_name" id="first_name" onkeyup="manage(this)" type="text" placeholder="First Name" required>
                                    </div>
                                    <!-- col-sm-6 -->
                                    <div class="col-sm-6">
                                        <input class="mb-30" name="last_name" id="last_name" type="text" onkeyup="manage(this)" placeholder="Last Name" required>
                                    </div>
                                    <!-- col-sm-6 -->
                                    <div class="col-sm-6">
                                        <input class="mb-30" name="contact_number" id="contact_number"type="text" onkeyup="manage(this)" placeholder="Contact Number" required>
                                    </div>
                                    <!-- col-sm-6 -->
                                    <div class="col-sm-6">
                                        <input class="mb-30" name="email" type="text"id="email"  onkeyup="manage(this)" placeholder="Email" required>
                                    </div>
                                    <!-- col-sm-6 -->
                                    <div class="col-sm-6">
                                        <input class="mb-30" name="designation" type="text"id="designation" onkeyup="manage(this)" placeholder="Designation" required>
                                    </div>
                                    <!-- col-sm-6 -->
                                    <div class="col-sm-6">
                                        <input class="mb-30" name="address" type="text"id="address" onkeyup="manage(this)" placeholder="Address" required>
                                    </div>
                                    <!-- col-sm-12 -->
                                    <div class="col-sm-12">
                                        <textarea class="mb-30" name="about" id="about" onkeyup="manage(this)" placeholder="About Author"  required></textarea>
                                    </div>
                                    <!-- col-sm-12 -->
                                    <div class="col-sm-6">
                                        <label>Picture  <br> <small class="text-danger"> *Picture must be in this formate only ( 'jpg','jpeg','png','jfif' )</small></label>
                                        <input class="mb-30" name="author_picture" id="picture" type="file"   required>
                                    </div>

                                </div>
                                <!-- row -->
                                <input class="plr-20" type="button"   id="next"name="Nect" value="Next" disabled>
                        </div>
                        <div class="p-30 mb-30 card-view"  id="journol_details" style="display:none;"> 
                            <h4 class="p-title"><b>Journol Details</b></h4>
                                <div class="row">
                                    <!-- col-sm-6 -->
                                    <div class="col-sm-6">
                                        <input class="mb-30" name="title" id="" type="text" onkeyup="manage(this)" placeholder="Title" required>
                                    </div>
                                    <!-- col-sm-6 -->
                                    <div class="col-sm-6">
                                        <input class="mb-30" name="sub_title"id="sub_title" type="text" onkeyup="manage(this)"placeholder="Sub Title"  required>
                                    </div>
                                    <!-- col-sm-12 -->
                                    <div class="col-sm-12 text-danger">
                                       <lable>*About Journol </lable>
                                    </div>
                                    
                                    <!-- col-sm-12 -->
                                    <div class="col-sm-12">
                                        <textarea class="mb-30" name="paragraph_1" id="paragraph_1" onkeyup="manage(this)" placeholder="1st paragraph of journal" required></textarea>
                                    </div>
                                    <!-- col-sm-12 -->
                                    <div class="col-sm-12">
                                        <textarea class="mb-30" name="paragraph_2" id="paragraph_2" onkeyup="manage(this)" placeholder="2nd paragraph of journal" required></textarea>
                                    </div>
                                    <!-- col-sm-12 -->
                                    <div class="col-sm-12 text-danger" id="paragraph__3" style="display:none;">
                                        <label>*Optional</label>
                                        <textarea class="mb-30" name="paragraph_3" id="paragraph_3" onkeyup="manage(this)" placeholder="3rd paragraph of journal" ></textarea>
                                    </div>
                                    <!-- col-sm-12 -->
                                    <div class="col-sm-12 text-danger" id="paragraph__4" style="display:none;">
                                        <label >*Optional</label>
                                        <textarea class="mb-30" name="paragraph_4" id="paragraph_4" onkeyup="manage(this)" placeholder="4th paragraph of journal" ></textarea>
                                    </div>
                                    <!-- col-sm-12 -->
                                    <div class="col-sm-12">
                                        <input class="mb-10" id="add_1" type="button"  Value="Add one more paragraph">
                                    </div>
                                    <!-- col-sm-12 -->
                                    <div class="col-sm-12">
                                        <input class="mb-10" id="add_2" type="button"  style="display:none"Value="Add one more paragraph">
                                    </div>
                                    <!-- col-sm-6 -->
                                    <div class="col-sm-6"><br><br>
                                        <input class="mb-30" name="category" id="category" type="text" onkeyup="manage(this)"placeholder="Journal Category"  required>
                                    </div>
                                    <!-- col-sm-6 -->
                                    <div class="col-sm-6">
                                        <label>Journol Picture  <br> <small class="text-danger"> *Picture must be in this formate only ( 'jpg','jpeg','png','jfif' )</small></label>
                                        <input class="mb-30" name="journal_picture" id="" type="file"  required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Journol Abstract <small class="text-danger"> Abstract must be in 'pdf' formate.</small></label>
                                        <input class="mb-30" name="abstract" id="" type="file"  required>
                                    </div>

                                </div>
                                <!-- row -->
                                <input class="plr-20" type="submit" id="submit_show" name="submit" value="SUBMIT NOW" >
                        </div>
                    </form>
                    <!-- card-view -->
                </div>
                <script>
                    //---------------------------
                    function manage() {
                        //---------------------------
                        var bt_1 = document.getElementById('next');
                        var bt_3 = document.getElementById('submit_show');
                        
                        //---------------------------
                        if (first_name.value != '' && last_name.value != '' && contact_number.value != '' && email.value != '' && designation.value != '' && address.value != '' && about.value != '') {
                            bt_1.disabled = false;
                            
                        } else {
                            bt_1.disabled = true;
                            //alert("Need to fill all fields.");
                        }
                        //---------------------------
                        if (title.value == '' ) {
                            bt_3.disabled = false;
                        } else {
                            bt_3.disabled = true;
                           // alert("Need to fill all fields.");
                        }
                        //---------------------------
                        
                    }
                    
                   function myshow(){
                   
                   }
                    $(document).ready(function(){
                        $("#next").click(function(){
                            $("#applicant_details").hide();
                            $("#journol_details").show();
                        });
                        $("#add_1").click(function(){
                            $("#add_1").hide();
                            $("#paragraph__3").show();
                            $("#add_2").show();
                        });
                        $("#add_2").click(function(){
                            $("#add_2").hide();
                            $("#paragraph__4").show();

                        });
                    });
                </script>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
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
                        <li><a href="dashboard.php">Home</a></li>
						<li><a href="journal_requests.php">Journal Requests</a></li>
						<li><a href="add_journal.php">Add Journal</a></li>
					</ul>
				</div><!-- col-sm-2 -->
			
			</div><!-- row -->
			
			<div class="mt-20 brdr-ash-1 opacty-4"></div>
			
			<div class="text-center ptb-30">
				<div class="row">
					<div class="col-sm-3">
						<a class="mtb-10" href="#"><img src="../assets/images/logo-white.png" alt=""style="margin-top:-8%;"></a>
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

<script src="../assets/plugin-frameworks/jquery-3.2.1.min.js"></script>

<script src="../assets/plugin-frameworks/tether.min.js"></script>

<script src="../assets/plugin-frameworks/bootstrap.js"></script>

<script src="../assets/common/scripts.js"></script>

</body>

</html>