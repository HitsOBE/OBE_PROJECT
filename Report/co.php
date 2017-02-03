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
$course = $_GET['course'];
$sql =("SELECT faculty_code,co_outcome,course_code,co_range,programme_code,depart_code from co  where faculty_code = '".$userData['faculty_code']."' AND course_code = '".$course."'");

$retval = mysql_query( $sql);
if(! $retval )
{
  die('Could not get data: ' . mysql_error());

}

 while($row = mysql_fetch_array($retval))
   {

   ?>

<?php

require('WriteHTML.php');

$pdf=new PDF_HTML();

$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);

$pdf->AddPage();
$pdf->Rect(5,5,200,287,'D');
$pdf->Image("hits.jpg",80,14,50);



$pdf->SetFont('Arial','B',17);
$pdf->Cell(0,50,'COURSE OUTCOMES',0,0,'C');


$pdf->SetFont('Arial','B',12);
$pdf->Setx($pdf->lMargin);
$pdf->Cell(0,120,'Course code:',0,0,'L');

$pdf->Setx($pdf->lMargin);
$pdf->cell(45,120,"                                 ".$row["course_code"],0,0,'L');


$pdf->SetFont('Arial','B',12);
$pdf->Setx($pdf->lMargin);
$pdf->Cell(150,80,'Programe code:',0,0,'R');
$pdf->Setx($pdf->lMargin);
$pdf->cell(165,80,"                                    ".$row["programme_code"],0,0,'R');

$pdf->SetFont('Arial','B',12);
$pdf->Setx($pdf->lMargin);
$pdf->Cell(153,100,'Department code:',0,0,'R');
$pdf->Setx($pdf->lMargin);
$pdf->cell(163,100,$row["depart_code"],0,0,'R');
$pdf->SetFont('Arial','B',12);




$pdf->SetFont('Arial','B',12);


$pdf->Setx($pdf->lMargin);
$sql1 =("SELECT facultyname,department from  login where faculty_code = '".$userData['faculty_code']."'");

mysql_select_db('Hits_events');

$retvals = mysql_query( $sql1 );
if(!$retvals )
{
  die('Could not get data: ' . mysql_error());

}

 while($row1 = mysql_fetch_array($retvals))
   {

$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,80,'Faculty Name:',0,0,'L');
$pdf->Setx($pdf->lMargin);
$pdf->cell(40,80,"                                 ".$row1["facultyname"],0,0,'L');

$pdf->SetFont('Arial','B',12);
$pdf->Setx($pdf->lMargin);
$pdf->Cell(0,100,'Department:',0,0,'L');
$pdf->Setx($pdf->lMargin);
$pdf->cell(35,100,"                                 ".$row1["department"],0,0,'L');
$pdf->SetFont('Arial','B',10);

}

$pdf->SetFont('Arial','B',15);
$pdf->Setx($pdf->lMargin);
$pdf->Cell(0,170,'course outcomes:-',0,0,'L');

$sql1 =("SELECT faculty_code,co_outcome,course_code,co_range,programme_code,depart_code from co  where faculty_code = '".$userData['faculty_code']."' AND course_code = '".$course."'");

$retval1 = mysql_query( $sql1);
while($rowq = mysql_fetch_array($retval1))
{

  $pdf->SetFont('Arial','B',12);
$pdf->Setx($pdf->lMargin);
$pdf->Cell(150,200,"            ".$rowq["co_range"]."            -",0,0,'L');
$pdf->Setx($pdf->lMargin);
$pdf->cell(100,200,"                                            ".$rowq["co_outcome"],0,0,'L');
$pdf->WriteHTML("<BR><BR>");
}


$pdf->Output();


}

?>
