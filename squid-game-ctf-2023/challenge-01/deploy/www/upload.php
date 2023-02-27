<?php

$message = "";
$status  = 0;

if (!empty($_FILES['squidFile']))
{
    $upload_name = bin2hex(random_bytes(16)).".php";
    $upload_filepath = "/var/www/html/files/" . $upload_name;
    
    if(move_uploaded_file($_FILES['squidFile']['tmp_name'], $upload_filepath))
    {
        $message = "File uploaded to: '" . $upload_filepath . "'";
        $status = 0;
    }
    else
    {
        $message = "Can't upload file to: '" . $upload_filepath . "'";
        $status = 1;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Squid Game CTF - Red Light, Green Light</title>
</head>
<body>
  <style>
    html {
      background: url(images/bg.jpeg) no-repeat center center fixed; 
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }

    .image_logo {
      margin:auto;
      position:absolute;
      bottom:10%;
      left:0;
      right:0;
      max-height:100%;
      max-width:100%;
    }

    .image_button {
      margin: auto;
      position: absolute;
      bottom: 9%;
      left: 0;
      right: 0;
      width: 12%;
      height: 8%;
    }

    .block_text {
      margin: auto;
      position: absolute;
      bottom: 7%;
      left: 0;
      right: 0;
      text-align: center;
    }

    .hidden_button {
        height:0px;
        overflow:hidden;
    }
  </style>

  <script>
    function uploadFile() {
      document.getElementById("squidFile").click();
    }
  </script>

  <img class="image_logo" src="images/logo2.png" alt="Logo" />

  <form id="formName" name="formName" enctype="multipart/form-data" action="upload.php" method="POST">
    <div class="hidden_button">
      <input type="file" id="squidFile" name="squidFile" onchange="form.submit()"/>
    </div>
    <img class="image_button" src="images/upload_button.png" alt="Submit" onclick="uploadFile();"/>

    <?php
    if ($message !== "")
    {
        if ($status === 0)
        {
            echo "<b><p class='block_text'><font color=green>$message</font></p></b>";
        }
        else
        {
            echo "<b><p class='block_text'><font color=red>$message</font></p></b>";
        }
    }
  ?>
  </form>
</body>
</html>