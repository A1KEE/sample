<?php
session_start();
?>
<?php include 'header/main_header.php';?>
<?php include 'sidebar/main_sidebar.php';?>

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Lesson</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage Lesson</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <div class="card-body">
        <?php
                $conn = mysqli_connect("localhost","root","","dtr_system");

                $LessonID = $_GET['LessonID'];
                $query = "SELECT * FROM tbl_lesson WHERE LessonID='$LessonID' ";
                $query_run = mysqli_query($conn, $query);

                if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $row)
                    {
                        ?>
                         <form action="action.php" method="POST" enctype="multipart/form-data">

                            <input type="hidden" name="Lesson_ID" value="<?php echo $row['LessonID']; ?>" />

                            <div class="form-group">
                            <div class="col-md-5">
                            <label for="">Lesson Chapter</label>
                            <input type="text" name="Lesson_chapter" value="<?php echo $row['Lesson_chapter']; ?>" required class="form-control" placeholder="Enter Lesson Chapter">
                            </div>

                            <div class="form-group">
                            <div class="col-md-5">
                            <label for="">Lesson Title</label>
                            <input type="text" name="Lesson_title" value="<?php echo $row['Lesson_title']; ?>" required class="form-control" placeholder="Enter Lesson Title">
                            </div>

                            <div class="form-group">
                            <div class="col-md-5">
                            <label for="">File Format</label>
                            <select class="form-control" name="Lesson_category" value="<?php echo $row['Lesson_category']; ?>" placeholder="Enter Lesson Chapter">
                                <option value="">Select File Type</option>
                                <option value="Docs">Docs</option>
                                <option value="Video">Video</option>
                            </select>
                            </div>

                            <div class="form-group">
                            <div class="col-md-5">
                            <label for="">Subject</label>
                            <input type="text" name="Lesson_Subject" value="<?php echo $row['Lesson_Subject']; ?>" required class="form-control" placeholder="Enter Subject">
                            </div>

                            <div class="form-group">
                            <div class="col-md-5">
                            <label for="">Lesson Image</label>        
                            <input type="file" name="Lesson_image" class="form-control"><br>
                            <input type="hidden" name="Lesson_image_old" value="<?php echo $row['Lesson_image']; ?>">
                            </div>

                            <div class="form-group">
                            <div class="col-md-5">
                            <button type= "submit" name="update_lesson" class="btn btn-primary">UPDATE</button>
                            </div>
                        </form>

                        <?php
                    }
                }
                else 
                {
                    echo "No Record Available";
                }
                ?>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
    
              <div class="card-body">
              <?php
                $conn = mysqli_connect("localhost","root","","dtr_system");


                $query = "SELECT * FROM tbl_lesson";
                $query_run = mysqli_query($conn, $query);
                ?>
                <table id="exampleLesson" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>LessonID</th>
                    <th>Lesson Chapter</th>
                    <th>Lesson Title</th>
                    <th>Category</th>
                    <th>Subject</th>
                    <th>Lesson File</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                 <?php 
                      if(mysqli_num_rows($query_run) > 0)
                      {
                        foreach($query_run as $row)
                      {
                        ?>
                  <tr>
                    <td><?php echo $row['LessonID']; ?></td>
                    <td><?php echo $row['Lesson_chapter']; ?></td>
                    <td><?php echo $row['Lesson_title']; ?></td>
                    <td><?php echo $row['Lesson_category']; ?></td>
                    <td><?php echo $row['Lesson_Subject']; ?></td>
                    <td><?php echo $row['Lesson_image']; ?></td>
                    </td>
                    <td><a href="editlesson.php?LessonID=<?php echo $row['LessonID']; ?>" class="btn btn-info">EDIT</a>
                  </td>
                    <td>
                      <!--<a href="editlesson.php?=<?php ?>" class="btn btn-danger">DELETE</a> -->
                      <form action="action.php" method="POST">
                        <input type="hidden" name="delete_id" value="<?php echo $row['LessonID']; ?>">
                        <input type="hidden" name="delete_image" value="<?php echo $row['Lesson_image']; ?>">
                        <button type="submit" name="delete_lesson" class="btn btn-danger">Delete</button>
                      </form>
                  </td>
                  </tr>
                  <?php
                      }
                    }
                    else
                    {
                      ?>
                      <tr>
                        <td>No record Available</td>
                    </tr>
                    <?php
                    }
                      ?>
                </table>
              </div>





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
    $("#exampleLesson").DataTable({
    });

  });
</script>
</body>
</html>