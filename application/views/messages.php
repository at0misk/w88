<!DOCTYPE html>
<html>
<head>
	<title>The Wall</title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script  src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
	$(document).ready(function(){
	    $("#login").click(function(){
	        $("#loginModal").modal();
	    });
	    $("#register").click(function(){
	        $("#regModal").modal();
	    });
	});
</script>
<style>
	#login{
		display: inline;
		float: right;
		margin-right: 2%;
	}
	#register{
		display: inline;
		float: right;
		margin-right: 2%;
	}
	.page-header{
		padding-bottom: 25px;
    	margin: 30px 0 20px;
	}
	.page-header h2{
		display: inline;
		margin-top: 0%;
		margin-left: 2%;
	}
	.btn-danger{
		margin-top: 1%;
	}
</style>
</head>
<body>
	<div class="modal fade" id="loginModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="users/login">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" id="usrname" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" id="psw" placeholder="Enter password" name="password">
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
              <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          <p>Not a member? <a href="#">Sign Up</a></p>
          <p>Forgot <a href="#">Password?</a></p>
        </div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="regModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Register</h4>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="users/register">
            <div class="form-group">
              <label for="fn"><span class="glyphicon glyphicon-eye-open"></span> First Name</label>
              <input type="text" class="form-control" id="fn" placeholder="Enter first name" name="first">
            </div>
            <div class="form-group">
              <label for="ln"><span class="glyphicon glyphicon-eye-open"></span> Last Name</label>
              <input type="text" class="form-control" id="ln" placeholder="Enter last name" name="last">
            </div>
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Email</label>
              <input type="text" class="form-control" id="usrname" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" id="psw" placeholder="Enter password" name="password">
            </div>
              <button type="submit" class="btn btn-success btn-md"><span class="glyphicon glyphicon-off"></span> Register</button>
          </form>
          <button class="btn btn-danger btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
        </div>
        <!-- <div class="modal-footer"> -->
<!--           <p>Not a member? <a href="#">Sign Up</a></p>
          <p>Forgot <a href="#">Password?</a></p> -->
        <!-- </div> -->
			</div>
		</div>
	</div>
	<div class="page-header">
<?php
	if($this->session->current){
		// echo $x;
		echo "<h2>Welcome to The Wall, " . $this->session->current['first'] . " " . $this->session->current['last'];
	}
	else{
		echo "<h2>Welcome to The Wall</h2>";
	}
?>
	<button type="button" class="btn btn-default btn-md" id="register">Register</button>
	<button type="button" class="btn btn-default btn-md" id="login">Login</button>
	</div>
<?php
	if($this->session->flashdata('login_errors')){
		echo ($this->session->flashdata('login_errors'));
	}
?>
</body>
</html>