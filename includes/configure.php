<?php
/**
 * @package Configuration Settings circa 1.5.1
 * @copyright Copyright 2003-2012 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * File Built by zc_install on 2013-02-21 06:42:39
 */


/*************** NOTE: This file is similar, but DIFFERENT from the "admin" version of configure.php. ***********/
/***************       The 2 files should be kept separate and not used to overwrite each other.      ***********/

// Define the webserver and path parameters
  // HTTP_SERVER is your Main webserver: eg-http://www.your_domain.com
  // HTTPS_SERVER is your Secure webserver: eg-https://www.your_domain.com
  // define('HTTP_SERVER', 'http://jack-sea.net');
  // define('HTTPS_SERVER', 'https://jack-sea.net');

  // Use secure webserver for checkout procedure?

 //define ('STRICT_ERROR_REPORTING', true);

  define('ENABLE_SSL', 'false');

// NOTE: be sure to leave the trailing '/' at the end of these lines if you make changes!
// * DIR_WS_* = Webserver directories (virtual/URL)
  // these paths are relative to top of your webspace ... (ie: under the public_html or httpdocs folder)
  define('DIR_WS_CATALOG', '/');
  define('DIR_WS_HTTPS_CATALOG', '/');

  define('DIR_WS_IMAGES', 'images/');
  define('DIR_WS_INCLUDES', 'includes/');
  define('DIR_WS_FUNCTIONS', DIR_WS_INCLUDES . 'functions/');
  define('DIR_WS_CLASSES', DIR_WS_INCLUDES . 'classes/');
  define('DIR_WS_MODULES', DIR_WS_INCLUDES . 'modules/');
  define('DIR_WS_LANGUAGES', DIR_WS_INCLUDES . 'languages/');
  define('DIR_WS_DOWNLOAD_PUBLIC', DIR_WS_CATALOG . 'pub/');
  define('DIR_WS_TEMPLATES', DIR_WS_INCLUDES . 'templates/');

  define('DIR_WS_PHPBB', '/');

// * DIR_FS_* = Filesystem directories (local/physical)

if ($_SERVER['SERVER_NAME'] == '127.0.0.1') {
    define('DB_TYPE', 'mysql');
    define('DB_PREFIX', '');
    define('DB_CHARSET', 'utf8');
    define('DB_SERVER', 'localhost');
    define('DB_SERVER_USERNAME', 'root');
    define('DB_SERVER_PASSWORD', '');
    define('DB_DATABASE', 'vizio');
    define('HTTP_SERVER', 'http://127.0.0.1/tbi');
    define('HTTPS_SERVER', 'https://127.0.0.1/tbi');
    //the following path is a COMPLETE path to your Zen Cart files. eg: /var/www/vhost/accountname/public_html/store/
    define('DIR_FS_CATALOG', 'e:/easylamps/sites/zencartvizio/');
    //the following path is a COMPLETE path to the /logs/ folder  eg: /var/www/vhost/accountname/public_html/store/logs ... and no trailing slash
    define('DIR_FS_LOGS', 'e:/easylamps/sites/zencartvizio/logs');
    define('DIR_FS_SQL_CACHE', 'e:/easylamps/sites/zencartvizio/cache');
  } else {
    define('DB_TYPE', 'mysql');
    define('DB_PREFIX', '');
    define('DB_CHARSET', 'utf8');
    define('DB_SERVER', '10.0.208.26');
    define('DB_SERVER_USERNAME', 'root');
    define('DB_SERVER_PASSWORD', 'abidjan');
    define('DB_DATABASE', 'vizio');
    define('HTTP_SERVER', 'http://jack-sea.net');
    define('HTTPS_SERVER', 'https://jack-sea.net');
    //the following path is a COMPLETE path to your Zen Cart files. eg: /var/www/vhost/accountname/public_html/store/
    define('DIR_FS_CATALOG', '/homez.548/tsrinfor/www/zencartvizio/');
    //the following path is a COMPLETE path to the /logs/ folder  eg: /var/www/vhost/accountname/public_html/store/logs ... and no trailing slash
    define('DIR_FS_LOGS', '/homez.548/tsrinfor/www/zencartvizio/logs');
  define('DIR_FS_SQL_CACHE', '/homez.548/tsrinfor/www/zencartvizio/cache');
  }


  define('DIR_FS_DOWNLOAD', DIR_FS_CATALOG . 'download/');
  define('DIR_FS_DOWNLOAD_PUBLIC', DIR_FS_CATALOG . 'pub/');
  define('DIR_WS_UPLOADS', DIR_WS_IMAGES . 'uploads/');
  define('DIR_FS_UPLOADS', DIR_FS_CATALOG . DIR_WS_UPLOADS);
  define('DIR_FS_EMAIL_TEMPLATES', DIR_FS_CATALOG . 'email/');
  // The next 2 "defines" are for SQL cache support.
  // For SQL_CACHE_METHOD, you can select from:  none, database, or file
  // If you choose "file", then you need to set the DIR_FS_SQL_CACHE to a directory where your apache
  // or webserver user has write privileges (chmod 666 or 777). We recommend using the "cache" folder inside the Zen Cart folder
  // ie: /path/to/your/webspace/public_html/zen/cache   -- leave no trailing slash
  define('SQL_CACHE_METHOD', 'none');
  define('DIR_FS_SQL_CACHE', '/homez.548/tsrinfor/www/zencartvizio/cache');

// EOF
