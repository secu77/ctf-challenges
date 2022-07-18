<?php

if (!empty($_GET['debug'])) {
  highlight_file(__FILE__);
  exit();
}

class Extension
{
  const SUB_FILES_EXTENSIONS = array('jpg','jpeg','png','gif');
  const FILES_EXTENSIONS = array('zip');

  public static function validExtension($extension,$group)
  {
    return in_array(strtolower($extension),$group);
  }

  public static function check($filename,$sub=false)
  {
    $info = new SplFileInfo($filename);
    if (self::validExtension(
      $info->getExtension(),
      ($sub) ? self::SUB_FILES_EXTENSIONS : self::FILES_EXTENSIONS) === false) {
      return false;
    }
    return true;
  }
}