<?php

function randomString() {

	return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 10, 10);

}



if (!function_exists("getUsers")) {
	// code...
	function getUsers() {
		// code...
		$db = \Config\Database::connect();

		// $result = $db->query("select * from users")->getResult();

		// For Query Builder
		$builder = $db->table('users');
		$row = $builder->get()->getResult();

		return $row;
	}
}