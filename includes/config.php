<?PHP
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

define("MYSQL_HOST", "localhost");
define("MYSQL_DATABASE", "ccloud");
define("MYSQL_USER", "pma");
define("MYSQL_PASSWORD", "");

define("HOME_TITLE", "CCloud");





?>