<?php
  session_start();

  if(empty($_SESSION['id'])){
    header('Location: index.html');
    exit;
  }

  // Si estas leyendo esto eres el puto CRACK! Contacta con SECU para tus estrellas galicias.
  $flag = 'secuma18{make_sqli_great_4gain}';
  $err = 'Tienes que acceder como admin CRACK!';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./favicon.ico">

    <title>My Dashboard no Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/dashboard.css" rel="stylesheet">

    <!-- Custom icons from Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        &nbsp;&nbsp;
        <i class="fab fa-snapchat-ghost" style="color:white"></i>
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><b>Zettas</b>(<?=$_SESSION['id'];?>)</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="destroy.php">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <span data-feather="home"></span>
                  Panel <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file"></span>
                  Caja B
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="shopping-cart"></span>
                  Reventas
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="users"></span>
                  Estafados
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  Denuncias
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers"></span>
                  Plagios
                </a>
              </li>
            </ul>

            <!-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Tasks Done</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Copy Debian ISO and change name
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Create a nasty desktop env. based of XFCE
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Plug in the smoke machine
                </a>
              </li>
              <li class="nav-item">
                    <a class="nav-link" href="#">
                      <span data-feather="file-text"></span>
                      Invent that we work with the incibe
                    </a>
              </li>
              <li class="nav-item">
                    <a class="nav-link" href="#">
                      <span data-feather="file-text"></span>
                      Block @Kalrong to all social networks.
                    </a>
              </li>
            </ul> -->
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2"><i class="fas fa-grin-squint-tears"></i>&nbsp;&nbsp;Administración <strike>J</strike>Club Penguins</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary" onclick="window.open('./images/dataGraphs.ods');">Export</button>
              </div>

              <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Dropdown for Flag
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">

                        <?php
                          if($_SESSION['id'] ==='admin')
                            echo $flag;
                          else
                            echo $err;
                        ?>
                      </a>
                    </div>
              </div>
            </div>
          </div>

          <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

          <h2><i class="fas fa-envelope-square"></i>&nbsp;&nbsp;Inbox</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Nº</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Content</th>
                  <th>Read</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Security</td>
                  <td>megustalasecuridad@gmail.com</td>
                  <td>Te envio el pedido de pinguinos, espero confirmacion para la segunda parte del pago</td>
                  <td><i class="fas fa-check"></i></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Stallman</td>
                  <td>rms@fsf.org</td>
                  <td>Hijomilputas! Tienes tres dias para hacer el pago o envio a los sicarios</td>
                  <td><i class="fas fa-times"></i></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Jesusillo</td>
                  <td>holamellamojesus@gmail.com</td>
                  <td>Okey! Pasame direccion de CB para hacer la transaccion, recuerda acceder con la VPN interna para que no pase nada...</td>
                  <td><i class="fas fa-check"></i></td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>Jesusillo</td>
                  <td>holamellamojesus@gmail.com</td>
                  <td>Y que sepais que estais podiendo cometer un fallo muy grave al utilizar una distribución ya hecha y readaptandola, malamente, a vuestro gusto y vendiendola como vuestra.</td>
                  <td><i class="fas fa-times"></i></td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>Kallarongs</td>
                  <td>themenofthecave@gmail.com</td>
                  <td>Pinguinos recividos! Gracias :-)</td>
                  <td><i class="fas fa-check"></i></td>
                </tr>
                <tr>
                  <td>7</td>
                  <td>Jesusillo</td>
                  <td>holamellamojesus@gmail.com</td>
                  <td>¡¡¡¡¡¡¡¡¡¡¡SPAM ALERT!!!!!!!!!!! This message is considered SPAM and for this reason is malware. (Alert by SmapAlertv2.3 by Zrt)</td>
                  <td><i class="fas fa-times"></i></td>
                </tr>
                <tr>
                  <td>8</td>
                  <td>Jesusillo</td>
                  <td>holamellamojesus@gmail.com</td>
                  <td>Buenas, me gustaria algunas fotos de pinguinos, dicen que si contacto con usted podra consguirme buenas fotos de pinguinos</td>
                  <td><i class="fas fa-times"></i></td>
                </tr>
                <tr>
                  <td>9</td>
                  <td>Kallarongs</td>
                  <td>themenofthecave@gmail.com</td>
                  <td>Vale, todo ok</td>
                  <td><i class="fas fa-check"></i></td>
                </tr>
                <tr>
                  <td>10</td>
                  <td>Kallarongs</td>
                  <td>themenofthecave@gmail.com</td>
                  <td>Te envio el pedido de pinguinos, espero confirmacion para la segunda parte del pago</td>
                  <td><i class="fas fa-check"></i></td>
                </tr>
                <tr>
                  <td>11</td>
                  <td>tracabool</td>
                  <td>daleporcentaje27papi@gmail.com</td>
                  <td>Te envio el pedido de pinguinos, espero confirmacion para la segunda parte del pago</td>
                  <td><i class="fas fa-times"></i></td>
                </tr>
                <tr>
                  <td>12</td>
                  <td>jolozsa</td>
                  <td>lajolosa@gmail.com</td>
                  <td>Se que sólo soy un Lammer pero me gustaría que saliérais en mi canal de Youtube, ya me contestáis si eso. Gracias.</td>
                  <td><i class="fas fa-check"></i></td>
                </tr>
                <tr>
                  <td>13</td>
                  <td>S.Caparra</td>
                  <td>eltitogilipuertas@gmail.com</td>
                  <td>Te envio el pedido de pinguinos, espero confirmacion para la segunda parte del pago</td>
                  <td><i class="fas fa-check"></i></td>
                </tr>
                <tr>
                  <td>14</td>
                  <td>Romansito</td>
                  <td>thebossroman@gmail.com</td>
                  <td>Te envio el pedido de pinguinos, espero confirmacion para la segunda parte del pago</td>
                  <td><i class="fas fa-times"></i></td>
                </tr>
                <tr>
                  <td>15</td>
                  <td>Diario Naparra</td>
                  <td>naparratoday@gmail.com</td>
                  <td>Te envio el pedido de pinguinos, espero confirmacion para la segunda parte del pago</td>
                  <td><i class="fas fa-check"></i></td>
                </tr>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>window.jQuery || document.write('<script src="./js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="./js/vendor/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="./js/feather.min.js"></script>
    <script src="./js/jquery.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="./js/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            label: 'pinguins',
            data: [10000, 12300, 15400, 21000, 22243, 23765, 26000],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: true,
            position: 'bottom',
            labels: {
                fontColor: '#333'
            }
        }
        }
      });
    </script>
  </body>
</html>
