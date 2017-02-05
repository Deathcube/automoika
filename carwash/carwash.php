<?php
	session_start();
	require ("../php/Coffee.php");
	$coffee = new Coffee();
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, user-scalable=no">
		
		<title>Coffee-Time</title>
		
		<link href="../css/bootstrap.css" rel="stylesheet">
		<link href="../css/coffee.css" rel="stylesheet">
		<link href="../css/font-awesome.css" rel="stylesheet">
		<link href="../css/animate.css" rel="stylesheet">
		<!--<link rel="shortcut icon" type="image/x-icon" href="images/s_ico.ico">-->

	</head>
	
	<body>
	
	<div id="navbtn">
		<div class="buttons" />
			<a href="../index.php"><div class="bConteiner i1">
				<i class="fa fa-home fa-3x" style="color: #4AD3AD;" aria-hidden="true"></i>
			</div></a>
			<a href="#"><div class="bConteiner i2">
				<i class="fa fa-coffee fa-3x" style="color: #4AD3AD;" aria-hidden="true"></i>
			</div></a>
			<a href="order.php"><div class="bConteiner i4">
				<i class="fa fa-shopping-cart fa-3x" style="color: #4AD3AD;" aria-hidden="true"></i>
			</div></a>
			<a href="../gears.html"><div class="bConteiner i3">
				<i class="fa fa-gear fa-3x" style="color: #4AD3AD;" aria-hidden="true"></i>
			</div></a>
			<a href="../php/ExitPage.php"><div class="bConteiner i5">
				<i class="fa fa-arrow-left fa-3x" style="color: #4AD3AD;" aria-hidden="true"></i>
			</div></a>
		</div>
		<div class="expand">
			<i class="fa fa-bars fa-3x" style="color: #4AD3AD;" aria-hidden="true"></i>
		</div>
	</div>
	<div id="navigation">
		<div class="buttons" />
			<table>
				<tr><td><div class="bConteiner i1"><a href="../index.php">
					<i class="fa fa-home fa-3x" style="color: #4ABAD3;" aria-hidden="true"></i></a>
				</div></td>
					<td><a href="../index.php"><p class="navlink" id="a1">Главная</p></a></td>
				</tr>
				<tr><td><div class="bConteiner i2"><a href="#">
					<i class="fa fa-coffee fa-3x" style="color: #4ABAD3;" aria-hidden="true"></i></a>
				</div></td>
					<td><a href="#"><p class="navlink" id="a2">Ассортимент</p></a></td>
				</tr>
				<tr><td><div class="bConteiner i4"><a href="order.php">
					<i  class="fa fa-shopping-cart fa-3x" style="color: #4ABAD3;" aria-hidden="true"></i></a>
				</div></td>
					<td><a href="order.php"><p class="navlink" id="a4">Заказ</p></a></td>
				</tr>
				<tr><td><div class="bConteiner i3"><a href="../gears.html">
					<i class="fa fa-gear fa-3x" style="color: #4ABAD3;" aria-hidden="true"></i></a>
					</div></td>
					<td><a href="../gears.html"><p class="navlink" id="a3">О нас</p></a></td>
				</tr>
				<tr><td><div id="i5" class="bConteiner i5"><a href="../php/ExitPage.php">
					<i class="fa fa-arrow-left fa-3x" style="color: #4ABAD3;"  aria-hidden="true"></i></a>
					</div></td>
					<td><a href="../php/ExitPage.php"><p class="navlink" id="a5">Выход</p></a></td>
				</tr>
			</table>
		</div>
		<div class="expand">
			<i class="fa fa-bars fa-3x" style="color: #4AD3AD;" aria-hidden="true"></i>
		</div>
	</div>
	
	<div id="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 col-sm-12 contentSpace">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 logoStripe">
					<div id="logo">
						<div id="logoLetters">
							<p> Coffee Time </p>
						</div>
					</div>
				</div>
			</div>
			<div class="row bricks">
				<div class="col-md-12 col-sm-12">
					<?php
						print_r ($coffee->getAllContent());
					?>
				</div>
			</div>
		</div>
	</div>
	
	<a class="aresize" href="order.php"><p class="subbtn" style="margin-top: 30px; margin-left: 53%;">Продолжить</p></a>
	
	<div id="yolo">
		Кофе добавлен к списку покупок!
	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<script type="text/javascript" src="../js/Wow.js"></script>
		<script src="../js/jquery.js" type="text/javascript"></script>
		<script type="text/javascript" src="../js/coffee.js"></script>
	</body>
</html>
	