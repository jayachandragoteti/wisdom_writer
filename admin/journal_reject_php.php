<?PHP 
include '../db_connect.php';
session_start();
if(!isset($_SESSION['user']))
{header('location:logout.php');}
if (isset($_POST['reject'])) {  
$reason=$_POST['reason'];
$id=$_POST['id'];

$journal="SELECT * FROM `journal` WHERE `journal_id` ='$id'";
$journal_sql=mysqli_query($connect,$journal);
$journal_row=mysqli_fetch_array($journal_sql);

$author="SELECT * FROM `applicants` WHERE `journal_id` = '$id'"; 
$author_sql=mysqli_query($connect,$author);
$author_row=mysqli_fetch_array($author_sql);
$email=$author_row['email'];
$author_pic='../journals/authors_images/'.$author_row['picture'];
$journal_pic='../journals/journal_images/'.$journal_row['image'];
$absract='../journals/journal_abstracts/'.$journal_row['abstract'];


unlink("$author_pic");
unlink("$journal_pic"); 
unlink("$absract");
$journal_delete="DELETE FROM `journal` WHERE `journal_id` ='$id'";

$author_delete="DELETE FROM `applicants` WHERE  `journal_id` = '$id'"; 

if ($journal_delete_sql=mysqli_query($connect,$journal_delete) && $author_delete_sql=mysqli_query($connect,$author_delete)) {
    //--------------------- Mail -------------------  
    $to1 = $email;
    $subject1 = 'Response from WISDOM WRITER';
    $from ='jayachandramohan2001.@gmail.com';
    $message = " Hi ".$first_name." ".$last_name.",Your journal id : ".$id." is rejected due to this reason".$reason.".";
    $headers = "From:" . $from;
    if (mail($to1, $subject1,$message,$headers)){
            echo "<script>alert('Request submitted successfully')</script>";
            echo "<script>window.location='journal_requests.php';</script>";
    }else{
            echo "<script>alert(' response mail cannot be sent rejected by server.')</script>";
            echo "<script>window.location='journal_requests.php';</script>";
    }
    //--------------------- /Mail -------------------
    echo "<script>alert('Journal Rejected.')</script>";
    echo "<script>window.location='journal_requests.php';</script>";
}

}
