
<?php include 'header/main_header.php';?>
  <?php include 'sidebar/main_sidebar.php';?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Lesson</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">My Lesson</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <div class="container py-5">
        <div class="row mt-4">

        <?php
        $conn = mysqli_connect("localhost","root","","dtr_system");
        $query = "SELECT * FROM tbl_lesson";
        $query_run = mysqli_query($conn, $query);
        $check_lesson = mysqli_num_rows($query_run) > 0;


        if($check_lesson)
        {
            while($row = mysqli_fetch_array($query_run))
            {
                ?>
                <div class="col-md-4">
                <div class="card text-dark bg-light mb-3" style="max-width: 24rem;">
                  <!-- <img src="/DTR_Management_system/dtr_panel/dtr_dashboard/upload/<?php echo $row['Lesson_image']; ?>" width="365px" height="365px" alt="Files">-->
                  <div class="card-header text-danger"><?php echo $row['Lesson_Subject']; ?></div>
                    <div class="card-body text-secondary">
                           <h5 class="card-title text-success">Lesson: <?php echo $row['Lesson_title']; ?></h5><br>
                           <h3 class="card-title"><?php echo $row['Lesson_chapter']; ?></h3><br><br>
                           <p class="card-text">Category: 
                           <?php echo $row['Lesson_category']; ?>
                           </p>
                           <p class="card-text">File Name: 
                           <?php echo $row['Lesson_image']; ?>
                           </p>
                           <a download="<?php echo $row['Lesson_image'];?>" href="/DTR_Management_system/dtr_panel/dtr_dashboard/upload/<?php echo $row['Lesson_image'];?>">Click Here to download</a>
                       </div>
                   </div>
               </div>
               <?php
            }
        }
        else
        {
            echo "No Lesson Found";
        }

        ?>

        </div>
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
    $("#exampleLesson1").DataTable({
    });

  });

</script>
</body>
</html>
