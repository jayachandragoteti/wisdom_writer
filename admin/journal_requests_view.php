<?PHP
include '../db_connect.php';
session_start();
if(!isset($_SESSION['user']))
{header('location:logout.php');}

if(isset($_GET['id'])){
    $id=$_SESSION['id']=$_GET['id'];
}else {
    $id=$_SESSION['id'];
}

$journal="SELECT * FROM `journal` WHERE `journal_id` ='$id'";
$journal_sql=mysqli_query($connect,$journal);
$journal_row=mysqli_fetch_array($journal_sql);

$author="SELECT * FROM `applicants` WHERE `journal_id` = '$id'"; 
$author_sql=mysqli_query($connect,$author);
$author_row=mysqli_fetch_array($author_sql);

$email=$author_row['email'];

if (isset($_POST['accept'])) {
    $accept="UPDATE  `journal` SET `status`='1' WHERE `journal_id` = '$id'";
        if ($accept_sql=mysqli_query($connect,$accept)) {
            //--------------------- Mail -------------------  
        $to1 = $email;
        $subject1 = 'Response from WISDOM WRITER';
        $from ='jayachandramohan2001.@gmail.com';
        $message = " Hi ".$first_name." ".$last_name.",Your journal id : ".$id." is published.";
        $headers = "From:" . $from;
        if (mail($to1, $subject1,$message,$headers)){
                echo "<script>alert('Request submitted successfully')</script>";
                echo "<script>window.location='journal_requests.php';</script>";
        }else{
                echo "<script>alert(' response mail cannot be sent rejected by server.')</script>";
                echo "<script>window.location='journal_requests.php';</script>";
        }
        //--------------------- /Mail -------------------
        echo "<script>alert('Journal Accepted.')</script>";
        echo "<script>window.location='journal_requests.php';</script>";
    } else {
        echo "<script>alert('Faild try again!')</script>";
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
    <link rel="icon" type="image/png" href="../assets/images/logo-icon.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/images/logo-icon.png">
	

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,600,700" rel="stylesheet">

    <!-- Stylesheets -->

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
					</div>
					<!-- col-sm-4 -->
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
					<li class=""><a href="dashboard.php">HOME</a></li>
					<li class="active"><a href="journal_requests.php">Journal Requests</a></li>
					<li class=""><a href="add_journal.php">Add Journal</a></li>
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
			<div class="row">
			
				<div class="col-md-12 col-lg-12">
					
					<div class="ptb-0">
						<a class="mt-10" href="#"><i class="mr-5 ion-ios-home"></i><b>HOME</b></a>
						<a class="mt-10 color-ash" href="#"><i class="mlr-10 ion-chevron-right"></i><b>Journal Requests</b></a>
                        <a class="mt-10 color-ash" href="#"><i class="mlr-10 ion-chevron-right"></i><b>View : <?PHP echo $journal_row['title'];?></b></a>
					</div>
					
					<div class="p-30 mtb-30 card-view">
                        <div class="p-30 mb-30 card-view">
						    <img src="../journals/journal_images/<?PHP echo $journal_row['image'];?>" alt="" style="height:550px;"><br>
                            
                        </div>
						<h3 class="mt-30 mb-5"><a href="#"><b><?PHP echo $journal_row['title'];?></b></a></h3>
						<ul class="list-li-mr-10 color-lite-black">
							<li><?PHP echo $journal_row['sub_title'];?></li>
						</ul>
						<h3 class="mt-30 mb-5">About Journal</h3>
						<p class="mt-30"><?PHP echo $journal_row['paragraph_1'];?></p>
						<p class="mtb-15"><?PHP echo $journal_row['paragraph_2'];?></p>
						
						<?PHP 
						if ($journal_row['paragraph_3']!="" ) {
							echo "<p class='mtb-15'>".$journal_row['paragraph_3']."</p>";
						}
						?>

						<?PHP 
						if ($journal_row['paragraph_4']!="" ) {
							echo "<p class='mtb-15'>".$journal_row['paragraph_4']."</p>";
						}
						?>		
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm">
                                        <!--  View Abstrat modal Button trigger  -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
                                            <i class="far fa-file-pdf"></i>  View Abstrat
                                        </button>
                                        
                                    </div><div class="col-sm"><br></div>
                                    <div class="col-sm">
                                        <a href='../journals/journal_abstracts/<?PHP echo $journal_row['abstract'];?>' class=" btn btn-primary"download><i class="far fa-file-pdf"></i> Download Abstrat</a>
                                    </div>
                                </div>
                            </div>
					</div><!-- card-view -->
                    <div class="p-30 mb-30 card-view">
						<h4 class="p-title"><b>Author</b></h4>
						<div class="row">
							<div class="col-sm-4 mb-sm-20">
								<img src="../journals/authors_images/<?PHP echo $author_row['picture']?>" alt="">
								<h5 class="mt-20"><a href="#"><b><?PHP echo $author_row['first_name']." ".$author_row['last_name'];?></b></a></h5>
							</div><!-- col-sm-4 -->
							
							<div class="col-sm-4 mb-sm-20">
								<h6 class="mt-20">Designation : <b><?PHP echo $author_row['designation'];?></b></h6>
								<h6 class="mt-20">Contact Number :<b><?PHP echo $author_row['contact_number'];?></b></h6>
								<h6 class="mt-20">Email : <b><?PHP echo $author_row['email'];?></b></h6>
							</div><!-- col-sm-4 -->
							
							<div class="col-sm-4">
								<h6 class="mt-20">About : <b><?PHP echo $author_row['about'];?></b></h6>
								
							</div><!-- col-sm-4 -->
                            
						</div><!-- row -->
                        <br> <br> <br>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
                                        <input type="submit" name="accept" value="Accept" class="btn btn-success">
                                    </form> 
                                </div>
                                <div class="col-sm"><br></div>
                                <div class="col-sm">
                                <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#reject">Reject</button>
                                </div>
                            </div>
                        </div>

					</div><!-- card-view -->
				</div><!-- col-sm-12 -->	
			</div><!-- row -->
		</div><!-- container -->
	</section>
<!--  View Abstrat Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="">
            <div class="">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <iframe id="iframepdf" src="../journals/journal_abstracts/<?PHP echo $journal_row['abstract'];?>" style=" width:500px;height:500px;"></iframe>
             </div>
        </div>
    </div>
</div>	
<!-- / View Abstrat Modal -->

<!-- rejectModal -->
<div class="modal fade" id="reject" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="journal_reject_php.php">
        <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Rejected Reason</label>
                    <input type="text" class="form-control" name="reason" id="exampleInputPassword1" placeholder="reason.." required>
                    <input type="hidden" name="id" value="<?PHP echo $id;?>">
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" name="reject" value="Reject" class="btn btn-danger">
        </div>
        </div>
    </form>
  </div>
</div>
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

    <script src="https://kit.fontawesome.com/82b716bd33.js" crossorigin="anonymous"></script>
</body>

</html>