<?
$host = 'localhost';
$username = 'mysql';
$password = '';
$db_name = 'sql';
$link = mysqli_connect($host, $username, $password, $db_name);
		if (!$link) 
		{
			die('Ошибка соединения');
		}