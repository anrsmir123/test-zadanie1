<?
//include('../config/index.php');
class roulter
{
	function start($type)
	{
		//проверка IP адреса, если не совпадает с IP сервера - ошибка 400
		if("127.0.0.1" == $_SERVER['REMOTE_ADDR'])
		{
			//проверка данных и отправка на тот или иной файл с данными	
			if($type == "")
			{
				http_response_code(400);
			}
			elseif($type == "getall")
			{
				header('Content-Type: application/json; charset=utf-8');
				echo file_get_contents('http://test-zadanie/api/getall.php?bk=1');
			}
		}
		else
		{
			http_response_code(400);
		}
	}
}

$foo = new roulter();
$funcname = "start";
$foo->$funcname($_GET['type']);

?>