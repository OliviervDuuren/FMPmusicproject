<?php
include("php/connect.php");
session_start();
//login path protection
if (!isset($_SESSION['username'])) {
  header("location: login.php");
}

$block = $_GET['block'];
$active_page = "projectblokken";

if (!isset($_SESSION['level'])) {
$level = $_GET['level'];

}

$json_data = json_decode(file_get_contents("manifest.json"));
$json_blockdata = $json_data->$block;
error_log( print_r($json_blockdata, TRUE) );
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="img\Icon.png" type="image/x-icon">

  <title><?php echo $block; ?></title>

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

          <?php if ($_SESSION['role'] == "teacher") : ?>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="projectblocks.php">Alle Blokken</a></a></li>
                <li class="breadcrumb-item active"><a><?php echo $block; ?></a></li>

              </ol>
            </nav>

          <?php endif; ?>

          <?php if ($_SESSION['role'] == "child") : ?>
            <button class="btn-lg btn-primary hBack" type="button"><i class="fas fa-arrow-circle-left suitcase"></i>Terug</button>
          <?php endif; ?>

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-center mb-4">
            <h1 class="h3 text-gray-800"><?php echo $block; ?></h1>
          </div>

          <!-- Content Row -->
          <div class="row justify-content-center">
            <?php foreach ($json_blockdata as $key => $value) {
              if(is_object($value)){
                $href_link = "";
                if (!$value->disabled) {
                  $href_link = "href='project.php?block=".$block."&project=".$key."'";
                }
                echo "<div class='disabled col-sm-2 text-center block-card '>
                  <a class='disabled' ".$href_link.">
                    <div class='card ".(($value->disabled)?'bg-secondary':'bg-primary')." d-sm-flex justify-content-center align-items-center shadow mb-4'>
                      <div class='card-body'>
                      ".(($value->disabled)?"<i class='fas fa-lock'></i>":"<i class='fas fa-cube cube'></i>")."
                      </div>
                    </div>
                    <p>".$key."</p>
                  </a>
                </div>";
              }
            }?>


            <!-- <div class="col-sm-2 text-center block-card">
              <a href="project.php?block=<?php echo $block;  ?>&project=1">
                <div class="card bg-secondary d-sm-flex justify-content-center align-items-center shadow mb-4">
                  <div class="card-body">
                    <i class="fas fa-suitcase suitcase"></i>
                  </div>
                </div>
                <p>Project 1</p>
              </a>
            </div>

            <div class="col-sm-2 text-center block-card">
              <a href="project.php?block=<?php echo $block;  ?>&project=2">
                <div class="card bg-secondary d-sm-flex justify-content-center align-items-center shadow mb-4">
                  <div class="card-body">
                    <i class="fas fa-suitcase suitcase"></i>
                  </div>
                </div>
                <p>Project 2</p>
              </a>
            </div>

            <div class="col-sm-2 text-center block-card">
              <a href="project.php?block=<?php echo $block;  ?>&project=3">
                <div class="card bg-primary d-sm-flex justify-content-center align-items-center shadow mb-4">
                  <div class="card-body">
                    <i class="fas fa-suitcase suitcase"></i>
                  </div>
                </div>
                <p>Project 3</p>
              </a>
            </div> -->


          </div>
          <!-- /.container-fluid -->

          <?php if ($_SESSION['level'] == "2" || $_SESSION['level'] == "3" || $_SESSION['role'] == "teacher") : ?>
            <!-- <div class="row justify-content-center">
              <div class="col-sm-2 text-center block-card">
                <a href="project.php?block=<?php echo $block;  ?>&project=4">
                  <div class="card bg-secondary d-sm-flex justify-content-center align-items-center shadow mb-4">
                    <div class="card-body">
                      <i class="fas fa-suitcase suitcase"></i>
                    </div>
                  </div>
                  <p>Project 4</p>
                </a>
              </div>
              <div class="col-sm-2 text-center block-card">
                <a href="project.php?block=<?php echo $block;  ?>&project=5">
                  <div class="card bg-secondary d-sm-flex justify-content-center align-items-center shadow mb-4">
                    <div class="card-body">
                      <i class="fas fa-suitcase suitcase"></i>
                    </div>
                  </div>
                  <p>Project 5</p>
                </a>
              </div>
              <div class="col-sm-2 text-center block-card">
                <a href="project.php?block=<?php echo $block;  ?>&project=6">
                  <div class="card bg-secondary d-sm-flex justify-content-center align-items-center shadow mb-4">
                    <div class="card-body">
                      <i class="fas fa-suitcase suitcase"></i>
                    </div>
                  </div>
                  <p>Project 6</p>
                </a>
              </div>
            </div> -->

          <?php endif; ?>

          <?php if ($_SESSION['level'] == "3" || $_SESSION['role'] == "teacher") : ?>
<!--
            <div class="row justify-content-center">
              <div class="col-sm-2 text-center block-card">
                <a href="project.php?block=<?php echo $block;  ?>&project=7">
                  <div class="card bg-secondary d-sm-flex justify-content-center align-items-center shadow mb-4">
                    <div class="card-body">
                      <i class="fas fa-suitcase suitcase"></i>
                    </div>
                  </div>
                  <p>Project 7</p>
                </a>
              </div>
              <div class="col-sm-2 text-center block-card">
                <a href="project.php?block=<?php echo $block;  ?>&project=8">
                  <div class="card bg-secondary d-sm-flex justify-content-center align-items-center shadow mb-4">
                    <div class="card-body">
                      <i class="fas fa-suitcase suitcase"></i>
                    </div>
                  </div>
                  <p>Project 8</p>
                </a>
              </div>
              <div class="col-sm-2 text-center block-card">
                <a href="project.php?block=<?php echo $block;  ?>&project=9">
                  <div class="card bg-secondary d-sm-flex justify-content-center align-items-center shadow mb-4">
                    <div class="card-body">
                      <i class="fas fa-suitcase suitcase"></i>
                    </div>
                  </div>
                  <p>Project 9</p>
                </a>
              </div>
            </div> -->

          <?php endif; ?>

        </div>
        <!-- End of Main Content -->



      </div>
      <!-- End of Content Wrapper -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Page Wrapper -->



    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <script type="text/javascript">
      $(".hBack").on("click", function(e) {
        e.preventDefault();
        window.history.back();
      });
    </script>
</body>

</html>
