
<?php

	class DB
	{
		public function dbConnect () {
			$user = "14282594";
			$password = "";
			$host = "172.23.64.64";
			$db = "";
			$db = new PDO("mysql:host=".$host.";dbname=".$db, $user, $password);
			return $db;
		}
	}
