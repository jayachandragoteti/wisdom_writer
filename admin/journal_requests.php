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
				    <li><a href="dashboard.php">Home</a></li>
					<li class='active'><a href="journal_requests.php">Journal Requests</a></li>
					<li><a href="add_journal.php">Add Journal</a></li>
                    
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
					</div>
					
					<div class="p-30 mtb-30 card-view">
                        <div class="table-responsive-sm">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Sno</th>
										<th scope="col">Journal Id</th>
                                        <th scope="col">Journal Title</th>
                                        <th scope="col">Journal Sub title</th>
                                        <th scope="col">Journal Category</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?PHP
                                    $journal="SELECT * FROM `journal` WHERE `status` ='0'  ORDER BY `journal`.`sno` ASC";
                                    $journal_sql=mysqli_query($connect,$journal);
                                    $i=1;
                                    while ($journal_row=mysqli_fetch_array($journal_sql)) {
                                        $journal_id =$journal_row['journal_id'];
                                        $author="SELECT * FROM `applicants` WHERE `journal_id` = '$journal_id'"; 
                                        $author_sql=mysqli_query($connect,$author);
                                        $author_row=mysqli_fetch_array($author_sql);
                                    ?>
                                <tr>
                                    <th scope="row"><?PHP echo $i;?></th>
									<td><?PHP echo $journal_row['journal_id'];?></td>
                                    <td><?PHP echo $journal_row['title'];?></td>
                                    <td><?PHP echo $journal_row['sub_title'];?></td>
                                    <td><?PHP echo $journal_row['category'];?></td>
                                    <td><?PHP echo $author_row['first_name'];?></td>
                                    <td><a href='journal_requests_view.php?id=<?PHP echo $journal_row['journal_id']?>'><i class="mlr-10 ion-eye btn btn-primary"></i></a></td>
								</tr>
							   <?PHP $i++; }?>
                                    
                                <tbody>
                            </table>
                        </div>	
					</div><!-- card-view -->
				</div><!-- col-sm-12 -->
				
			</div><!-- row -->
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
	<script src="https://kit.fontawesome.com/82b716bd33.js" crossorigin="anonymous"></script>
    <script src="../assets/common/scripts.js"></script>

</body>

</html>