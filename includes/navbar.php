<?PHP

if(!defined("HOME_TITLE")){
	include("./config.php");
}

echo'<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="./index.php">'.HOME_TITLE.'</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="./index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./my.php">My Cloud</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./index.php#pricing" tabindex="-1">Pricing</a>
      </li>
    </ul>
    <button onclick="openLogin()" class="btn btn-outline-secondary my-2 my-sm-0" style="margin-right: 5px;">Log In</button> <button onclick="openRegister()" class="btn btn-outline-success my-2 my-sm-0">Register</button>
  </div>
</nav>';

?>