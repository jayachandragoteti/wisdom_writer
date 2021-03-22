<?PHP
include 'db_connect.php';

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
                    <li class="active" id="home"><a href="index.php">Home</a></li>
                    <li class="drop-down"><a href="#!">Guidelines & Policies<i class="fas fa-chevron-down"></i></a>
                        <ul class="drop-down-menu drop-down-inner">
                        <li><a href="editorial_policies.php">Editorial Policies</a></li>
                            <li><a href="instructions_to_authors.php">Instructions to Authors</a></li>
                        </ul>
                    </li>
                    <li class="drop-down"><a href="#!">Online Submission<i class="fas fa-chevron-down"></i></a>
                        <ul class="drop-down-menu drop-down-inner">
                            <li><a href="registration.php">Registration</a></li>
                        </ul>
                    </li>
                    <li class="" id="contact"><a href="contact.php">Contact Us</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <!-- container -->
        </div>
        <!-- bottom-menu -->
    </header>
    <section class="bg-primary color-white pb-20">
		<div class="container">
			<h4 class="p-title in center"><b>Wisdom writers research puiblishers<br> excellence in academics and reach your dream</b></h4>
		</div><!-- container -->
	</section>


    <section class="">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-lg-8">

                    <!-- bg-white -->
                    <?PHP
                        $query="SELECT * FROM `journal` WHERE `status` = '1' ORDER BY `sno` DESC";
                        $sql=mysqli_query($connect,$query);
                        
                        while ($row=mysqli_fetch_array($sql)) {
                            $id=$row['journal_id'];
                            $applicant="SELECT * FROM `applicants` WHERE `journal_id`='$id'";
                            $applicant_sql=mysqli_query($connect,$applicant);
                            $applicant_row=mysqli_fetch_array($applicant_sql);
                            ?>
                            

            
                                <div class='mb-30 sided-250x card-view'>
                                <div class='s-left'>
                                <a href='single_journal.php?id=<?PHP echo $row['journal_id']?>'> <img src='journals/journal_images/<?PHP echo $row['image']?>'></a>
                                </div>
                            
                                <div class='s-right ptb-50 p-sm-20 pb-sm-5 plr-30 plr-xs-0'>
                                    <h4><a href='single_journal.php?id=<?PHP echo $row['journal_id']?>'><?PHP echo $row['title']?></a></h4>
                                    <ul class='mtb-10 list-li-mr-20 color-lite-black'>
                                     <li><a href='single_journal.php?id=<?PHP echo $row['journal_id']?>'><i class="fab fa-medapps">&nbsp</i> <?PHP echo $row['sub_title']?></a></li>
                                     <li><a href='single_journal.php?id=<?PHP echo $row['journal_id']?>'><i class="fa fa-user">&nbsp</i>   <?PHP echo $applicant_row['first_name']." ".$applicant_row['last_name'];?></a></li>
                                    </ul>
                                </div>
                                
                            </div>
 
                           

                        <?PHP }?>
                    <!-- sided-250x -->

                </div>
                <!-- col-sm-8 -->

                <div class="col-md-12 col-lg-4">

                    <div class="mb-30 p-30 card-view">
                        <h4 class="p-title"><b>OLD CONNECT</b></h4>
                        <?PHP
                        $query_1="SELECT * FROM `journal` WHERE `status` = '1'ORDER BY `sno` ASC";
                        $sql_1=mysqli_query($connect,$query_1);
                        
                        while ($row_1=mysqli_fetch_array($sql_1)) {?>
                        <div class="sided-80x mb-20">
                            <div class="s-left">
                                <img src='journals/journal_images/<?PHP echo $row_1['image']?>'>
                            </div>
                            <!-- s-left -->

                            <div class="s-right">
                                <h5>
                                    <a href="#" data-toggle='modal' data-target='#<?PHP echo $row_1['sno']?>'>
                                        <b><?PHP echo $row_1['title']?></b>
                                    </a>
                                </h5>
                                <ul class="mtb-5 list-li-mr-20 color-lite-black">
                                    <li><i class="fab fa-medapps"></i> <?PHP echo $row_1['sub_title']?></li>
                                </ul>
                            </div>
                            <!-- s-left -->
                        </div>
                         <!-- Modal -->
                         <div class="modal fade" id="<?PHP echo $row_1['sno']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle"><b><?PHP echo $row_1['title']?></b></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>   
                                                </button>
                                            </div>
                                            <div class="modal-body" style=''>
                                                    <div class="s-left">
                                                        <img src='journals/journal_images/<?PHP echo $row_1['image']?>'>
                                                        <b><?PHP echo $row_1['sub_title']?><br></b>   
                                                    </div>
                                               
                                                 <?PHP echo $row_1['paragraph_1']?>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <a href='single_journal.php?id=<?PHP echo $row_1['journal_id']?>'><button type="button" class="btn btn-primary">View</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!--/ Modal -->
                    <?PHP }?>    
                        <!-- sided-80x -->
                    </div>
                    <!-- card-view -->
                </div>
                <!-- col-sm-4 -->
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
						<li><a href="index.php">Home</a></li>
                        <li><a href="editorial_policies.php">Editorial Policies</a></li>
						<li><a href="instructions_to_authors.php">Instructions to Authors</a></li>
                        <li><a href="registration.php">Registration</a></li>
						<li><a href="contact.php"> Contact Us</a></li>
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