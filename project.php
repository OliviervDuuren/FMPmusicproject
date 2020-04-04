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


if (isset($_POST['submitSounds'])) {
  $fp = fopen('data.txt', 'wb');
  foreach ($_POST["soundvalue"] as $key => $value) {
    fwrite($fp, $value);
    fwrite($fp, ";");
    //echo $value;
  }
  fclose($fp);
}

if (isset($_POST['submitProject'])) {
  $sql1 = "SELECT vordering FROM users";
  $result1 = mysqli_query($mysqli, $sql1);
  $row = mysqli_fetch_array($result1);

  //echo $result1;
  $level = $json_project->id;

  if ($row > $json_project->id) {
    $sql2 = "UPDATE users
          SET vordering   = '" . $level . "'
          WHERE username = '" . $_SESSION['username'] . "' ";

    error_log(print_r($sql2, TRUE));

    $result = mysqli_query($mysqli, $sql2);
    //header("location: blocks.php");
  }
}

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

  <title><?php echo $project ?></title>

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

        <!-- Topbar -->
        <?php include("partials/topbar.php"); ?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container">

          <!-- Breadcrumb voor leerkrachten -->
          <?php if ($_SESSION['role'] == "Teacher") : ?>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">

                <li class="breadcrumb-item "><a href="projectblocks.php">Alle blokken</a></a></li>
                <li class="breadcrumb-item "><a href="block.php?block=<?php echo $block; ?>"><?php echo $block; ?></a></a></li>
                <li class="breadcrumb-item active"><a><?php echo $project; ?></a></li>

              </ol>
            </nav>
          <?php endif; ?>

          <!-- Titel van de pagina -->
          <div class="d-sm-flex align-items-center justify-content-center mb-4">
            <h1 class="h3 text-gray-800"><?php echo $json_project->title; ?></h1>
          </div>


          <div class="text-center">

            <?php if ($_SESSION['role'] == "Child" || $_SESSION['role'] == "Developer") : ?>
              <div class="d-sm-flex justify-content-center align-items-center mb-4">
                <p class="text-primary"><?php echo $json_project->description[0]->Child ?> </p>
              </div>
            <?php endif; ?>
            <?php if ($_SESSION['role'] == "Teacher") : ?>
              <div class="d-sm-flex justify-content-center align-items-center mb-4">
                <p class="text-primary"><?php echo $json_project->description[0]->Teacher ?> </p>
              </div>
            <?php endif; ?>

            <form name="soundvalue" class="sounds-form" action="" method="post">
              <div class="row justify-content-center">
                <?php
                if ($json_project->open) {
                  for ($i = 0; $i < $json_project->availableSlots; $i++) {
                    echo "<div class='col-sm-2 text-center block-card mb-5'>
                  <a data-toggle='modal' data-target=''>
                    <div class='card bg-secondary d-sm-flex justify-content-center align-items-center shadow mb-4 dropdown show'>
                      <div class='card-body'>
                        <i class='fas fa-music suitcase'></i>
                      </div>
                    </div>
                    </a>
                    <select name='soundvalue[]' class='btn btn-secondary mdb-select md-form colorful-select dropdown-primary' onfocus='soundvalue'>
                      <option value='' selected>Kies geluid</option>";

                    for ($j = 0; $j < count($json_project->fragments); $j++) { // loop through fragments
                      echo "<option value='" . $json_project->fragments[$j]->id . "'>" . $json_project->fragments[$j]->name . "</option>";
                    }

                    echo "</select>
                  </div>";
                  }
                } else {
                  for ($i = 0; $i < $json_project->availableSlots; $i++) {
                    echo "<div class='col-sm-2 text-center block-card mb-5'>
                    <a data-toggle='modal' data-target=''>
                      <div class='card bg-secondary d-sm-flex justify-content-center align-items-center shadow mb-4 dropdown show'>
                        <div class='card-body'>
                          <i class='fas fa-music suitcase'></i>
                        </div>
                      </div>
                      </a>
                      <select name='soundvalue[]' class='btn btn-secondary soundclick md-form colorful-select dropdown-primary' onfocus='soundvalue'>
                        <option class='soundclick' value='" . $json_project->fragments[$i]->id . "' selected>" . $json_project->fragments[$i]->name . "</option>
                      </select>
                      <audio src='mp3/" . $json_project->fragments[$i]->id . ".mp3'></audio>
                    </div>";
                  }
                }
                ?>
              </div>

              <script src="vendor/jquery/jquery.min.js">
                $('.soundclick').on('click', function() {
                  $(this).siblings('audio').play();
                  console.log("playing");
                });
              </script>

              <!-- Sound upload Button trigger modal -->
              <div class="row justify-content-center">
                <button type="button" class="btn-lg btn-primary mb-4" data-toggle="modal" data-target="<?php if ($line == "") {
                                                                                                          echo "#searchingBoardModal";
                                                                                                        } else {
                                                                                                          echo "#projectUploadModal";
                                                                                                        } ?> "><i class="fas fa-play suitcase"></i> Start</button>
              </div>

              <!-- Searching a board Modal -->
              <div class="modal fade" id="searchingBoardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header d-block ">
                      <!-- <h5 class="modal-title text-center " id="exampleModalLongTitle1">Geluiden uploaden</h5> -->
                      <h5 class="modal-title text-center " id="exampleModalLongTitle2">Zoeken naar bordje</h5>
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

              <!-- Uploading project Modal -->
              <div class="modal fade" id="projectUploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header d-block ">
                      <h5 class="modal-title text-center " id="exampleModalLongTitle1">Geluiden uploaden</h5>
                      <!-- <h5 class="modal-title text-center " id="exampleModalLongTitle2">Zoeken naar bordje</h5> -->
                      <!-- <button type="button" name="submitSounds" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button> -->
                    </div>
                    <div class="modal-body ">
                      <div>Je geluiden worden geüpload naar <b><?php echo $line; ?></b></div>
                      <div>Succes!</div>
                    </div>
                    <div class="modal-footer justify-content-center">
                      <button type="button" name="stopbutton" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-stop suitcase"></i>Nee</button>
                      <button <?php if ($_SESSION['role'] == "Child" || $_SESSION['role'] == "Teacher") { ?> disabled <?php } ?> type="submit" name="submitSounds" class="btn btn-primary" data-toggle="modal" data-target="#projectUploadModal"><i class="fas fa-play"></i>Ja</button>
                      <input id="vordering" type="hidden" value="<?php echo $json_project->id  ?>" name="vordering">
                      <button disabled <?php if ($_SESSION['role'] == "Child" || $_SESSION['role'] == "Teacher") { ?> disabled style="display:none;" <?php } ?> type="submit" name="submitProject" class="btn btn-light" data-toggle="modal" data-target="#projectUploadModal"><i class="fas fa-check"></i>Afronden</button>
                    </div>
                  </div>
                </div>
              </div>

            </form>

          </div>

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
</body>

</html>