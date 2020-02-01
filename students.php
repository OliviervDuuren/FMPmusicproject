<?php
include("php/connect.php");
session_start();

//login path protection
if (!isset($_SESSION['username'])) {
  header("location: login.php");
}

// TODO path protection for teachers. If not teacher then redirect to previous page.
if (strtolower($_SESSION['role']) != "teacher") {
}

if (isset($_POST['add-student'])) {

  $sql = "INSERT INTO users (surname, lastname, role, level, parent_id, username, password)
      VALUES ('" . $_POST["surname"] . "','" . $_POST["lastname"] . "', 'child','" . $_POST["level"] . "','" . $_SESSION["user_id"] . "', '" . $_POST["username"] . "', '" . $_POST["password"] . "')";
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

$active_page = "leerlingen";


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

  <title>Leerlingen</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Prevent Form resubmit -->
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include("partials/sidebar.php"); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content" class="d-flex flex-column">

        <?php include("partials/topbar.php"); ?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->

        <div class="container">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-baseline mb-4">
            <h1 class="h3 mb-0 text-gray-800">Leerlingen</h1>
          </div>

          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Voornaam</th>
                <th scope="col">Achternaam</th>
                <th scope="col">Gebruikersnaam</th>
                <th scope="col">level</th>
                <th scope="col">Acties</th>
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
                      "<td>" . $row["lastname"] . "</td>" .
                      "<td>" . $row["username"] . "</td>" .
                      "<td>" . $row["level"] . "</td>" .
                      "<td>" .
                      "<a class='edit btn btn-primary btn-circle btn-sm' data-toggle='modal' data-target='#editStudentModal'><i class='fas fa-edit'></i></a>" .
                      "<a class='remove btn btn-danger btn-circle btn-sm ml-2' data-toggle='modal' data-target='#removeStudentModal'><i class='fas fa-trash'></i></a>" .
                      "</td>" .
                      "</tr>";
                  $count++;
                }
              }
              ?>
            </tbody>
          </table>

          <div class="row justify-content-center">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addStudentModal">
              <i class='fas fa-plus mr-2'></i>Voeg leerling toe
            </button>

            <!-- Add student Modal -->
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
                    <form action="students.php" method="post">
                      <div class="form-group">
                        <label for="surname">Voornaam</label>
                        <input id="surname" class="form-control form-control-user" type="text" name="surname" required>
                      </div>
                      <div class="form-group">
                        <label for="lastname">Achternaam</label>
                        <input id="lastname" class="form-control form-control-user" type="text" name="lastname" required>
                      </div>
                      <div class="form-group">

                        <label for="username">Gebruikersnaam</label>
                        <input id="username" class="form-control form-control-user" type="text" name="username" required>
                      </div>
                      <div class="form-group">

                        <label for="password">Wachtwoord</label>
                        <input id="password" class="form-control form-control-user" type="password" name="password" required>
                      </div>
                      <div class="form-group">

                        <label for="level">level</label>
                        <input id="level" class="form-control form-control-user" value="1" type="number" name="level" min="1" max="3" required>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuleer</button>
                        <button type="submit" class="btn btn-primary" name="add-student">Opslaan</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>


            <!-- edit student Modal -->
            <div class="modal fade" id="editStudentModal" tabindex="-1" role="dialog" aria-labelledby="editStudentModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editStudentModalLabel">Bewerk deze student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                      <div class="form-group">
                        <label for="edit-surname">Voornaam</label>
                        <input id="edit-surname" class="form-control form-control-user" type="text" name="surname" required>
                      </div>
                      <div class="form-group">
                        <label for="edit-lastname">Achternaam</label>
                        <input id="edit-lastname" class="form-control form-control-user" type="text" name="lastname" required>
                      </div>
                      <div class="form-group">

                        <label for="edit-username">Gebruikersnaam</label>
                        <input id="edit-username" class="form-control form-control-user" type="text" name="username" required>
                      </div>
                      <div class="form-group">

                        <label for="edit-password">Wachtwoord</label>
                        <input id="edit-password" class="form-control form-control-user" type="password" name="password" required>
                      </div>
                      <div class="form-group">

                        <label for="edit-level">level</label>
                        <input id="edit-level" class="form-control form-control-user" value="1" type="number" name="level" min="1" max="3" required>
                      </div>
                      <input id="edit-id" name='id' type="hidden">

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuleer</button>
                        <button type="submit" class="btn btn-primary" name="edit-student">Opslaan</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>


            <!-- Logout Modal-->
            <div class="modal fade" id="removeStudentModal" tabindex="-1" role="dialog" aria-labelledby="removeStudentModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="removeStudentModalLabel">Weet je zeker dat je deze student wilt verwijderen?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <!-- <div class="modal-body"></div> -->
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuleer</button>
                    <button type="submit" class="btn btn-danger" data-dismiss="modal" id="removeStudentComfirm">Verwijder</button>
                  </div>
                </div>
              </div>
            </div>

          </div>


          <!-- End of Content Wrapper -->



        </div>
        <!-- End of Page Wrapper -->
      </div>
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
      <script src="js/sb-admin-2.js"></script>

</body>

</html>
