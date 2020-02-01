<?php
include("php/connect.php");
session_start();
//login path protection
if (!isset($_SESSION['username'])) {
  header("location: login.php");
}


if (!isset($_SESSION['level'])) {
  $level = $_GET['level'];
}
$active_page = "projectblokken";

$json_data = json_decode(file_get_contents("manifest.json"));
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

  <title>Alle blokken</title>

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


          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-center mb-4">
            <h1 class="h3 text-gray-800">Alle blokken</h1>
          </div>


          <!-- Content Row -->
          <div class="row justify-content-center">
            <?php foreach ($json_data as $key => $value) {
              $href_link = "";
              if (!$value->disabled) {
                $href_link = "href='block.php?block=".$key."'";
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
            }?>

          </div>


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
