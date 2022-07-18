<?php

if (!empty($_GET['debug'])) {
  highlight_file(__FILE__);
  exit();
}

class Uploader
{
  const FILE_PATH = "./uploads/";
  const UPLOADS_PATH = "./tmp/";
  const MAX_FILES = 10;
  
  public static function checkUploadFile($files)
  {
    if (sizeof($files)!==1) {
      return -1;
    }
    if (!Extension::check($files['archivo']['name'])) {
      return -2;
    }
    return 0;
  }

  public static function uploadFile($file,$movname)
  {
    return move_uploaded_file($file['tmp_name'], self::UPLOADS_PATH . $movname);
  }

  public static function checkSubfiles($movname)
  {
    $zip = new ZipArchive;
    if ($zip->open(self::UPLOADS_PATH . $movname) !== true) {
      return -1;
    }
    for($i = 0; $i < $zip->numFiles; $i++) {
      $filename = $zip->getNameIndex($i);
      if (!Extension::check($filename,true)) {
        $zip->close();
        return -2;
      }
    }                  
    $zip->close();
    return 0;
  }

  public static function extractFiles($movname)
  {
    $zip = new ZipArchive;
    $zip->open(self::UPLOADS_PATH . $movname);
    for($i = 0; $i < $zip->numFiles; $i++) {
      $filename = $zip->getNameIndex($i);
      copy("zip://" . self::UPLOADS_PATH . $movname . "#" . $filename, self::FILE_PATH . $filename);
    }                  
    $zip->close();
    return;
  }
}