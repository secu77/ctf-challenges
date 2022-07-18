<?php
session_start();
$err='';
$agents = array(
    'S@K77Vm5yGhvAuK!7cgvvX50@x8odgeR',
    '2%AX@5YmUauF1n45gu!K4%xt%!yWU15I',
    '1p4vDcaz^#s%kaQ*fGfEaDpwXRR3W@mI',
    'PVKD%VtxXt*iD6*3NUHfm4qEZeDEw66d',
    'kTCCkBbASLN0LU4*sVtAjG9Fu6lXSPEy',
    'Cy6mwJCIpCAKfB!iVf9og$!dUlV1kPmZ',
    'j%Ng2B0he0V2Q34&EiH*xD^S*%ggnAoS',
    'brbND^iHski6&iWNbD3V@dWTpn^yJV5t',
    'IFHMocVEEF^9XHV#QG7RX&AMQ52DUK8I'
);

// $_POST['agent_id'] = [];

if (isset($_POST['agent_id'])) {
    foreach ($agents as $agent) {
        if (strcmp($_POST['agent_id'],$agent) == 0) {
            $_SESSION['name'] = 'Mrs DiPierro';
            header('Location: /vault9.php');
            exit();
        }
    }

    $err = '<div class="alert alert-danger"><strong>Error!</strong> Agent IDs aren\'t equals!</div>';
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

    <title>Fbi - Agency</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action="" method="POST">
      <img class="mb-4" src="images/fbi_logo2.png" alt="Fbi" width="300" height="100">
      <h1 style="color:white" class="h4 mb-4 font-weight-normal">Introduce your Agent ID</h1>
      <label for="inputPassword" class="sr-only">agentID</label>
      <input name="agent_id" type="password" id="agentID" class="form-control" placeholder="Ex: FBI-XXXX-XXXX-XX-XXXX" required>
      <?= $err ?>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Access</button>
      <p class="mt-5 mb-3 text-muted">&copy; Fbi 2018-2019</p>
    </form>
  </body>
</html>
