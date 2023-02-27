<%@ Page Language="C#" %>
<%@ import Namespace="System.IO" %>
<%@ import Namespace="System.Text" %>


<script type="test" language="C#" runat="Server"> 

string bin2hex(byte[] ba)
{
  StringBuilder hex = new StringBuilder(ba.Length * 2);
  foreach (byte b in ba)
    hex.AppendFormat("{0:x2}", b);
  return hex.ToString();
}

string getRandomFilename()
{
  Random rnd = new Random();
  Byte[] ba = new Byte[16];
  rnd.NextBytes(ba);
  return bin2hex(ba);
}

protected void UploadButton_Click(object sender, EventArgs e)
{
  if(FileUploadControl.HasFile)
  {
    try
    {
      string extension = Path.GetExtension(FileUploadControl.FileName);
      if (extension == "")
        throw new Exception("uploaded file without extension");

      string random_filename = getRandomFilename();
      string upload_filepath = Server.MapPath("~/") + "files\\" + random_filename + extension;
      FileUploadControl.SaveAs(upload_filepath);
      StatusLabel.Attributes["style"] = "color:green; font-weight:bold;";
      StatusLabel.Text = "File uploaded to: '" + upload_filepath + "'";
    }
    catch(Exception ex)
    {
      StatusLabel.Attributes["style"] = "color:red; font-weight:bold;";
      StatusLabel.Text = "The file could not be uploaded. The following error occured: " + ex.Message;
    }
  }
}
</script>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Squid Game CTF - The Glass Tile</title>
</head>
<body>
  <style>
    html {
      background: url(images/bg.jpg) no-repeat center center fixed; 
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }

    .image_logo {
      margin: auto;
      position: absolute;
      bottom: 20%;
      left: 0;
      right: 0;
      max-height: 100%;
      max-width: 100%;
      width: 40%;
      height: 25%;
    }

    .image_button {
      margin: auto;
      position: absolute;
      bottom: 12%;
      left: 0;
      right: 0;
      width: 12%;
      height: 8%;
    }

    .block_text {
      margin: auto;
      position: absolute;
      bottom: 10%;
      left: 0;
      right: 0;
      text-align: center;
    }

    .hidden_button {
      height: 0px;
      overflow: hidden;
    }
  </style>

  <script>
    function loadFile() {
      document.getElementById("FileUploadControl").click();
    }
    function uploadFile() {
      document.getElementById("squidFile").click();
    }
  </script>

  <img class="image_logo" src="images/logo.png" alt="Logo" />

  <form id="form1" runat="server">
    <div class="hidden_button">
      <asp:FileUpload id="FileUploadControl" runat="server" onchange="uploadFile();" />
    <asp:Button runat="server" id="squidFile" onclick="UploadButton_Click" />
    </div>
    <img class="image_button" src="images/upload_button.png" alt="Submit" onclick="loadFile();"/>
    <br />
    <br />
    <asp:Label runat="server" id="StatusLabel" class="block_text" text="" />
  </form>
</body>
</html>
