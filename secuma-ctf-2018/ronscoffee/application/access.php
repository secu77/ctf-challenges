<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();
$err = '';

if (isset($_POST['email']) && isset($_POST['password'])) {

  $mysqli = new mysqli("mysql", "rons", "mylittleandsecretpenguin", "ronscoffee");

  if (mysqli_connect_errno()) {
    echo 'Error de conexión con la Base de Datos...' . PHP_EOL;
    exit();
  }

  if ($result = $mysqli->query("SELECT password FROM users WHERE email='" . $_POST['email'] ."'")) {

    $row = $result->fetch_assoc();

    if(isset($row['password'])){

      $h = substr($row['password'], 8);

      if($h===md5($_POST['password'])){

        if($_POST['email']==='admin@codetontos.ix')
          $_SESSION['id'] = 'admin';
        else
          $_SESSION['id'] = 'default';

          header('Location: mypanel.php');
          exit();

      } else {
        $err = '<div class="alert alert-danger">
                  <strong>Error!</strong> No...puedes...pasar!
                </div>';
      }
    } else {
      $err = '<div class="alert alert-danger">
                <strong>Error!</strong> No...puedes...pasar!
              </div>';
    }
    $result->free();
  } else {
    $err = '<div class="alert alert-danger">'.$mysqli->error.'</div>';
  }
  $mysqli->close();
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./favicon.ico">

    <title>Signin Template not Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action="" method="POST">
      <img class="mb-4" src="./images/jetas.svg" alt="Los Jetas" width="300" height="100">
      <h1 class="h3 mb-3 font-weight-normal">Please Login</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input name="email" type="text" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label id="checkcontent">
          <input id="checkbox" type="checkbox" value="remember-me" onclick="tocarLasPelotas()"> Remember me
        </label>
      </div>
      <?= $err ?>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
      <p class="mt-5 mb-3 text-muted">&copy; Los Zettas 2018-2019</p>
    </form>
    <script>
        function tocarLasPelotas(){
            setTimeout(function(){
                document.getElementById("checkbox").checked = false;
                document.getElementById("checkcontent").textContent = 'JAJAJAJA XD más fake que nuestros moviles';
            }, 1000);
        }
    </script>
  </body>
</html>
