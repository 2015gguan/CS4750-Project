<?php
class DbUtil{
	public static $loginUser = "gzg4zf"; 
	public static $loginPass = "pizzapizza";
	public static $host = "mysql.cs.virginia.edu"; // DB Host
	public static $schema = "gzg4zf"; // DB Schema

	public static function loginConnection(){
			$db = new mysqli(DbUtil::$host, DbUtil::$loginUser, DbUtil::$loginPass, DbUtil::$schema);

			if($db->connect_errno){
					echo("Could not connect to db");
					$db->close();
					exit();
			}

			return $db;
	}

}
?>
