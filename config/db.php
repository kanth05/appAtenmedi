<?php

class Database{
	public static function connect(){
		$db = new mysqli('localhost:3308', 'root', '', 'atenmedi');
		$db->query("SET NAMES 'utf8'");
		if($db){echo 'conectado';}
		return $db;
	}
}


