<?php
include("php/connect.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // username and password sent from form
  $myusername = mysqli_real_escape_string($mysqli, $_POST['username']);
  $mypassword = mysqli_real_escape_string($mysqli, $_POST['password']);

  $sql = "SELECT * FROM users WHERE username = '$myusername' and password = '$mypassword'";
  $result = mysqli_query($mysqli, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $count = mysqli_num_rows($result);
  // If result matched $myusername and $mypassword, table row must be 1 row

  if ($count == 1) {
    // session_register("myusername");
    $_SESSION['username']  = $myusername;
    $_SESSION['role']      = $row["role"];
    $_SESSION['level']     = $row["level"];
    $_SESSION['surname']   = $row["surname"];
    $_SESSION['lastname']  = $row["lastname"];
    $_SESSION['user_id']   = $row['id'];
    header("location: index.php");
  } else {
    $error = "Your Login Name or Password is invalid";
  }
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
  <link rel = "icon" href ="img\Icon.png"  type = "image/x-icon"> 

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">

              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welkom!</h1>
                  </div>
                  <form class="user" method="POST" action="login.php">
                    <div class="form-group">
                      <input name="username" class="form-control form-control-user" id="exampleInputEmail" placeholder="Vul gebruikersnaam in...">
                    </div>
                    <div class="form-group">
                      <input name="password" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Wachtwoord">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Onthoud mij</label>
                      </div>
                    </div>
                    <button class="btn btn-primary btn-user login btn-block">
                      Log in
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Wachtwoord vergeten?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Maak account aan!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
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

</body>

</html>
