
<?php

	class DB
	{
		public static function dbConnect () {
			$user = "root";
			$password = "root";
			$host = "localhost";
			$db = "automoika";
			$db = new PDO("mysql:host=".$host.";dbname=".$db, $user, $password);
            $db->exec("set names utf8");
			return $db;
		}
	}
