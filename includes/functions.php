<?php

function strip_zeros_from_date( $marked_string="" ) {
  // first remove the marked zeros
  $no_zeros = str_replace('*0', '', $marked_string);
  // then remove any remaining marks
  $cleaned_string = str_replace('*', '', $no_zeros);
  return $cleaned_string;
}

function redirect_to( $location = NULL ) {
  if ($location != NULL) {
    header("Location: $location ");
    exit;
  }
}

function output_message($message="") {
  if (!empty($message)) { 
    return "<p class=\"message\">$message</p>";
  } else {
    return "";
  }
}

function encrypt($password){
  $sha1_password = sha1($password);
  return $sha1_password;
}

function video_trim($var){
  $url = $var."*";
  $trimmed = trim($url,'https://www.youtube.com/watch?v');
  $final_trimmed = trim($trimmed,'=*');
  return $final_trimmed;
}

// to auto require class if not included in the page
// undeclared object safety function
function __autoload($class_name){
  $class_name = strtolower($class_name);
  $path = LIB_PATH.DS."$class_name.php";
  if (file_exists($path)) {
    # code...
    require_once($path);
  }else{
    die("The file '$class_name'.php could not be found.<br />");
  }
}

function include_layout_template($template = ""){
  include(SITE_ROOT.DS.'public'.DS.'layouts'.DS.$template);
}

?>