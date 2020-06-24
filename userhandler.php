<?PHP

if(!defined("HOME_TITLE")){
	include("./includes/config.php");
}

if(isset($_GET["logout"])){
	unset($_SESSION["username"]);
	unset($_SESSION["password"]);	
}


if(isset($authok)){
	//INCLUDED IN SCRIPT TO CHECK AUTHENTICITY
	if(isset($_SESSION["email"]) && isset($_SESSION["password"])){
		$qr = mysqli_query($mylink, "SELECT * FROM users WHERE email = '".mysqli_real_escape_string($mylink, $_SESSION["email"])."' AND password = '".mysqli_real_escape_string($mylink, $_SESSION["password"])."'");
		if(mysqli_num_rows($qr)>0){
			$authok = 1;
		}else{
			$authok = 0;
		}
	}else{
		$authok = 0;
	}
}else{
	if(isset($_POST["register"])){
		//REGISTRATION
		if(isset($_POST["email"]) && isset($_POST["password2"]) && isset($_POST["password"])){
			if($_POST["password"] == $_POST["password2"]){
				$qr = mysqli_query($mylink, "SELECT * FROM users WHERE email = '".mysqli_real_escape_string($mylink, $_POST["email"])."' AND password = '".mysqli_real_escape_string($mylink, $_POST["password"])."'");
				if(mysqli_num_rows($qr)<1){
					$qr = mysqli_query($mylink, "INSERT INTO `users`(`email`, `password`) VALUES ('".mysqli_real_escape_string($mylink, $_POST["email"])."','".mysqli_real_escape_string($mylink, hash("whirlpool",$_POST["password"]))."')");
					$_SESSION["email"] = $_POST["email"];
					$_SESSION["password"] = hash("whirlpool",$_POST["password"]);
					mail($_POST["email"],HOME_TITLE." | Welcome","Hi,\n\nThis E-Mail is sent as a confirmation for registration on ".HOME_TITLE.". You will now be able to create, upload and manage files in your cloud.");
					echo '<meta http-equiv="refresh" content="0;URL=\'./my.php#welcome\'." />';
				}else{
					echo '<meta http-equiv="refresh" content="0;URL=\'./index.php?regerr#registerModal\'." />';
				}
			}else{
				echo '<meta http-equiv="refresh" content="0;URL=\'./index.php?regerr#registerModal\'." />';
			}
		}else{
			echo '<meta http-equiv="refresh" content="0;URL=\'./index.php?regerr#registerModal\'." />';
		}
	}else{
		//LOGIN
		if(isset($_POST["email"]) && isset($_POST["password"])){
			$qr = mysqli_query($mylink, "SELECT * FROM users WHERE email = '".mysqli_real_escape_string($mylink, $_POST["email"])."' AND password = '".mysqli_real_escape_string($mylink, hash("whirlpool",$_POST["password"]))."'");
			if(mysqli_num_rows($qr)>0){
				$_SESSION["email"] = $_POST["email"];
				$_SESSION["password"] = hash("whirlpool",$_POST["password"]);
				echo '<meta http-equiv="refresh" content="0;URL=\'./my.php#welcome\'." />';
			}else{
				echo '<meta http-equiv="refresh" content="0;URL=\'./index.php?logerr#loginModal\'." />';
			}
		}else{
			echo '<meta http-equiv="refresh" content="0;URL=\'./index.php?logerr#loginModal\'." />';
		}
	}
}

?>