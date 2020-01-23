<?php
include("php/connect.php");
session_start();
//login path protection
if (!isset($_SESSION['username'])) {
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Leerlingen</title>

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
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">ingelogd als: <?php echo $_SESSION['role'] . "  " ?><b><?php echo $_SESSION['surname'] . " " . $_SESSION['lastname'] ?></b></span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profiel
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Instellingen
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activiteiten log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Log uit
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Leerlingen</h1>
          </div>

          <!-- Content Row -->




          <ul class="navbar-nav ml-auto">
            <?php
            $sql = "SELECT surname, level, lastname,  role FROM users WHERE role like '%Child%'";
            $result = $mysqli->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while ($row = $result->fetch_assoc()) {
                echo "<div class='row justify-content-center'><li>" . $row["surname"] . " " . $row["lastname"] . "</li><li><p></p></li>";
            ?>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown arrow">
                  <?php
                  echo "<a class='dropdown-toggle' href='#' id='levelDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> " . " level: " .  $row["level"] . "</a></p>";
                  ?>


                  <!-- Dropdown - User Information -->
                  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="levelDropdown">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#editStudentLevelModal">Level 1</button>
                    
                    <!-- Incorrect Modal -->
                    <div class="modal fade" id="editStudentLevelModal" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="addStudentModalLabel">Voeg leerling toe</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="add_student.php" method="post">
                              Voornaam:<br>
                              <input type="text" name="surname"><br>
                              Achternaam:<br>
                              <input type="text" name="lastname"><br>
                              Level:<br>
                              <input type="number" name="level" min="1" max="3"><br>


                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuleer</button>
                                <button type="submit" class="btn btn-primary" name="submit">Opslaan</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <button class="btn btn-primary" data-toggle="modal" data-target="#editStudentLevelModal">Level 2</button>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#editStudentLevelModal">Level 3</button>



                    <div class="dropdown-divider"></div>

                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="levelDropdown">
                      <form action="changelevel.php" method="post">
                        <a class="dropdown-item btn btn-primary" href="#">
                          <!--<input type="submit" name="1"/>-->Level 1 </a>
                        <a class="dropdown-item btn btn-primary" href="#">
                          <!--<input type="submit" name="2"/>-->Level 2 </a>
                        <a class="dropdown-item btn btn-primary" href="#">
                          <!--<input type="submit" name="3"/>-->Level 3 </a>
                      </form>
                      <div class="dropdown-divider"></div>

                    </div>
                </li>
            <?php
                echo "</p></div>";
              }
            } else {
              echo "0 results";
            }
            ?>

          </ul>
          <div class="row justify-content-center">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addStudentModal">
              Voeg leerling toe
            </button>
            <!-- Modal -->
            <div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="addStudentModalLabel">Voeg leerling toe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="add_student.php" method="post">
                      Voornaam:<br>
                      <input type="text" name="surname"><br>
                      Achternaam:<br>
                      <input type="text" name="lastname"><br>
                      Level:<br>
                      <input type="number" name="level" min="1" max="3"><br>


                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuleer</button>
                        <button type="submit" class="btn btn-primary" name="submit">Opslaan</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

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