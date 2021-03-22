<?PHP 
include 'db_connect.php';
$msg="";
$error="";

if (isset($_POST['login'])) {
    $user_name=$_POST['username'];
    $password=$_POST['password'];
    $user="SELECT * FROM `users` WHERE `username` = '$user_name' AND `password` = '$password'";
    
    if ($user_sql=mysqli_query($connect,$user)) {
        if ($user_row=mysqli_fetch_array($user_sql)) {
            session_start();
            $_SESSION['user']=$user_row['username'];
            $msg="successfully logged in.";
            echo "<script>alert('successfully logged in.')</script>";
            echo "<script>window.location='admin/dashboard.php';</script>";

        }else{
            $error="User Name or Password is incorrect.";
        }
    } else {
       $error="User Name or Password is incorrect.";
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Wisdom Writer</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="assets/images/logo-icon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="assets/common/login_style.css" rel="stylesheet">

</head>

<body>
    <!-- partial:index.partial.html -->
    <div id="bg"></div>
    <div class="wrapper fadeInDown">
        <div id="form">
            <div id="formHeader">
                <h2 class="active">
                    <img src="assets/images/logo-icon.png" alt="Logo" style='height:80px;margin-top:0%;'><br>
                    <img src="assets/images/logo-coloured.png" alt="Logo" style='height:40px;margin-top:0%;'>    
                </h2>
                <div class="fadeIn first">
                    <i class="fa fa-user-circle-o"></i>
                </div>
                <div id="formContent">
                    <form  method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>" >
                        <div class="form-group">
                            <input type="test" class="form-control" style="margin-left:7%;width:85%;" name="username" placeholder="User Name" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" style="margin-left:7%;width:85%;" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="login" class="fadeIn fourth" value="Log In">
                        </div>                      
                    </form>
                </div>
                <div id="formFooter">
                                    <?php if($error !=""){?><strong> <div class="text-danger"><i class='far fa-times-circle' style='color:red'></i> <?php echo htmlentities($error); ?>  </strong></div><?php } 
                                        else if($msg !=""){?><strong><div class="text-success"><i class="far fa-check-circle"  style='color:green'></i><?php echo htmlentities($msg); ?></strong> </div><?php }
                                    ?>
                    <!-- <a class="underlineHover" href="#">Forgot Password?</a>-->
                </div>
            </div>
        </div>

        <div class="credits">
            <footer>
                
            </footer>
        </div>
        <!-- partial -->
        <!-- SCIPTS -->

        <script src="assets/plugin-frameworks/jquery-3.2.1.min.js"></script>

        <script src="assets/plugin-frameworks/tether.min.js"></script>

        <script src="assets/plugin-frameworks/bootstrap.js"></script>

        <script src="assets/common/scripts.js"></script>

        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8Nkl4q13z00Fid3Vh8eOp4mqVlgfcXLA&callback=initMap">
        </script>
</body>

</html>