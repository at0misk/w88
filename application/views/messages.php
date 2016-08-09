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
	#logout{
		display: inline;
		float: right;
		margin-right: 2%;	
	}
	#logoutform{
		display: inline;
	}
	#messageForm{
		margin-top: 5%;
		padding: 1%;
		border: 1px solid #eee;;
	}
	#register{
		display: inline;
		float: right;
		margin-right: 2%;
	}
	.page-header{
		padding-bottom: 25px;
    	margin: 30px 0px 0px;
	}
	.page-header h2{
		display: inline;
		margin-top: 0%;
		margin-left: 2%;
	}
	.btn-danger{
		margin-top: 1%;
	}
	.red{
		color: red;
		margin-left: 5%;
	}
	.write{
		text-align: center;
	}
	.container{
		/*background: gray;*/
		border: 1px solid #eee;;
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
          <button type="button" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
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
		echo "<h2>Welcome to The Wall, " . $this->session->current['first'] . " " . $this->session->current['last'] . "</h2>";
	}
	else{
		echo "<h2>Welcome to The Wall</h2>";
	}
?>
<span class="red">
<?php
	if($this->session->flashdata('login_errors')){
		echo ($this->session->flashdata('login_errors'));
	}
?>
</span>
<?php
	if(!$this->session->current){
		echo "<button type='button' class='btn btn-default btn-md' id='register'>Register</button>";
		echo "<button type='button' class='btn btn-default btn-md' id='login'>Login</button>";
	}
	else{
		echo "<form id='logoutform' action='users/logout'>";
		echo "<button type='submit' class='btn btn-default btn-md' id='logout'>Logout</button>";
		echo "</form>";
	}
?>
	</div>
	<div class="container">
		<h1 class="write">Write a Message!</h1>
		<form id="messageForm" action='messages/new' class="form-horizontal" method="POST">
		  <div class="form-group">
    		<label class="col-sm-2" for="title">Title:</label>
    		<div class="col-sm-4">
			<input class="form-control" type="text" placeholder="Title" name="title">
			</div>
			</div>
			<div class="form-group">
			<label class="col-sm-2" for="content">Message:</label>
    		<div class="col-sm-4">
			<textarea name="content" class="form-control"></textarea>
			</div>
			</div>
			<!-- <input type="submit" value="" -->
			<button type='submit' class='btn btn-default btn-md' id='postMessage'>Submit!</button>
		</form>
<?php
	foreach($allMessages as $message){
		echo "<h3>" . $message['title'] . "</h3>";
		echo "<h4>" . $message['first'] . " " . $message['last'] . "</h4>";
		echo "<p>" . $message['content'] . "</p>";
		foreach($comments as $comment){
			if($comment['Messages_id'] == $message['id']){
				echo "<p><b>" . $comment['content'] . "</b></p>";
				echo "<p><b> - " . $comment['first'] . " " . $comment['last'] . "</b></p>";
			}
		}
		echo "<form id='commentForm" . $message['id'] . "' action='comments/new' class='form-horizontal' method='POST'>";
		echo "<div class='form-group'>";
		echo "<label class='col-sm-2' for='content'>Comment:</label>";
		echo "<div class='col-sm-4'>";
		echo "<textarea name='content' class='form-control'></textarea>";
		echo "</div>";
		echo "</div>";
		echo "<input type='hidden' name='message_id' value='" . $message['id'] . "'>";
		echo "<button type='submit' class='btn btn-default btn-md' id='postComment'>Comment!</button>";
		echo "</form>";
	}
?>
	</div>
</body>
</html>