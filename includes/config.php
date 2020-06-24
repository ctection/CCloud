<?PHP
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

define("MYSQL_HOST", "localhost");
define("MYSQL_DATABASE", "ccloud");
define("MYSQL_USER", "root");
define("MYSQL_PASSWORD", "");

define("HOME_TITLE", "CCloud");

define("DATA_DIRECTORY", "./data/"); //CHANGE THIS! ONLY FOR TESTING PURPOSES!! DO NOT EXPOSE IT TO THE INTERNET


$mylink = mysqli_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PASSWORD,MYSQL_DATABASE);

if(mysqli_num_rows(mysqli_query($mylink, "SHOW TABLES LIKE 'users'; "))<1){
	mysqli_query($mylink, "CREATE TABLE `users` ( `id` INT NOT NULL AUTO_INCREMENT , `email` TEXT NOT NULL , `password` TEXT NOT NULL , PRIMARY KEY (`id`));");	
}
if(mysqli_num_rows(mysqli_query($mylink, "SHOW TABLES LIKE 'data'; "))<1){
	mysqli_query($mylink, "CREATE TABLE `data` ( `id` INT NOT NULL AUTO_INCREMENT , `userid` INT NOT NULL , `name` TEXT NOT NULL , `type` TINYTEXT NOT NULL , `created_on` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `modified_on` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `located_in` INT NOT NULL , PRIMARY KEY (`id`)); ");
}

?>