<?php
include("php/connect.php");
session_start();

//login path protection
if (!isset($_SESSION['username'])) {
  header("location: login.php");
}

if (!isset($_SESSION['surname'])) {
  $surname = $_GET['surname'];
}

$active_page = "dashboard";

if (isset($_POST['add-student'])) {

  $sql = "INSERT INTO users (surname, lastname, role, level, parent_id, username, password)
      VALUES ('" . $_POST["surname"] . "','" . $_POST["lastname"] . "', 'Child','" . $_POST["level"] . "','" . $_SESSION["user_id"] . "', '" . $_POST["username"] . "', '" . $_POST["password"] . "')";
  $result = mysqli_query($mysqli, $sql);
}

if (isset($_POST['edit-student'])) {
  $sql = "UPDATE users
          SET surname   = '" . $_POST["surname"] . "',
              lastname  = '" . $_POST["lastname"] . "',
              level     = '" . $_POST["level"] . "',
              username  = '" . $_POST["username"] . "',
              password  = '" . $_POST["password"] . "'
          WHERE id = " . $_POST['id'] . "";

  error_log(print_r($sql, TRUE));

  $result = mysqli_query($mysqli, $sql);
}

$sql = "SELECT * FROM users WHERE role like '%Child%'AND parent_id = " . $_SESSION['user_id'] . "";

$result = $mysqli->query($sql);
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

  <title>Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Colors
green1: #6CBFA2
green2: #6DB75C
green3: #34A937
green4: #155C2B

-->

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include("partials/sidebar.php"); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <?php if ($_SESSION['role'] == "Teacher") : ?>
          <?php include("partials/topbar.php"); ?>
        <?php endif; ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->

          <?php if ($_SESSION['role'] == "Teacher") : ?>
            <div class="d-sm-flex align-items-center justify-content-baseline mb-4">
              <h1 class="h3 text-gray-800">Dashboard</h1>
            </div>
          <?php endif; ?>

          <?php if ($_SESSION['role'] == "Child") : ?>
            <div class="modal fade" id="LaunchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header d-flex justify-content-center">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Hallo <?php echo $_SESSION['surname'] . " " . $_SESSION['lastname'] ?></h5>
                  </div>
                  <div class="modal-body">
                    <a href="projectblocks.php" class="d-flex justify-content-center btn-lg btn-primary" role="button" aria-disabled="true">Start</a>
                  </div>
                </div>
              </div>
            </div>

          <?php endif; ?>

          <?php if ($_SESSION['role'] == "Teacher") : ?>

            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Voornaam</th>
                  <th scope="col">Vordering</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (!empty($result) && $result->num_rows > 0) {
                  // output data of each row
                  $count = 1;
                  while ($row = $result->fetch_assoc()) {
                    echo
                      "<tr data-id='" . $row["id"] . "'>" .
                        "<th scope='row'>" . $count . "</th>" .
                        "<td>" . $row["surname"] . "</td>" .
                        "<td>" . "<div class='progress'><div class='progress-bar' role='progressbar' style='width: " . $row["vordering"] . "%' aria-valuenow='" . $row["vordering"]. "' aria-valuemin='0' aria-valuemax='10'></div>
                      </div>" . "</td>" .
                        "</tr>";
                    $count++;
                  }
                }
                ?>
              </tbody>
            </table>

          <?php endif; ?>

          <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

      </div>
      <!-- End of Page Wrapper -->

      <?php if ($_SESSION['role'] == "Teacher") : ?>
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Your Website 2020</span>
            </div>
          </div>
        </footer>
      <?php endif; ?>
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
        $(window).on('load', function() {
          $('#LaunchModal').modal('show');
        });
      </script>
</body>

</html>
