<?php

const UPLOADS_PATH = "/var/www/html/uploads/";
const FILES_EXTENSIONS = array('jpg','jpeg','png');


/**
* Send a GET requst using cURL
* @param string $url to request
* @param array $get values to send
* @param array $options for cURL
* @return string
*/
function curl_get($url, array $get = NULL, array $options = array())
{
    if (gethostbyname(parse_url($url, PHP_URL_HOST)) === '127.0.0.1') {
        // fuck u ssrf
        return false;
    }

    $defaults = array(
        CURLOPT_URL => $url. (strpos($url, '?') === FALSE ? '?' : ''). http_build_query($get),
        CURLOPT_HEADER => 0,
        CURLOPT_FOLLOWLOCATION => TRUE,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_TIMEOUT => 5
    );

    $ch = curl_init();
    curl_setopt_array($ch, ($options + $defaults));
    if( ! $result = curl_exec($ch))
    {
        return false;
    }
    curl_close($ch);
    return $result;
} 

/**
* Check if a particular file exists in uploads path
* @param string $filename to check
* @return bool
*/
function file_exists_in_uploads($filename)
{   
    return file_exists(UPLOADS_PATH . $filename);
} 

/**
* Check if a extension is in array of valid extensions
* @param string $extension to check
* @return bool
*/
function is_a_valid_extension($extension)
{
  return in_array(strtolower($extension), FILES_EXTENSIONS);
}

/**
* Check if a file extension if valid or no
* @param string $filename to check
* @return bool
*/
function has_valid_extension($filename)
{
    $info = new SplFileInfo($filename);
    if (is_a_valid_extension($info->getExtension())) {
        return true;
    }
    return false;
}

/**
* Upload a file into uploads path
* @param string $tempfile to upload
* @param string $filename to upload
* @return bool
*/
function upload_file_to_path($tempfile, $filename)
{
    return move_uploaded_file($tempfile, UPLOADS_PATH . $filename);
}


?>
