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
			<a href="../index.php"><div class="bConteiner">
				<i class="fa fa-home fa-3x" style="color: #4AD3AD;" aria-hidden="true"></i>
			</div></a>
			<a href="#"><div class="bConteiner na">
				<i class="fa fa-coffee fa-3x" style="color: #4AD3AD;" aria-hidden="true"></i>
			</div></a>
			<a href="#"><div class="bConteiner">
				<i class="fa fa-gear fa-3x" style="color: #4AD3AD;" aria-hidden="true"></i>
			</div></a>
			<a href="#"><div class="bConteiner">
				<i class="fa fa-shopping-cart fa-3x" style="color: #4AD3AD;" aria-hidden="true"></i>
			</div></a>
		</div>
		<div class="expand">
			<i class="fa fa-bars fa-3x" style="color: #4AD3AD;" aria-hidden="true"></i>
		</div>
	</div>
	<div id="navigation">
		<div class="buttons" />
			<table>
				<tr><td><div id="i1" class="bConteiner">
					<i class="fa fa-home fa-3x" style="color: #4ABAD3;" aria-hidden="true"></i>
				</div></td>
					<td><a href="../index.php"><p class="navlink" id="a1">Главная</p></a></td>
				</tr>
				<tr><td><div id="i2" class="bConteiner">
					<i class="fa fa-coffee fa-3x" style="color: #4ABAD3;" aria-hidden="true"></i>
				</div></td>
					<td><a href=""><p class="navlink na" id="a2">Ассортимент</p></a></td>
				</tr>
				<tr><td><div id="i3" class="bConteiner">
					<i class="fa fa-gear fa-3x" style="color: #4ABAD3;" aria-hidden="true"></i>
				</div></td>
					<td><a href="#"><p class="navlink" id="a3">О нас</p></a></td>
				</tr>
				<tr><td><div id="i4" class="bConteiner">
					<i class="fa fa-shopping-cart fa-3x" style="color: #4ABAD3;" aria-hidden="true"></i>
				</div></td>
					<td><a href="#"><p class="navlink" id="a4" >Заказ</p></a></td>
				</tr>
			</table>
		</div>
		<div class="expand">
			<i class="fa fa-bars fa-3x" style="color: #4AD3AD;" aria-hidden="true"></i>
		</div>
	</div>
	
	<div id="profile">
		<div id="addPerson">
			<div class="hp">
				<p>Оставьте свои данные и мы доставим горячий кофе прямо к вашим дверям</p>
			</div>
			<div class="cp">
				<form name="mform" action="../php/addUser.php" method="POST">
					<p class="sf">
						Имя:
						<input id="name" class="pf" name="firstName" type="text" required />
					</p>
					<p class="sf sfs">
						Фамилия:
						<input id="sername" class="pf" name="lastName" type="text" required />
					</p>
					<p class="sf sfa">
						Адрес:
						<input id="adress" class="pf" name="address" type="text" required />
					</p>
					
					<center><input type="submit" style="color: black;" value="Продолжить" class="subbtn" /></center>
				</form>
			</div>
		</div>
	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<script type="text/javascript" src="../js/Wow.js"></script>
		<script src="../js/jquery.js" type="text/javascript"></script>
		<script type="text/javascript" src="../js/coffee.js"></script>
	</body>
</html>