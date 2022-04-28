<?

class Connect
{
	function Variable()
    {
        $names = 'mainconn';
        return $this->$names(); 
    }

    function mainconn()
    {
		include('config.php');
		$link = mysqli_connect($host, $username, $password, $db_name);
		if (!$link) 
		{
			die('Ошибка соединения');
		}
		return $link;
    }
	  
}



?>