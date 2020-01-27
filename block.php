<?php
include("php/connect.php");
session_start();
//login path protection
if (!isset($_SESSION['username'])) {
  header("location: login.php");
}

$schoolyear = $_GET['schoolyear'];
$block = $_GET['block'];

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blok 1</title>

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
              <li class="breadcrumb-item "><a href= "projectblocks.php?schoolyear=<?php echo $schoolyear;?>">Projectblok <?php echo $block;?></a></a></li>
              <li class="breadcrumb-item active"><a>Projecten</a></li>

            </ol>
          </nav>

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Blok 1</h1>
          </div>

          <!-- Content Row -->
          <div class="row justify-content-center">

            <!-- Earnings (Monthly) Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

            <!-- Earnings (Monthly) Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

            <!-- Earnings (Monthly) Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

            <!-- Pending Requests Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
            <div class="col-sm-2 text-center block-card">
              <a href="project.php?<?php echo $schoolyear;?>&block=<?php echo $block;?>&project=1">
                <div class="card bg-secondary d-sm-flex justify-content-center align-items-center shadow mb-4">
                  <div class="card-body">
                    <i class="fas fa-suitcase suitcase"></i>
                  </div>
                </div>
                <p>Project 1</p>
              </a>
            </div>

            <div class="col-sm-2 text-center block-card">
              <a href="project.php?<?php echo $schoolyear;?>&block=<?php echo $block;?>&project=2">
                <div class="card bg-secondary d-sm-flex justify-content-center align-items-center shadow mb-4">
                  <div class="card-body">
                    <i class="fas fa-suitcase suitcase"></i>
                  </div>
                </div>
                <p>Project 2</p>
              </a>
            </div>

            <div class="col-sm-2 text-center block-card">
              <a href="project.php?<?php echo $schoolyear;?>&block=<?php echo $block;?>&project=3">
                <div class="card bg-secondary d-sm-flex justify-content-center align-items-center shadow mb-4">
                  <div class="card-body">
                    <i class="fas fa-suitcase suitcase"></i>
                  </div>
                </div>
                <p>Project 3</p>
              </a>
            </div>


          </div>
          <!-- /.container-fluid -->

          <div class="row justify-content-center">
            <div class="col-sm-2 text-center block-card">
              <a href="project.php?<?php echo $schoolyear;?>&block=<?php echo $block;?>&project=4">
                <div class="card bg-secondary d-sm-flex justify-content-center align-items-center shadow mb-4">
                  <div class="card-body">
                    <i class="fas fa-suitcase suitcase"></i>
                  </div>
                </div>
                <p>Project 4</p>
              </a>
            </div>
            <div class="col-sm-2 text-center block-card">
              <a href="project.php?<?php echo $schoolyear;?>&block=<?php echo $block;?>&project=5">
                <div class="card bg-secondary d-sm-flex justify-content-center align-items-center shadow mb-4">
                  <div class="card-body">
                    <i class="fas fa-suitcase suitcase"></i>
                  </div>
                </div>
                <p>Project 5</p>
              </a>
            </div>
            <div class="col-sm-2 text-center block-card">
              <a href="project.php?<?php echo $schoolyear;?>&block=<?php echo $block;?>&project=6">
                <div class="card bg-secondary d-sm-flex justify-content-center align-items-center shadow mb-4">
                  <div class="card-body">
                    <i class="fas fa-suitcase suitcase"></i>
                  </div>
                </div>
                <p>Project 6</p>
              </a>
            </div>
          </div>

          <div class="row justify-content-center">
            <div class="col-sm-2 text-center block-card">
              <a href="project.php?<?php echo $schoolyear;?>&block=<?php echo $block;?>&project=7">
                <div class="card bg-secondary d-sm-flex justify-content-center align-items-center shadow mb-4">
                  <div class="card-body">
                    <i class="fas fa-suitcase suitcase"></i>
                  </div>
                </div>
                <p>Project 7</p>
              </a>
            </div>
            <div class="col-sm-2 text-center block-card">
              <a href="project.php?<?php echo $schoolyear;?>&block=<?php echo $block;?>&project=8">
                <div class="card bg-secondary d-sm-flex justify-content-center align-items-center shadow mb-4">
                  <div class="card-body">
                    <i class="fas fa-suitcase suitcase"></i>
                  </div>
                </div>
                <p>Project 8</p>
              </a>
            </div>
            <div class="col-sm-2 text-center block-card">
              <a href="project.php?<?php echo $schoolyear;?>&block=<?php echo $block;?>&project=9">
                <div class="card bg-secondary d-sm-flex justify-content-center align-items-center shadow mb-4">
                  <div class="card-body">
                    <i class="fas fa-suitcase suitcase"></i>
                  </div>
                </div>
                <p>Project 9</p>
              </a>
            </div>
          </div>

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Your Website 2019</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

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

    </script>
</body>

</html>