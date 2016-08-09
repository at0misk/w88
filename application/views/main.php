<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<style type="text/css">
		*{
			font-family: helvetica;
		}
		h3{
			text-align: center;
		}
		#container{
			margin:10% auto;
			width:800px;
			height:600px;
		}
		#reg{
			width:350px;
			height:350px;
			border:1px solid silver;
			display: inline-block;
			vertical-align: top;
			padding:20px;
			text-align: right;
		}
		#log{
			width:300px;
			height:350px;
			border:1px solid silver;
			display: inline-block;
			padding:20px;
			text-align: right;
		}
		form{
			margin-bottom:10px;
		}
		.green{
			color:green;
		}
		.red{
			color:red;
		}
		#errors{
			height:auto;
			width:300px;
			text-align: center;
			display: inline-block;
		}
		#errorsL{
			height:auto;
			width:300px;
			text-align: center;
			display: inline-block;
			vertical-align: top;
			margin-left:100px;
		}
	</style>
</head>
<body>
	<div id="container">
		<div id="reg">
		<h3>Register</h3>
		<form method="post" action="main/register">
		<p>First Name:<input type="text" name="first"></p>
		<p>Last Name:<input type="text" name="last"></p>
		<p>Email:<input type="text" name="email"></p>
		<p>Password:<input type="password" name="password"></p>
		<p>Confirm Password:<input type="password" name="confpassword"></p>	
		<input type="submit" value="Register">
		</form> 
		<?php echo "<span class='green'>" . $this->session->userdata('added') . "</span>"; ?>
		</div>
		<div id="log">
		<h3>Login</h3>
		<form method="post" action="main/login">
		<p>Email:<input type="text" name="email"></p>
		<p>Password:<input type="password" name="password"></p>
		<input type="submit" value="Login">
		</form>
		</div>
		<div id="errors">
		<?php echo "<span class='red'>" . $this->session->userdata('errors') . "</span>"; ?>
		</div>
		<div id="errorsL">
		<?php echo "<span class='red'>" . $this->session->userdata('errorsL') . "<br>" . $this->session->userdata('nouser') . "</span>"; ?>
		</div>
	</div>
</body>
</html>