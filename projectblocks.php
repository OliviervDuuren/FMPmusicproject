<?php
include("php/connect.php");
session_start();
//login path protection
if (!isset($_SESSION['username'])) {
  header("location: login.php");
}

$schoolyear = $_GET['schoolyear'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include("partials/sidebar.php"); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php include("partials/topbar.php"); ?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="schoolyears.php">Schooljaar <?php echo $schoolyear;?></a></li>
              <li class="breadcrumb-item active"><a>Projectblokken</a></li>
            </ol>
          </nav>

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Projectblokken</h1>
          </div>

          <!-- Content Row -->
          <div class="row justify-content-center">
            <div class="col-sm-2 text-center block-card">
              <a href="block.php?schoolyear=<?php echo $schoolyear;?>&block=1">
                <div class="card bg-secondary d-sm-flex justify-content-center align-items-center shadow mb-4">
                  <div class="card-body">
                    <i class="fas fa-cube cube"></i>
                  </div>
                </div>
                <p>Blok 1</p>
              </a>
            </div>

            <div class="col-sm-2 text-center block-card">
              <a href="block.php?schoolyear=<?php echo $schoolyear;?>&block=2">
                <div class="card bg-secondary d-sm-flex justify-content-center align-items-center shadow mb-4">
                  <div class="card-body">
                    <i class="fas fa-cube cube"></i>
                  </div>
                </div>
                <p>Blok 2</p>
              </a>
            </div>

            <div class="col-sm-2 text-center block-card">
              <a href="block.php?schoolyear=<?php echo $schoolyear;?>&block=3">
                <div class="card bg-secondary d-sm-flex justify-content-center align-items-center shadow mb-4">
                  <div class="card-body">
                    <i class="fas fa-cube cube"></i>
                  </div>
                </div>
                <p>Blok 3</p>
              </a>
            </div>


          </div>
          <!-- /.container-fluid -->

          <div class="row justify-content-center">
            <div class="col-sm-2 text-center block-card">
              <a href="block.php?schoolyear=<?php echo $schoolyear;?>&block=4">
                <div class="card bg-secondary d-sm-flex justify-content-center align-items-center shadow mb-4">
                  <div class="card-body">
                    <i class="fas fa-cube cube"></i>
                  </div>
                </div>
                <p>Blok 4</p>
              </a>
            </div>
            <div class="col-sm-2 text-center block-card">
              <a href="block.php?schoolyear=<?php echo $schoolyear;?>&block=5">
                <div class="card bg-secondary d-sm-flex justify-content-center align-items-center shadow mb-4">
                  <div class="card-body">
                    <i class="fas fa-cube cube"></i>
                  </div>
                </div>
                <p>Blok 5</p>
              </a>
            </div>
            <div class="col-sm-2 text-center block-card">
              <a href="block.php?schoolyear=<?php echo $schoolyear;?>&block=6">
                <div class="card bg-secondary d-sm-flex justify-content-center align-items-center shadow mb-4">
                  <div class="card-body">
                    <i class="fas fa-cube cube"></i>
                  </div>
                </div>
                <p>Blok 6</p>
              </a>
            </div>
          </div>

          <div class="row justify-content-center">
            <div class="col-sm-2 text-center block-card">
              <a href="block.php?schoolyear=<?php echo $schoolyear;?>&block=7">
                <div class="card bg-secondary d-sm-flex justify-content-center align-items-center shadow mb-4">
                  <div class="card-body">
                    <i class="fas fa-cube cube"></i>
                  </div>
                </div>
                <p>Blok 7</p>
              </a>
            </div>
            <div class="col-sm-2 text-center block-card">
              <a href="block.php?schoolyear=<?php echo $schoolyear;?>&block=8">
                <div class="card bg-secondary d-sm-flex justify-content-center align-items-center shadow mb-4">
                  <div class="card-body">
                    <i class="fas fa-cube cube"></i>
                  </div>
                </div>
                <p>Blok 8</p>
              </a>
            </div>
            <div class="col-sm-2 text-center">
              <a href="block9.php">
                <div class="card bg-secondary d-sm-flex justify-content-center align-items-center shadow mb-4">
                  <div class="card-body">
                    <i class="fas fa-cube cube"></i>
                  </div>
                </div>
                <p>Blok 9</p>
              </a>
            </div>
          </div>

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <!-- <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Your Website 2019</span>
            </div>
          </div>
        </footer> -->
        <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>


    <script type="text/javascript">

    </script>
</body>

</html>
