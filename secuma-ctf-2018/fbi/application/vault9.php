<?php
session_start();

if(!isset($_SESSION['name'])) {
    header('Location: /');
    exit();
}

$message = '';
if(isset($_SESSION['name']) && isset($_POST['url'])){
    $output = shell_exec(escapeshellcmd('curl '. $_POST['url']));
    $message .= trim($output);
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>Fbi - Vault9</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
  <form class="form-signin" action="" method="POST" style="max-width: 600px;color:black">
        <!-- <img class="mb-4 mx-auto d-block" src="images/login.png" alt="Vault9" width="100px"> -->
        <center><h3 class="h4 mb-3 font-weight-normal" style="color:black"><strong>Welcome <?=$_SESSION['name']?></strong></h3></center><br>
        <label>Introduce target to comunicate with the rat:</label>
        <input name="url" type="text" class="form-control" placeholder="51.15.123.90" required><br>
        <div class="form-group">
            <label for="comment">Results:</label>
            <textarea class="form-control" style="background-color:black;color:green" rows="5" id="comment" readonly><?=$message?></textarea>
        </div><br>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Access</button><br>
        <center><p class="mt-5 mb-3 text-muted">&copy; Fbi 2018-2019</p></center>
    </form>
  </body>
</html>
