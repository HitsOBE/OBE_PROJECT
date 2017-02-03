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
$sql =("SELECT po.programme_code,po.depart_code,po.po_code,po.po_outcome,workload.course_code,workload.programme_code from po,workload
  where po.faculty_code = '".$userData['faculty_code']."' AND workload.programme_code = po.programme_code
  AND workload.course_code = '".$course."'");

$retval = mysql_query( $sql);
if(! $retval )
{
  die('Could not get data: ' . mysql_error());

}
   ?>


<?php

require('WriteHTML.php');
$pdf=new PDF_HTML();
$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);

$pdf->AddPage();
$pdf->Rect(5,5,200,287,'D');
$pdf->Image("hits.jpg",80,14,50);



$pdf->SetFont('Arial','B',18);
$pdf->Cell(0,50,'PROGRAMME OUTCOMES(PEO)',0,0,'C');



$sql1 =("SELECT facultyname,department from  login where faculty_code = '".$userData['faculty_code']."'");

$retvals = mysql_query( $sql1 );
if(!$retvals )
{
  die('Could not get data: ' . mysql_error());

}

 while($row1 = mysql_fetch_array($retvals))
   {

$pdf->SetFont('Arial','B',12);
$pdf->Setx($pdf->lMargin);
$pdf->Cell(0,80,'Faculty Name:',0,0,'L');
$pdf->Setx($pdf->lMargin);
$pdf->cell(40,80,"                                  ".$row1["facultyname"],0,0,'L');

$pdf->SetFont('Arial','B',12);
$pdf->Setx($pdf->lMargin);
}
while($row = mysql_fetch_array($retval))
  {
$pdf->SetFont('Arial','B',12);
$pdf->Setx($pdf->lMargin);
$pdf->Cell(150,80,'Programe code:',0,0,'R');
$pdf->Setx($pdf->lMargin);
$pdf->cell(165,80,$row["programme_code"],0,0,'R');

$pdf->SetFont('Arial','B',12);
$pdf->Setx($pdf->lMargin);
$pdf->Cell(153,100,'                    Department code:',0,0,'C');
$pdf->Setx($pdf->lMargin);
$pdf->cell(163,100,"                                                        ".$row["depart_code"],0,0,'C');
}


$pdf->SetFont('Arial','B',12);
$pdf->Setx($pdf->lMargin);
$pdf->Cell(200,160,'Program Outcomes',0,0,'L');
"SELECT po.programme_code,po.depart_code,po.po_code,po.po_outcome,workload.course_code,workload.programme_code from po,workload
where po.faculty_code = '".$userData['faculty_code']."' AND workload.programme_code = po.programme_code
AND workload.course_code = '".$course."'");

$retval1 = mysql_query( $sql1);
while($rowq = mysql_fetch_array($retval1))
{
  $pdf->SetFont('Arial','B',12);
  $pdf->Setx($pdf->lMargin);
  $pdf->Cell(150,190,"              ".$rowq["po_code"]."-",0,0,'L');
  $pdf->Setx($pdf->lMargin);
  $pdf->cell(100,190,"                                            ".$rowq["po_outcome"],0,0,'L');
  $pdf->WriteHTML("<BR><BR>");
}

$pdf->Output();
?>
