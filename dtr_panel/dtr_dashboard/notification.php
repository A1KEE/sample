<?php

  if($_POST){
	// Authorisation details.
	$username = "lumaadikejoseph0@gmail.com";
	$hash = "47df842256c9c72b1469661977d64b3443eef41cae517f27131b89ac49df8e71";

	// Config variables. Consult http://api.txtlocal.com/docs for more info.
	$test = "10";

	// Data for text message. This is the text message data.
	$sender = $_POST['sender']; // This is who the message appears to be from.
	$numbers = "+63" .$_POST['receiver']; // A single number or a comma-seperated list of numbers
	$message = $_POST['message'];
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('https://api.txtlocal.com/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
  }
?>



<?php include 'header/main_header.php';?>
  <?php include 'sidebar/main_sidebar.php';?>
  
  <div class="content-wrapper">
    <form method="POST" action="notification.php">
        <div class="form-group col-md-6">
          <label for="exampleInputEmail1">Sender</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="sender" placeholder="Sender Name">
        </div>

        <div class="form-group col-md-6">
          <label for="exampleInputPassword1">Receiver</label>
          <input type="text" class="form-control " id="exampleInputPassword1" name="receiver" placeholder="Receiver ex. 9396439..">
        </div>

        <div class="form-group col-md-6">
          <label for="exampleInputPassword1">Message</label>
          <textarea class="form-control" name="message" placeholder="Messages"></textarea>
        </div>

        <button type="submit" class="btn btn-primary ">Send</button>

    

   

  <?php include 'footer/footer.php';?>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script>
  $(function () {
    $("#exampleLesson1").DataTable({
    });

  });

</script>
</body>
</html>
