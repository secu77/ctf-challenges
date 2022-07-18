<?php

if (!empty($_GET['debug'])) {
	highlight_file(__FILE__);
	exit();
}

foreach (glob("lib/*") as $lib) include $lib;

$error = "";
$right = false;
$movname = "";
if (!empty($_FILES)) {
	switch (Uploader::checkUploadFile($_FILES)) {
		case 0:
			$movname = md5(time()) . '.zip';
			if (!Uploader::uploadFile($_FILES['archivo'],$movname)){
				$error = 'No se ha podido subir el archivo correctamente';
			}
			break;
		case -1:
			$error = 'Sólo se permite subir un fichero a la vez';
			break;
		case -2:
			$error = 'Extension del fichero inválida (sólo se permiten zip)';
			break;
		default:
			$error = 'Error no contemplado';
	}

	if ($error==="") {
		switch (Uploader::checkSubfiles($movname)) {
			case 0:
				Uploader::extractFiles($movname);
				$right = true;
				break;
			case -1:
				$error = 'No se ha podido abrir el fichero zip';
				break;	
			case -2:
				$error = 'Detectado archivo dentro del zip que no esta permitido (sólo jpg,jpeg,png,gif)';
				break;	
			default:
				$error = 'Error no contemplado';
		}
	}
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SNASA2 Uploader</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="css/cover.css" />
	</head>
	<body class="text-center">
		<div>
      <a href="https://www.youtube.com/watch?v=NBDA21Vc-5Y" target="_blank">
				<img id="snasa" width="400" height="400" src="images/snasa.png" alt="SNASA">
      </a>
      <h5>Upload your own Playbook Tactics! (ONLY .zip files)</h5>
      <form id="form-id" enctype="multipart/form-data" action="upload.php" method="POST">
				<div class="input-group">
					<div class="input-group-prepend">
							<a href="#" onclick="document.getElementById('form-id').submit();">
								<span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
							</a>
					</div>
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="inputGroupFile01"
							aria-describedby="inputGroupFileAddon01" name="archivo">
						<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
					</div>
				</div>
      </form>
			<?php 
				if ($right) {
					echo "<div class=\"alert alert-success\">
									Se ha subido y descomprimido el Fichero <strong>correctamente!</strong>
								</div>";
				} elseif ($error!=="") {
					echo "<div class=\"alert alert-danger\">
  								<strong>Error!</strong> $error.
								</div>";
				}
			?>
		</div>
		
		<!-- /upload.php?debug=true -->
		<script src="js/jquery.slim.js"></script>
		<script src="js/boottstrap.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
