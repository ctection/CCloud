<?PHP

echo '<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
	  <form action="userhandler.php" method="post">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Login</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			  <div class="form-group">
				<label for="loginEmail">Email address</label>
				<input type="email" name="email" class="form-control" id="loginEmail" required>
			  </div>
			  <div class="form-group">
				<label for="loginPassword">Password</label>
				<input type="password" name="password" class="form-control" id="loginPassword" required>
			  </div>
			  <div class="form-group form-check">
				<input type="checkbox" name="rememberme" value="1" class="form-check-input" id="loginRemember">
				<label class="form-check-label" for="loginRemember">Remember Me</label>
			  </div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button class="btn btn-primary">Login</button>
		  </div>
	  </form>
    </div>
  </div>
</div>';

echo '<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
	  <form action="userhandler.php" method="post">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Register</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			  <div class="form-group">
				<label for="registerEmail">Email address</label>
				<input type="email" name="email" class="form-control" id="registerEmail" required>
			  </div>
			  <div class="form-group">
				<label for="registerPassword">Password</label>
				<input type="password" name="password" class="form-control" id="registerPassword" required>
			  </div>
			  <div class="form-group">
				<label for="registerPassword2">Repeat Password</label>
				<input type="password" name="password2" class="form-control" id="registerPassword2" required>
			  </div>
			  <div class="form-group form-check">
				<input type="checkbox" name="rememberme" value="1" class="form-check-input" id="registerRemember">
				<label class="form-check-label" for="registerRemember">Remember Me</label>
			  </div>
			  <input type="hidden" name="register" value="1" />
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button class="btn btn-primary">Register</button>
		  </div>
	  </form>
    </div>
  </div>
</div>';

echo '
<script>

function openLogin(){
	$("#loginModal").modal("show");
}
function openRegister(){
	$("#registerModal").modal("show");
}

var hash = $(location).attr(\'hash\');
if(hash == "#loginModal"){
	openLogin();
}
if(hash == "#registerModal"){
	openRegister();
}

</script>
';

?>