<!DOCTYPE html>
<html>
<head>
	<title>Game</title>
	<style type="text/css">
		*{
			font-family: helvetica;
		}
		#container{
			margin:5% auto;
			width:805px;
		}
		#head{
			width:802px;
			height:150x;
			background-color: #75a3a3;
			color: #324e4e;
			border:2px solid #324e4e;
			padding:20px;
		}
		#body{
			width:802px;
			height:510px;
			background-color: #75a3a3;
			border:2px solid #324e4e;
			padding:20px;
		}
		#welcome{
			font-size: 32px;
		}
		.options{
		    height: 175px;
		    width: 175px;
		    display: inline-block;
		    margin: 8px;
		    border:2px solid #324e4e;
		    background-color: white;
		    text-align: center;
		    vertical-align: top;
		}
		#gameLog{
			height:250px;
			width:785px;
			border:2px solid #324e4e;
			background-color: white;
			overflow: auto;
		}
		#gold{
			width:100px;
			height:75px;
			border:2px solid #324e4e;
			margin-left:80px;
			padding:8px;
		}
		.red{
			color:red;
		}
	</style>
</head>
<body>
	<div id="container">
		<div id="head">
		<span id="welcome">Welcome to Ninja Gold, <?php echo $this->session->userdata('first') . " " . $this->session->userdata('last') . "!"; ?></span>
		<span id="gold">Your Gold: <?php echo $this->session->userdata('count'); ?></span>
		</div>
		<div id="body">
			<div class="options">
				<h3>Farm</h3>
				<p>(earns 10-20 gold)</p>
				<form method="post" action="/farm">
				<input type="submit" value="Find Gold!">
				</form>
			</div>
			<div class="options">
				<h3>Cave</h3>
				<p>(earns 5-10 gold)</p>
				<form method="post" action="/cave">
				<input type="submit" value="Find Gold!">
				</form>
			</div>
			<div class="options">
				<h3>House</h3>
				<p>(earns 2-5 gold)</p>
				<form method="post" action="/house">
				<input type="submit" value="Find Gold!">
				</form>
			</div>
			<div class="options">
				<h3>Casino</h3>
				<p>(earns/takes 0-50 gold)</p>
				<form method="post" action="/casino">
				<input type="submit" value="Find Gold!">
				</form>
			</div>
			<h4>Activities:</h4>
			<div id="gameLog">
			<?php 
			foreach ($this->session->userdata('gold') as $value) {
				echo $value;
			}; 
			?>
			</div>
		</div>
	</div>
	<?php
	foreach ($this->session->userdata('users') as $value) {
		echo $value['first_name'];
		echo $value['last_name'];
		echo "<br>";
	};
	?>
</body>
</html>