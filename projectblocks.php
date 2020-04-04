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

//get board information
$f = fopen('php/boardinfo.txt', 'r');
$line = fgets($f);
fclose($f);

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
  <link href="css/my.css" rel="stylesheet">

  <script type="text/javascript">
    function searchBoard() {
      //alert("Searching board");
      setTimeout("stopSearching()", 5000); // after 5 secs
      //var selectBox = document.getElementById("searchBoardSelect");
      // var selectedValue = selectBox.options[selectBox.selectedIndex].value;
      //alert("HEYYY");
      document.getElementById("boardNotFound").style.display = "none";
      document.getElementById("loading").style.display = "block";
      $('#searchingBoardModal').modal('show');
    }
  </script>

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

          <!-- Searching a board Modal -->
          <div class="modal fade" id="searchingBoardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header d-block ">
                      <!-- <h5 class="modal-title text-center " id="exampleModalLongTitle1">Geluiden uploaden</h5> -->
                      <h5 class="modal-title text-center " id="exampleModalLongTitle2">Verbinden met bordje</h5>
                      <!-- <button type="button" name="submitSounds" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button> -->
                    </div>
                    <div class="modal-body ">
                      <div id="loading" class="lds-ellipsis" style="display:block;">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                      </div>
                      <div id='boardNotFound' style="display:none;">Er is geen bordje actief in de buurt waar de geluiden op kunnen worden gezet!</div>

                    </div>
                    <div class="modal-footer justify-content-center">
                      <button type="button" name="" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-stop suitcase"></i> Nee</button>
                      <button <?php if ($_SESSION['role'] == "Child" || $_SESSION['role'] == "Teacher") { ?> disabled <?php } ?> type="button" name="" class="btn btn-primary" onclick="searchBoard()" ><i class="fas fa-redo suitcase"></i> Nog eens</button>

                    </div>
                  </div>
                </div>
              </div>

          <!-- Titel van de pagina -->
          <div class="d-sm-flex align-items-center justify-content-center mb-4">
            <h1 class="h3 text-gray-800">Alle blokken</h1>
          </div>

          <!-- Alle blokken worden hier laten zien -->
          <div class="row justify-content-center">
            <?php foreach ($json_data as $key => $value) {
              $href_link = "";
              if (!$value->disabled) {
                $href_link = "href='block.php?block=" . $key . "'";
              }
              echo "
              <div class='disabled col-sm-2 text-center block-card '>
                <a class='disabled' " . $href_link . ">
                  <div class='card " . (($value->disabled) ? 'bg-secondary' : 'bg-primary') . " d-sm-flex justify-content-center align-items-center shadow mb-4'>
                    <div class='card-body'>
                    " . (($value->disabled) ? "<i class='fas fa-lock'></i>" : "<i class='fas fa-cube cube'></i>") . "
                    </div>
                    </div>
                    <p>" . $key . "</p>

                </a>
              </div>";
            } ?>
          </div>
          <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

  </div>

  <!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <select name="" class="btn btn-light colorful-select dropdown-primary" id="searchBoardSelect" onchange="searchBoard();">
          <option class="" value="" selected><?php if($line == "") {echo "Niet verbonden";} else { echo $line; }?></option>
          <?php if ($line == "") {
            echo "
                <option id='searchingboard'>Zoeken naar bordje</option>";
          }
          ?>
        </select>
        <!-- <span>Copyright &copy; Your Website 2020</span> -->
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

<script type="text/javascript">
    function stopSearching() {
      //alert("stop searching");
      document.getElementById("boardNotFound").style.display = "block";
      document.getElementById("loading").style.display = "none";
    }
  </script>

  <script type="text/javascript">
    <?php if($line == "Niet verbonden") {?>
    $(window).on('load', searchBoard())
  <?php } ?>
  </script>
</body>

</html>