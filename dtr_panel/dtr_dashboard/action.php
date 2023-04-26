<?php
session_start();

$conn = mysqli_connect("localhost","root","","dtr_system");

if(isset($_POST['save_lesson']))
{
    $chapter = $_POST['Lesson_chapter'];
    $title = $_POST['Lesson_title'];
    $category = $_POST['Lesson_category'];
    $Subj = $_POST['Lesson_Subject'];
    $image = $_FILES['Lesson_image']['name'];

    $allowed_exttension = array('gif', 'png', 'jpg', 'jpeg','docs','mp4','pdf');
    $filename = $_FILES['Lesson_image']['name'];
    $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
    if (!in_array($file_extension, $allowed_extension))
    {
      $_SESSION['status'] = "You are allowed with only jpg, png, jpeg and gif";
      header('location: lesson.php');
    }

    if(file_exists("upload/" . $_FILES['Lesson_image']['name']))
    {
            $filename = $_FILES['Lesson_image']['name'];
            $_SESSION['status'] = "File Already Exists!  ".$filename;
            header('location: lesson.php');
        }

    else

    {
    $query = "INSERT INTO tbl_lesson (Lesson_chapter,Lesson_title,Lesson_category,Lesson_Subject,Lesson_image) VALUES ('$chapter','$title','$category','$Subj','$image')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
      move_uploaded_file($_FILES["Lesson_image"]["tmp_name"], "upload/".$_FILES["Lesson_image"]["name"]);
      $_SESSION['status'] = "Lesson Stored Successfully";
      header('location: lesson.php');
    }
    else
    {
      $_SESSION['status'] = "Lesson Not Inserted!";
      header('location: lesson.php');
    }
  }

}


if(isset($_POST['update_lesson']))
{
  $Lesson_ID = $_POST['Lesson_ID'];
  $chapter = $_POST['Lesson_chapter'];
  $title = $_POST['Lesson_title'];
  $category = $_POST['Lesson_category'];
  $Subj = $_POST['Lesson_Subject'];

  $new_image = $_FILES['Lesson_image']['name'];
  $old_image = $_POST['Lesson_image_old'];

  if($new_image != '')
  {
    $update_filename = $_FILES['Lesson_image']['name'];
  }
  else
  {
    $update_filename = $old_image;
  }

    if(file_exists("upload/" . $_FILES['Lesson_image']['name']))
    {
        $filename = $_FILES['Lesson_image']['name'];
        $_SESSION['status'] = "File already Exists ".$filename;
        header("Location: lesson.php");
  }
  else
  {
    $query = "UPDATE tbl_lesson SET Lesson_chapter='$chapter', Lesson_title='$title', Lesson_category='$category', Lesson_Subject='$Subj', Lesson_image='$update_filename' WHERE LessonID='$Lesson_ID' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
      if($_FILES['Lesson_image']['name'] !='')
      {
        move_uploaded_file($_FILES["Lesson_image"]["tmp_name"], "upload/".$_FILES["Lesson_image"]["name"]);
        unlink("upload/".$old_image);
      }
      $_SESSION['status'] = "Updated Successfully";
      header("Location: lesson.php");
    }
    else
  {
    $_SESSION['status'] = "Lesson Not Updated.! ";
      header("Location: lesson.php");
   }
  }
}



if(isset($_POST['delete_lesson']))
{
  $Lesson_ID = $_POST['delete_id'];
  $image = $_POST['delete_image'];

  $query = "DELETE FROM tbl_lesson WHERE LessonID='$Lesson_ID' ";
  $query_run = mysqli_query($conn, $query);

  if($query_run)
  {
    unlink("upload/".$image);
    $_SESSION['status'] = "Data or Lesson Deleted Successfully";
    header("Location: lesson.php");
  }
  else
  {
    $_SESSION['status'] = "Lesson Not Deleted! ";
    header("Location: lesson.php");
  }
}

?>