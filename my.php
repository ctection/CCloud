<?PHP
include("./includes/config.php");

$authok = 0;
include("./userhandler.php");

?>
<!DOCTYPE html>
<html>
	<head>
		<?PHP include("./includes/bootstrap.php");?>
		<title><?PHP echo HOME_TITLE;?> | My Cloud</title>
	</head>
	<body>
		
		<?PHP include("./includes/navbar.php");?>
		
		<div class="container">
			<div class="jumbotron jumbotron-fluid">
			  <div class="container">
				<h1 class="display-4">Welcome to your <?PHP echo HOME_TITLE;?></h1>
				<hr>
				<p class="lead"></p>
			  </div>
			</div>
			
			<div class="btn-group" role="group">
				<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
				  Create
				</button>
				<div class="dropdown-menu">
				  <a class="dropdown-item" href="#">Create Folder</a>
				  <a class="dropdown-item" href="#">Upload File</a>
				</div>
			  </div>
			
			<div style="margin: 20px;"></div>
			
			<?PHP
			
			$i = -1;
			if(isset($_GET["i"])){
				$i = filter_var($_GET["i"],FILTER_SANITIZE_NUMBER_INT);
			}
			
			echo '<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">';
			if($i == -1){
				echo '<li class="breadcrumb-item active" aria-current="page">Home</li>';
			}
			echo '</ol>
			</nav>';
			
			
			
			echo '<ul class="list-unstyled">';
			
			$in_dir = mysqli_query($mylink, "SELECT * FROM data WHERE located_in='".mysqli_real_escape_string($mylink, $i)."'");
			
			if(mysqli_num_rows($in_dir)>0){
				for($i=0;$i<mysqli_num_rows($in_dir);$i++){
					$data = mysqli_fetch_array($in_dir);
					echo '<li class="media">
						<img src="..." class="mr-3" alt="...">
						<div class="media-body">
						  <h5 class="mt-0 mb-1">'.$data["name"].'</h5>
						  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
						</div>
					  </li>';
				}
				
			}else{
				echo '<li class="media">
						<div class="media-body">
						  <h5 class="mt-0 mb-1">Nothing to see here...</h5>
						  Nothing has been added yet. Try creating or uploading a file.
						</div>
					  </li>';
			}
			echo '</ul>';
			
			
			?>
			
			
		</div>
	</body>
</html>