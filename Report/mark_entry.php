<?php
   Include("../database/db_conection.php");

   if(isset($SESSION['id']))
   {
     header("location:index.php");
     exit();
   }
   else
   {
     $userData = getUserData($_SESSION['id']);
   }	
/** Error reporting */
error_reporting(E_ALL);

/** Include path **/
ini_set('include_path', ini_get('include_path').';../Classes/');
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

/** PHPExcel */
include 'PHPExcel.php';

/** PHPExcel_Writer_Excel2007 */
include 'PHPExcel/Writer/Excel2007.php';
// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");

$style = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
    );

//bold settings
$objPHPExcel->getDefaultStyle()->applyFromArray($style);
$objPHPExcel->getActiveSheet()->getStyle("A1:AZ1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("A2:AZ2")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("A3:AZ3")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("A4:AZ4")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("A5:AZ5")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("A6:AZ6")->getFont()->setBold(true);

//Settings
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(false);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(false);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);

$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->mergeCells('A1:AZ1');
$objPHPExcel->getActiveSheet()->mergeCells('B2:AZ2');
$objPHPExcel->getActiveSheet()->mergeCells('A4:C4');
$objPHPExcel->getActiveSheet()->mergeCells('A5:C5');
$objPHPExcel->getActiveSheet()->mergeCells('A6:C6');
$objPHPExcel->getDefaultStyle()->applyFromArray($style);
$sqlw = mysql_query("Select * from department where depart_code = '".$userData['department']."'");
while($row = mysql_fetch_array($sqlw))
{
$objPHPExcel->getActiveSheet()->SetCellValue('A1', $row['depart_name']);
}
$sql1 = mysql_query("Select * from syllabus where course_code = '".$_GET['course']."'");
while($row = mysql_fetch_array($sql1))
{
$objPHPExcel->getActiveSheet()->SetCellValue('B2', $row['course_name'].' of semester '.$row['sem_code']);
}
$objPHPExcel->getActiveSheet()->SetCellValue('A3', 'S.NO');
$objPHPExcel->getActiveSheet()->SetCellValue('B3', 'Roll Number');
$objPHPExcel->getActiveSheet()->SetCellValue('C3', 'Name Of The Students');
$objPHPExcel->getActiveSheet()->SetCellValue('A4', 'CO');
$objPHPExcel->getActiveSheet()->SetCellValue('A5', 'BTL');
$objPHPExcel->getActiveSheet()->SetCellValue('A6', 'Max Marks');

$sql3 = mysql_query("SELECT * from qp_set where course_code = '".$_GET['course']."' order by qes_no");
$i2 = 'D';
while($row = mysql_fetch_array($sql3))
{
	$objPHPExcel->getActiveSheet()->SetCellValue($i2.'3', $row['qes_no']);
	$objPHPExcel->getActiveSheet()->SetCellValue($i2.'4', $row['co_code']);
	$objPHPExcel->getActiveSheet()->SetCellValue($i2.'5', $row['btl_code']);
	$objPHPExcel->getActiveSheet()->SetCellValue($i2.'6', $row['max_mark']);
	$i2++;
}
$sql4 = mysql_query("SELECT sum(max_mark) as sum from qp_set where course_code = '".$_GET['course']."' order by qes_no");
while($row = mysql_fetch_array($sql4))
{
	$objPHPExcel->getActiveSheet()->mergeCells($i2.'3:'.$i2.'5');
	$objPHPExcel->getActiveSheet()->SetCellValue($i2.'3', 'Total');
	$objPHPExcel->getActiveSheet()->SetCellValue($i2.'6', $row['sum']);
}
$sql2= mysql_query("SELECT * from students where course_code = '".$_GET['course']."' && assigned_".$_GET['as']." = 1");
$i1 = 7;
$it = 1;
$ce = 7;
while($row = mysql_fetch_array($sql2))
{
	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$i1, $it);
	$objPHPExcel->getActiveSheet()->SetCellValue('B'.$i1, $row['roll_number']);
	$objPHPExcel->getActiveSheet()->SetCellValue('C'.$i1, $row['name']);
	$sq8 = mysql_query("SELECT sum(marks) as sum from mark_entry where roll_no = '".$row['roll_number']."' && course_code = '".$_GET['course']."' && assesmenttype_code = '".$_GET['as']."'");
	while($row2 = mysql_fetch_array($sq8))
	{
		$objPHPExcel->getActiveSheet()->SetCellValue($i2.$ce, $row2['sum']);
		$ce++;
	}
	$i1++;
	$it++;
}
$i2++;
$sql6 = mysql_query("SELECT Distinct qes_no from mark_entry where course_code = '".$_GET['course']."' && assesmenttype_code = '".$_GET['as']."'");
$numq = mysql_num_rows($sql6);

$c = 7;
$r = 'D';
for($i = 1; $i <= $numq; $i++)
{
$sql5 = mysql_query("SELECT * from mark_entry where qes_no = 'Q".$i."' && course_code ='".$_GET['course']."' && assesmenttype_code = '".$_GET['as']."' ");
while($row = mysql_fetch_array($sql5))
{
	$objPHPExcel->getActiveSheet()->SetCellValue($r.$c, $row['marks']);
	$c++;
}
	$r++;
	$c = 7;
}
$st = mysql_num_rows($sql2);
$cell = 7+$st;
$objPHPExcel->getActiveSheet()->mergeCells('A'.$cell.':'.chr(ord($i2)-1).$cell);
$objPHPExcel->getActiveSheet()->SetCellValue('A'.$cell, 'Average CO attainment (%)');
$sq1 = mysql_query("SELECT DISTINCT co_code from qp_set where course_code = '".$_GET['course']."' && assesmenttype_code = '".$_GET['as']."' order by co_code");
while($rowa = mysql_fetch_array($sq1))
{
	$objPHPExcel->getActiveSheet()->mergeCells($i2.'3:'.chr(ord($i2)+1).'5');
	$objPHPExcel->getActiveSheet()->SetCellValue($i2.'3', $rowa['co_code']);
    $sq2 = mysql_query("SELECT sum(max_mark) as sum from qp_set where co_code = '".$rowa['co_code']."' && course_code = '".$_GET['course']."' && assesmenttype_code = '".$_GET['as']."'");
    while($row = mysql_fetch_array($sq2))
    {
    	$objPHPExcel->getActiveSheet()->SetCellValue($i2.'6', $row['sum']);
    	$objPHPExcel->getActiveSheet()->SetCellValue(chr(ord($i2)+1).'6', '100%');
    	$sq3= mysql_query("SELECT * from students where course_code = '".$_GET['course']."' && assigned_".$_GET['as']." = 1");
    	while($row2 = mysql_fetch_array($sq3))
    	{

    		$sq4 = mysql_query("SELECT sum(marks) as sum from mark_entry where roll_no = '".$row2['roll_number']."' && co_code = '".$rowa['co_code']."' && course_code = '".$_GET['course']."' && assesmenttype_code = '".$_GET['as']."'");
    		while($row3 = mysql_fetch_array($sq4))
    	{
    		 $objPHPExcel->getActiveSheet()->SetCellValue($i2.$c, $row3['sum']);
    		 $objPHPExcel->getActiveSheet()->SetCellValue(chr(ord($i2)+1).$c, $row3['sum']/$row['sum']*100);
    		 $c++;
    		}

    		$num = $c - mysql_num_rows($sq3);
    		$num1 = $c -1;
    		$objPHPExcel->getActiveSheet()->SetCellValue(chr(ord($i2)+1).$c, '=ROUNDUP(AVERAGE('.chr(ord($i2)+1).$num.':'.chr(ord($i2)+1).$num1.'),2)');
    	}
    }
	$i2=chr(ord($i2)+2);
	$c = 7;
}

$c = 7;
$sq10 = mysql_query("SELECT DISTINCT btl_code from qp_set where course_code = '".$_GET['course']."' && assesmenttype_code = '".$_GET['as']."' order by btl_code");
while($rowa = mysql_fetch_array($sq10))
{
	$objPHPExcel->getActiveSheet()->mergeCells($i2.'3:'.chr(ord($i2)+1).'5');
	$objPHPExcel->getActiveSheet()->SetCellValue($i2.'3', $rowa['btl_code']);
    $sq2 = mysql_query("SELECT sum(max_mark) as sum from qp_set where btl_code = '".$rowa['btl_code']."' && course_code = '".$_GET['course']."' && assesmenttype_code = '".$_GET['as']."'");
    while($row = mysql_fetch_array($sq2))
    {
    	$objPHPExcel->getActiveSheet()->SetCellValue($i2.'6', $row['sum']);
    	$objPHPExcel->getActiveSheet()->SetCellValue(chr(ord($i2)+1).'6', '100%');
    	$sq3= mysql_query("SELECT * from students where course_code = '".$_GET['course']."' && assigned_".$_GET['as']." = 1");
    	while($row2 = mysql_fetch_array($sq3))
    	{

    		$sq4 = mysql_query("SELECT sum(marks) as sum from mark_entry where roll_no = '".$row2['roll_number']."' && btl_code = '".$rowa['btl_code']."' && course_code = '".$_GET['course']."' && assesmenttype_code = '".$_GET['as']."'");
    		while($row3 = mysql_fetch_array($sq4))
    		{
    		 $objPHPExcel->getActiveSheet()->SetCellValue($i2.$c, $row3['sum']);
    		 $objPHPExcel->getActiveSheet()->SetCellValue(chr(ord($i2)+1).$c, $row3['sum']/$row['sum']*100);
    		 $c++;
    		}
    		$num = $c - mysql_num_rows($sq3);
    		$num1 = $c -1;
    		$objPHPExcel->getActiveSheet()->SetCellValue(chr(ord($i2)+1).$c, '=ROUNDUP(AVERAGE('.chr(ord($i2)+1).$num.':'.chr(ord($i2)+1).$num1.'),2)');
    	}
    }
	$i2=chr(ord($i2)+2);
	$c = 7;
}
$sql = mysql_query("SELECT * from mark_entry where course_code = '".$_GET['course']."' && assesmenttype_code = '".$_GET['as']."'");
if(mysql_num_rows($sql) <= 0)
{
    header("Location:../home.php?error=error");
}
// Rename sheet
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
ob_end_clean();
// We'll be outputting an excel file
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="mark_entry.xlsx"');
$objWriter->save('php://output');
exit;