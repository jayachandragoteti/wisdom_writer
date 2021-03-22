<?PHP 

include '../db_connect.php';
session_start();
if (isset($_POST['submit'])) {
    $status=1;
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $contact_number=$_POST['contact_number'];
    $email=$_POST['email'];
    $designation=$_POST['designation'];
    $address=$_POST['address'];
    $about=$_POST['about'];
    
    $title=$_POST['title'];
    $sub_title=$_POST['sub_title'];
    $paragraph_1=$_POST['paragraph_1'];
    $paragraph_2=$_POST['paragraph_2'];
    if($_POST['paragraph_3'] !=""){
        $paragraph_3=$_POST['paragraph_3'];
    }else{
        $paragraph_3=""; 
    }
    if($_POST['paragraph_4'] !=""){
        $paragraph_4=$_POST['paragraph_4'];
    }else{
        $paragraph_4=""; 
    }
    $category=$_POST['category'];
    // name of the uploaded file
    $journal_picture = $_FILES['journal_picture']['name'];
    $author_picture= $_FILES['author_picture']['name'];
    $absract_file = $_FILES['abstract']['name'];
    
    // get the file extension
    $journal_picture_extension = pathinfo($journal_picture, PATHINFO_EXTENSION);
    $author_picture_extension = pathinfo($author_picture, PATHINFO_EXTENSION);
    $absract_file_extension = pathinfo($absract_file, PATHINFO_EXTENSION);
    // unique id
    function password_generate($chars) 
    {
        $data = '123456789012345678901234567890';
        return substr(str_shuffle($data), 0, $chars);
    }
     $R_str= password_generate(4); 
    //---------------------------------
     $journal_picture_name = $author_picture_name =  $absract_file_name = "journol".$R_str;
    //---------------------------------
    // destination of the file on the server & change file name
    $journal_picture_destination = '../journals/journal_images/'. $journal_picture_name.".".$journal_picture_extension; 
    $author_picture_destination = '../journals/authors_images/'. $author_picture_name.".".$author_picture_extension; 
    $absract_file_destination = '../journals/journal_abstracts/'. $absract_file_name.".".$absract_file_extension; 
    //change file name
    $modefide_journal_picture_name= $journal_picture_name.".".$journal_picture_extension;
    $modefide_author_picture_name=$author_picture_name.".".$author_picture_extension;
    $modefide_absract_file_name= $absract_file_name.".".$absract_file_extension;
    // the physical file on a temporary uploads directory on the server
    $journal_picture_file = $_FILES['journal_picture']['tmp_name'];
    $journal_picture_size = $_FILES['journal_picture']['size'];
    
    $author_picture_file= $_FILES['author_picture']['tmp_name'];
    $author_picture_size = $_FILES['author_picture']['size'];
    
    $abstract_file = $_FILES['abstract']['tmp_name'];
    $abstract_size = $_FILES['abstract']['size'];
    //---------------------------------
        if ($title =='' && $content =='' && $first_name ==''&& $last_name =='' && $contact_number =='' && $email ==''&& $designation ==''&& $address ==''&& $about ==''&& $sub_title =='' ) {
            echo "<script>alert('All fields must be filled.')</script>";
            echo "<script>window.location='add_journal.php';</script>";
        }elseif(!in_array($journal_picture_extension, ['jpg','jpeg','png','jfif']) && !in_array($author_picture_extension, ['jpg','jpeg','png','jfif'])){
            echo "<script>alert('You images extension must be jpg,jpeg,png,jfif  and abstract inextension must be  pdf ') </script>";
            echo "<script>window.location='add_journal.php';</script>";
        }elseif (!in_array($absract_file_extension, ['pdf'])) {
            echo "<script>alert('Abstract extension must be  pdf ') </script>";
            echo "<script>window.location='add_journal.php';</script>";
        }elseif ($_FILES['journal_picture']['size'] > 2000000 &&  $_FILES['author_picture']['size'] > 2000000 ) {
            echo "<script>alert('Pictures too large Size!')</script>";
            echo "<script>window.location='add_journal.php';</script>";
        }elseif ($_FILES['abstract']['size'] > 10000000) {
            echo "<script>alert('Abstract file too large!')</script>";
            echo "<script>window.location='add_journal.php';</script>";
        }elseif (move_uploaded_file($journal_picture_file,$journal_picture_destination)) {
            if (move_uploaded_file($author_picture_file,$author_picture_destination)) {
                if (move_uploaded_file($abstract_file,$absract_file_destination)) {
    
                    $details_insert="INSERT INTO `journal`(`title`, `sub_title`, `paragraph_1`, `paragraph_2`, `paragraph_3`, `paragraph_4`,`image`, `abstract`, `journal_id`, `category`, `status`) VALUES ('$title','$sub_title','$paragraph_1','$paragraph_2','$paragraph_3','$paragraph_4','$modefide_journal_picture_name','$modefide_absract_file_name',' $journal_picture_name','$category','$status')";    
                    $details_sql=mysqli_query($connect,$details_insert);//or die(mysqli_error($connect));               
                    if ($details_sql) {
                        $user="INSERT INTO `applicants`(`first_name`, `last_name`, `designation`, `contact_number`, `email`, `address`, `picture`, `about`, `journal_id`) VALUES ('$first_name','$last_name','$designation','$contact_number','$email','$address','$modefide_author_picture_name','$about',' $journal_picture_name')";
                        if ($user_sql=mysqli_query($connect,$user)) {
                            echo "<script>alert('content added successful.')</script>";
                            echo "<script>window.location='add_journal.php';</script>";
                        } else {
                            $delete="DELETE FROM `journal` WHERE `journal_id` = '$absract_file_name'";
                            $detele_sql=mysqli_query($connect,$delete);
                            unlink("../journals/journal_images/$modefide_journal_picture_name");
                            unlink("../journals/authors_images/$modefide_author_picture_name"); 
                            unlink("../journals/journal_abstracts/$modefide_absract_file_name"); 
                            echo "<script>alert('Failed try again(1)!')</script>";
                            echo "<script>window.location='add_journal.php';</script>";
                        }
                    } else {
                        unlink("../journals/journal_images/$modefide_journal_picture_name");
                        unlink("../journals/authors_images/$modefide_author_picture_name"); 
                        unlink("../journals/journal_abstracts/$modefide_absract_file_name"); 
                        echo "<script>alert('Failed try again(2)!')</script>";
                        echo "<script>window.location='add_journal.php';</script>";
                    }
                } else {
                    unlink("../journals/journal_images/$modefide_journal_picture_name");
                    unlink("../journals/authors_images/$modefide_author_picture_name");          
                    echo "<script>alert('Failed try again(3)!')</script>";
                    echo "<script>window.location='add_journal.php';</script>";
                }
            } else {
                unlink("../journals/journal_images/$modefide_journal_picture_name");
                echo "<script>alert('Failed try again(4)!')</script>";
                echo "<script>window.location='add_journal.php';</script>";
            }
        } else {
            echo "<script>alert('Failed try again(5)!')</script>";
            echo "<script>window.location='add_journal.php';</script>";
        } 
}
?>