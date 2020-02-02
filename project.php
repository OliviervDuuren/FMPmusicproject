<?php
include("php/connect.php");
session_start();
//login path protection
if (!isset($_SESSION['username'])) {
  header("location: login.php");
}

$block = $_GET['block'];
$project = $_GET['project'];
$active_page = "projectblokken";


$json_data = json_decode(file_get_contents("manifest.json"));
$json_project = $json_data->$block->$project;
error_log( print_r($json_project, TRUE) );

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

  <title><?php echo $project ?></title>

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

        <!-- Topbar -->
        <?php include("partials/topbar.php"); ?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container">

          <?php if ($_SESSION['role'] == "teacher") : ?>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">

                <li class="breadcrumb-item "><a href="projectblocks.php">Projectblokken</a></a></li>
                <li class="breadcrumb-item "><a href="block.php?block=<?php echo $block; ?>"><?php echo $block; ?></a></a></li>
                <li class="breadcrumb-item active"><a><?php echo $project; ?></a></li>

              </ol>
            </nav>

          <?php endif; ?>

          <?php if ($_SESSION['role'] == "child") : ?>
            <button class="btn-lg btn-primary hBack" type="button"><i class="fas fa-arrow-circle-left suitcase"></i>Terug</button>
          <?php endif; ?>

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-center mb-4">
            <h1 class="h3 text-gray-800"><?php echo $project; ?></h1>
          </div>

          <!-- Content Row -->
          <div class="row justify-content-center">


            <div class="col-sm-2 text-center block-card">
              <div class="card bg-primary d-sm-flex justify-content-center align-items-center shadow mb-4">
                <div class="card-body">
                  <i class="fas fa-suitcase suitcase"></i>
                </div>
              </div>
              <h1 class="h4"><?php echo $json_project->title;?></h1>
            </div>




          </div>
          <!-- /.container-fluid -->

          <div class="text-center">

            <div class="d-sm-flex justify-content-center align-items-center mb-4">
              <p class="text-primary">Speel met onderstaande fragmenten en maak het liedje <b><?php echo $json_project->title;?></b> </p>
            </div>

            <div class="row justify-content-center">

              <?php foreach ($json_project->fragments as $key => $value) {

                  echo "<div class='col-sm-2 text-center block-card'>
                  <a data-toggle='modal' data-target='#gspeelModal'>
                    <div class='card bg-secondary d-sm-flex justify-content-center align-items-center shadow mb-4'>
                      <div class='card-body'>
                        <i class='fas fa-music suitcase'></i>
                      </div>
                    </div>
                    <p>".$value."</p>
                    </a>
                  </div>";

              }?>
              <!-- Modal -->
              <div class="modal fade" id="gspeelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header ">
                    <h5 class="modal-title justify-content-center" id="exampleModalLongTitle">Speel geluid</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Op dit moment werkt deze functie nog niet. Hier zouden de geluiden hoorbaar moeten zijn. Dank u!
                  </div>
                  <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Oke</button>
                  </div>
                </div>
              </div>
            </div>

            </div>
            <button class="btn btn-primary mb-3" type="button" data-toggle="modal" data-target="#guploadModal">
              Geluiden uploaden
            </button>

            <!-- Modal -->

            <div class="modal fade" id="guploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header ">
                    <h5 class="modal-title justify-content-center" id="exampleModalLongTitle">Upload geluiden</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Op dit moment werkt deze functie nog niet. Vraag aan iemand hoe de geluiden aangepast kunnen worden op het bordje met tegeltjes. Dank u!
                  </div>
                  <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Oke</button>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <!-- End of Main Content -->



        </div>
        <!-- End of Content Wrapper -->

      </div>
      <!-- End of Page Wrapper -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

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
        $(".hBack").on("click", function(e) {
          e.preventDefault();
          window.history.back();
        });
      </script>
</body>

</html>
