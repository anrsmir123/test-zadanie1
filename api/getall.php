<?
class getconn
{
	function json()
	{
		header('Content-Type: application/json; charset=utf-8');
		include('../config/index.php');
		$foos = new Connect();
		$funcname1 = "Variable";
		$link = $foos->$funcname1();
		
		$sql = "SELECT DISTINCT table_main.id,name_razdel ,materal, `t_name`.t_name, val3,proizv,val6,val7,val8,val9,val10,val11,val12,max_ves,val14,val15,val16,val17,val18,val19,val20,val21,val22,val23,val24,val25 FROM `table_main`,materal,max_ves,proizvod,razdel,t_name where id_razdel = razdel.id and materal.id = id_material and max_ves.id = id_max_ves and id_proizv = proizvod.id and `t_name`.id = `table_main`.t_name ORDER BY `table_main`.`id` ASC";
		if ($result = $link->query($sql))
		{
			while($obj = $result->fetch_object())
			{
				$arr[] = $obj;
			}
			echo json_encode($arr,JSON_UNESCAPED_UNICODE);
		}
	}
	function start()
	{
		if("127.0.0.1" == $_SERVER['REMOTE_ADDR'])
		{
			$names = 'json';
			$this->$names(); 
		}
	}
	
}
$foo = new getconn();
$funcname = "start";
$foo->$funcname($_GET['type']);
?>