<?php

require_once "functions.php";

$err = "";
$succ = "";
$opt = 0;

if (!empty($_FILES)) {

    if (sizeof($_FILES) == 1) {

        if (has_valid_extension($_FILES["inputUpload"]["name"])) {

            if (upload_file_to_path($_FILES["inputUpload"]["tmp_name"], $_FILES["inputUpload"]["name"])) {
                $succ = $_FILES["inputUpload"]["name"];
                $opt = 0;
            } else {
                $err = $_FILES["inputUpload"]["name"];
                $opt = 0;
            }
        } else {
            $err = $_FILES["inputUpload"]["name"];
            $opt = 0;
        }
    } else {
        $err = "Can't upload multiple files";
        $opt = -1;
    }    
    
} else if (!empty($_POST)) {

    if (!empty($_POST['inputWeb']) && !empty($_POST['inputFile'])) {
        $err = "Can't do two actions at same time!";
        $opt = -1;
    } else if (!empty($_POST['inputWeb'])) {

        $res = curl_get($_POST['inputWeb'], array(), array());
        if ($res !== false) {
            $succ = htmlentities($res);
        } else {
            $err = $_POST['inputWeb'];
        }
        $opt = 1;

    } else if (!empty($_POST['inputFile'])) {
        if (file_exists_in_uploads($_POST['inputFile'])) {
            $succ = UPLOADS_PATH . $_POST['inputFile'];
        } else {
            $err = UPLOADS_PATH . $_POST['inputFile'];
        }
        $opt = 2;
    }
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Internal Fancy Devs Admin</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="css/cover.css" />
	</head>
	<body class="text-center">

		<div>
            <br>
            <a href="https://www.youtube.com/watch?v=hk9NxydtPOU" target="_blank">
				<img class="rounded" id="fancy" width="300" height="300" src="images/fancydevs.png" alt="FancyDevs">
            </a>
            <br>
            <br>

            <div class="btn-group" role="group" aria-label="...">
                <button type="button" class="btn btn-default" onclick="setFocus('uploads-block')">Upload File</button>
                <button type="button" class="btn btn-default" onclick="setFocus('web-check-block')">Check Website</button>
                <button type="button" class="btn btn-default" onclick="setFocus('file-check-block')">Check File</button>
                <!--<button type="button" class="btn btn-default" disabled>Ping Server</button>-->
                <button type="button" class="btn btn-default" disabled>Load Library</button>
                <button type="button" class="btn btn-default" disabled>Download Files</button>
            </div>
            <br>
            <br>
            <br>
            <br>

            <!-- Uploads Block -->
            <div id="uploads-block" style="display:none">
                <h5>Upload a File</h5>
                <form id="upload-form-id" enctype="multipart/form-data" action="admin.php" method="POST">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                    <a href="#" onclick="document.getElementById('upload-form-id').submit();">
                                        <span class="input-group-text" id="inputGroupFileAddon">Upload</span>
                                    </a>
                            </div>
                            <div class="custom-file">
                                <input name="inputUpload" type="file" class="custom-file-input" id="inputGroupFile"
                                    aria-describedby="inputGroupFileAddon" name="archivo">
                                <label class="custom-file-label" for="inputGroupFile">Choose file</label>
                            </div>
                        </div>
                </form>
            </div>

            <!-- Web Check Block -->
            <div id="web-check-block" style="display:none">
                <h5>Check Website Status</h5>
                <form id="web-form-id" action="admin.php" method="POST">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                    <a href="#" onclick="document.getElementById('web-form-id').submit();">
                                        <span class="input-group-text" id="inputGroupWeb01">Check</span>
                                    </a>
                            </div>
                            <div class="custom-file">
                                <input name="inputWeb" type="text" id="inputGroupWeb" class="form-control" placeholder="Website to check. Example: https://bitupalicate.com" aria-label="Website to check" aria-describedby="basic-addon2">
                            </div>
                        </div>
                </form>
            </div>
            
            <!--File Check Block -->
            <div id="file-check-block" style="display:none">
                <h5>Check If File Exists</h5>
                <form id="file-form-id" action="admin.php" method="POST">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                    <a href="#" onclick="document.getElementById('file-form-id').submit();">
                                        <span class="input-group-text" id="inputGroupFile01">Check</span>
                                    </a>
                            </div>
                            <div class="custom-file">
                                <input name="inputFile" type="text" id="inputGroupFile01" class="form-control" placeholder="File to check. Example: myimage.png" aria-label="File to check" aria-describedby="basic-addon2">
                            </div>
                        </div>
                </form>
            </div>

            <?php 

            switch ($opt) {
                case 0:
                    if ($succ!=="") {
                        echo "<div class=\"alert alert-success\">The <strong>$succ</strong> file has been uploaded successfully!</div>";
                    } elseif ($err!=="") {
                        echo "<div class=\"alert alert-danger\">The file <strong>$err</strong> could not be uploaded!</div>";
                    }
                    break;
                case 1:
                    if ($succ!=="") {
                        echo "<div class=\"alert alert-success\">The URL responded with: <br>$succ</div>";
                    } elseif ($err!=="") {
                        echo "<div class=\"alert alert-danger\">The URL <strong>$err</strong> is not active!</div>";
                    }
                    break;  
                case 2:
                    if ($succ!=="") {
                        echo "<div class=\"alert alert-success\">The <strong>$succ</strong> file exists!</div>";
                    } elseif ($err!=="") {
                        echo "<div class=\"alert alert-danger\">The <strong>$err</strong> file does not exist!</div>";
                    }
                    break;  
                default:
                    if ($succ!=="") {
                        echo "<div class=\"alert alert-success\">$succ</div>";
                    } elseif ($err!=="") {
                        echo "<div class=\"alert alert-danger\">$err</div>";
                    }
                    break;
            }
            ?>

		</div>
		
        <script>
            function setFocus(id) {
                document.getElementById("uploads-block").style.display = "none";
                document.getElementById("web-check-block").style.display = "none";
                document.getElementById("file-check-block").style.display = "none";
                document.getElementById(id).style.display = "block";
            } 
        </script>
		<script src="js/jquery.slim.js"></script>
		<script src="js/boottstrap.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
