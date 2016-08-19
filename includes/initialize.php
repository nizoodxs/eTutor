<?php 

//  to define the core paths
//  define them as absolute path so that require_once works

// directory seperator 
//  (\ for windows / for linux)
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null :
	define('SITE_ROOT', 'C:'.DS.'xampp'.DS.'htdocs'.DS.'eTutor');

defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'includes');


// first load config - basic functions - core objects(database and session) - database-related classes
require_once(LIB_PATH.DS."config.php");

require_once(LIB_PATH.DS."functions.php");

require_once(LIB_PATH.DS."database.php");
require_once(LIB_PATH.DS."database_object.php");
require_once(LIB_PATH.DS."pagination.php");
require_once(LIB_PATH.DS."session.php");

require_once(LIB_PATH.DS."user.php");
require_once(LIB_PATH.DS."course.php");
require_once(LIB_PATH.DS."lesson.php");
require_once(LIB_PATH.DS."chapter.php");
 
 ?>