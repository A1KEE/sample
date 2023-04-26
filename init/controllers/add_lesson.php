<?php
  require_once "../model/class_model.php"; //dito natin ibabato ang data

	if(ISSET($_POST)){
		$conn = new class_model();

		$LessonChapter = trim($_POST['LessonChapter']);
		$LessonTitle = trim($_POST['LessonTitle']);
        $FileLocation = trim($_POST['FileLocation']);
        $Category = trim($_POST['Category']);


		
		$add = $conn->add_lesson($LessonChapter, $LessonTitle,$FileLocation,$Category); //method ang tawag dito ort function
		if($add == TRUE){
		      echo '<div class="alert alert-success">Add Lesson Successfully!</div><script> setTimeout(function() {  location.replace("manage_lesson.php"); }, 1000); </script>';
		    

		  }else{
		    echo '<div class="alert alert-danger">Add Lesson Failed!</div><script> setTimeout(function() {  location.replace("manage_lesson.php"); }, 1000); </script>';

	
		}
	}

?>

