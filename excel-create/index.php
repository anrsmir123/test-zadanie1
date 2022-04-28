<?
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// Подключаем класс для работы с excel
require_once('PHPExcel.php');
// Подключаем класс для вывода данных в формате excel
require_once('PHPExcel/Writer/Excel5.php');
$xls = new PHPExcel();
// Устанавливаем индекс активного листа
$xls->setActiveSheetIndex(0);
// Получаем активный лист
$sheet = $xls->getActiveSheet();
// Подписываем лист
$sheet->setTitle('Таблица умножения');

/*
for ($i = 2; $i < 10; $i++) {
	for ($j = 2; $j < 10; $j++) {
        // Выводим таблицу умножения
        $sheet->setCellValueByColumnAndRow(
                                          $i - 2,
                                          $j,
                                          $i . "x" .$j . "=" . ($i*$j));
	    // Применяем выравнивание
	    $sheet->getStyleByColumnAndRow($i - 2, $j)->getAlignment()->
                setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	}
}*/
$i = 1;

$mydata = file_get_contents('http://test-zadanie/api/?type=getall');
$array = json_decode($mydata, true);
foreach($array as $values)
{
	$sheet->setCellValueByColumnAndRow(0,$i, $values['id']);
	$sheet->setCellValueByColumnAndRow(1, $i, $values['name_razdel']);
	$sheet->setCellValueByColumnAndRow(2, $i, $values['materal']);
	$sheet->setCellValueByColumnAndRow(3,$i, $values['t_name']);
	$sheet->setCellValueByColumnAndRow(4, $i, $values['val3']);
	$sheet->setCellValueByColumnAndRow(5,$i, $values['proizv']);
	$sheet->setCellValueByColumnAndRow(6,$i, $values['val6']);
	$sheet->setCellValueByColumnAndRow(7,$i, $values['val7']);
	$sheet->setCellValueByColumnAndRow(8,$i, $values['val8']);
	$sheet->setCellValueByColumnAndRow(9,$i, $values['val9']);
	$sheet->setCellValueByColumnAndRow(10,$i, $values['val10']);
	$sheet->setCellValueByColumnAndRow(11,$i, $values['val11']);
	$sheet->setCellValueByColumnAndRow(12,$i, $values['val12']);
	$sheet->setCellValueByColumnAndRow(13,$i, $values['max_ves']);
	$sheet->setCellValueByColumnAndRow(14,$i, $values['val14']);
	$sheet->setCellValueByColumnAndRow(15,$i, $values['val15']);
	$sheet->setCellValueByColumnAndRow(16,$i, $values['val16']);
	$sheet->setCellValueByColumnAndRow(17,$i, $values['val17']);
	$sheet->setCellValueByColumnAndRow(18,$i, $values['val19']);
	$sheet->setCellValueByColumnAndRow(19,$i, $values['val18']);
	$sheet->setCellValueByColumnAndRow(20,$i, $values['val20']);
	$sheet->setCellValueByColumnAndRow(21,$i, $values['val21']);
	$sheet->setCellValueByColumnAndRow(22,$i, $values['val22']);
	$sheet->setCellValueByColumnAndRow(23,$i, $values['val23']);
	$sheet->setCellValueByColumnAndRow(24,$i, $values['val24']);
	$sheet->setCellValueByColumnAndRow(25,$i, $values['val25']);
	$i++;
}
// Выводим HTTP-заголовки
 header ( "Expires: Mon, 1 Apr 1974 05:00:00 GMT" );
 header ( "Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT" );
 header ( "Cache-Control: no-cache, must-revalidate" );
 header ( "Pragma: no-cache" );
 header ( "Content-type: application/vnd.ms-excel" );
 header ( "Content-Disposition: attachment; filename=matrix.xls" );

// Выводим содержимое файла
 $objWriter = new PHPExcel_Writer_Excel5($xls);
 $objWriter->save('php://output');
?>