<html>
<style>
#container
{
border:3px SOLID #D3D3D3;
margin:auto;
width:960px;
}
#blo
{
 margin:auto;
 padding:20px;
 width:480px;
 border:0px solid #D9D9D9;
}
input 
{
width:220px;
height:30px;

}
#sleft
{

width:50%px;
}
#sright
{

width:50%;
}
#sub
{
height:40px;

margin-left:150px;
background-color:orange;
font-weight:bold;
font-size:15px;

}
#test
{
width:480px;border:0px solid blue;
margin:auto;
float:left;
}
#test tr td 
{
border:0px solid red;
font-weight:bold;
}
</style>
<div id="container">
<CENTER><h3>HINDUSTAN GROUP OF INSTITUTIONS</H3>
<STRONG> <U> PERSONAL INFORMATION FORM (for Teaching post) </U></STRONG>
</CENTER>



<form action="ya.php" method="post" enctype="multipart/form-data">

<div id="blo">
<table style="border:none;">

<input type="file" name="up">
<tr>
<td>Post Applied for</td><td><select name="post"><option>Dean</option>
<option>Senior Professor</option>
<option>Professor</option>
<option>Associate Professor</option>
<option>Asst Professor .(SG)</option>
<option>Asst Professor .(SS)</option>
<option>AP</option>
<option>Part time faculty(3 days / week)</option>
<option>Visiting Faculty on hourly basis</option>
</select>
</td>
</tr>
<tr><td>Department</td><td><input type="text" name="dept" ></td></tr>



<tr>
<td id=
sleft">Full Name in Block Letters</td><td id="sright"><input type="text" name="name"></td></tr>
<tr>
<td id="sleft">Father's Name</td><td id="sright"><input type="text" name="fname"></td></tr>
<tr>
<td id="sleft">Date Of  Birth</td><td id="sright"><select name="date"><option>Date</option><?php for($i=1;$i<=31;$i++){ echo "<option> $i </option>";}  ?> </select><select name="month"><option>Month</option><?php for($i=1;$i<=12;$i++){ echo "<option> $i </option>";}  ?> </select><select name="year"><option>Year</option><?php for($i=1920;$i<=2016;$i++){ echo "<option> $i </option>";}  ?> </select></td></tr>
<tr>
<td id="sleft">Age</td><td id="sright"><select name="age"><option>Choose your Age</option><?php for($i=1;$i<100;$i++){ echo "<option> $i </option>";}  ?> </select></td></tr>
<tr>
<td id="sleft">Gender</td><td id="sright">Male<input type="radio" name="gender" value="male" >Female<input type="radio" name="gender" value="female"></td></tr>
<tr>
<td id="sleft">Nationality</td><td id="sright"><input type="text" name="nationality"></td></tr>
<tr>
<td id="sleft">Nativity</td><td id="sright"><input type="text" name="nativity"></td></tr>
<tr>
<td id="sleft">Religion</td><td id="sright"><input type="text" name="religion"></td></tr>
<tr>
<td id="sleft">Cast</td><td id="sright"><select name="cast"><option>Choose your Community</option><option>SC</option><option>OBC</option><option>BC</option><option>GEN</option> </select></td></tr>
<tr>
<td id="sleft">Marital Status</td><td id="sright"><select name="mstatus"><option>Choose your Marital Status</option><option>Single</option><option>Married</option><option>Widow</option><option>Separated</option><option>Divorced</option> </select></td></tr>
<th style="float:left;">Present Address Details</th>
<tr>
<td>Address</td><td><textarea rows="5" cols="25" name="preaddr"></textarea></td></tr>
<tr><td>Email</td><td><input type="text" name="preemail"></td></tr>
<tr><td>Phone (landline)</td><td><input type="text" name="prelandline"></td></tr>
<tr><td>Mobile Phone</td><td><input type="text" name="premobile"></td></tr>
</tr>
<th style="float:left;margin-left:-11px;">Permanent Address Details</th>
<tr>
<td>Address</td><td><textarea rows="5" cols="25" name="peraddr"></textarea></td></tr>
<tr><td>Email</td><td><input type="text" name="peremail"></td></tr>
<tr><td>Phone (landline)</td><td><input type="text" name="perlandline"></td></tr>
<tr><td>Mobile Phone</td><td><input type="text" name="permobile"></td></tr>
</tr>
<th style="float:left;">Parents Details</th>
<tr><td>Parent Name</td><td><input type="text" name="pname"></td></tr>
<tr><td>Parent Occupation</td><td><input type="text" name="pocc"></td></tr>
<tr>
<td>Address</td><td><textarea rows="5" cols="25" name="paddr"></textarea></td></tr>
<tr><td>Email</td><td><input type="text" name="pemail"></td></tr>
<tr><td>Phone (landline)</td><td><input type="text" name="plandline"></td></tr>
<tr><td>Mobile Phone</td><td><input type="text" name="pmobile"></td></tr>
</tr>
<th style="float:left;margin-left:-11px;">Spouse Details</th>
<tr><td>Spouse Name</td><td><input type="text" name="sname"></td></tr>
<tr><td>Spouse Occupation</td><td><input type="text" name="socc"></td></tr>
<tr>
<td>Address</td><td><textarea rows="5" cols="25" name="saddr"></textarea></td></tr>
<tr><td>Email</td><td><input type="text" name="semail"></td></tr>
<tr><td>Phone (landline)</td><td><input type="text" name="slandline"></td></tr>
<tr><td>Mobile Phone</td><td><input type="text" name="smobile"></td></tr>
</tr>
<tr><td>Height</td><td><input type="text" name="height"></td></tr>
<tr><td>Weight</td><td><input type="text" name="weight"></td></tr>
<tr><td>Power of Specs (If using)</td><td><input type="text" name="power"></td></tr>
<th style="float:left; margin-left:-20px;">Academic & Professional Qualification Details</th>
<th style="float:left;">SSLC</th>
<tr>
<td>Course (Exam Passed)</td><td><input type="text" name="sc"></td></tr>
<tr>
<td>Institution</td><td><input type="text" name="sc_institute"></td></tr>
<tr>
<td>University</td><td><input type="text" name="sc_university"></td></tr>
<tr>
<td>Year of passing</td><td><input type="text" name="sc_yop"></td></tr>
<tr>
<td>Major Subject</td><td><input type="text" name="sc_major"></td></tr>
<tr>
<td>Class / Mark % / CGPA</td><td><input type="text" name="sc_cgpa"></td></tr>
<th style="float:left;">HSC</th>
<tr>
<td>Course (Exam Passed)</td><td><input type="text" name="hsc"></td></tr>
<tr>
<td>Institution</td><td><input type="text" name="hsc_institute"></td></tr>
<tr>
<td>University</td><td><input type="text" name="hsc_university"></td></tr>
<tr>
<td>Year of passing</td><td><input type="text" name="hsc_yop"></td></tr>
<tr>
<td>Major Subject</td><td><input type="text" name="hsc_major"></td></tr>
<tr>
<td>Class / Mark % / CGPA</td><td><input type="text" name="hsc_cgpa"></td></tr>
<th style="float:left;"> UG</th>
<tr>
<td>Course (Exam Passed)</td><td><input type="text" name="ug"></td></tr>
<tr>
<td>Institution</td><td><input type="text" name="ug_institute"></td></tr>
<tr>
<td>University</td><td><input type="text" name="ug_university"></td></tr>
<tr>
<td>Year of passing</td><td><input type="text" name="ug_yop"></td></tr>
<tr>
<td>Major Subject</td><td><input type="text" name="ug_major"></td></tr>
<tr>
<td>Class / Mark % / CGPA</td><td><input type="text" name="ug_cgpa"></td></tr>
<tr>
<th style="float:left;margin-left:-20px;s">Specialisation in PG Course </th><td><input type="text" name="pg"></td>
<tr><th style="float:left;">Proof of Document</th></tr>
<tr><td id=
sleft">Passport No:</td><td id="sright"><input type="text" name="ppno"></td></tr>
<tr>
<td id=
sleft">Driving Lincense:</td><td id="sright"><input type="text" name="drino"></td></tr>
<tr>
<td id=
sleft">Aathar No:</td><td id="sright"><input type="text" name="aarno"></td></tr>
<tr>
<td id=
sleft">Voter's Id No:</td><td id="sright"><input type="text" name="vidno"></td></tr>
<tr>
<td id=
sleft">Pan No:</td><td id="sright"><input type="text" name="panno"></td></tr>

<tr><th style="float:left;">Experience(Begin with latest employment)</th></tr>
<tr><th style="float:left;">Current Employer</th></tr>

<tr><td id=
sleft">Years / Month of Exp:</td><td id="sright"><input type="text" name="yme1"></td></tr>
<tr>
<td id=
sleft">Employer Name</td><td id="sright"><input type="text" name="ename1"></td></tr>
<tr>
<td id=
sleft">Employer Address</td><td id="sright"><textarea name="eaddr1" rows="10" cols="25"></textarea></td></tr>
<tr>
<td id=
sleft">Designation</td><td id="sright"><input type="text" name="desig1"></td></tr>
<tr>
<td id=
sleft">Period</td><td id="sright"><input type="text" name="period1"></td></tr>
<tr>
<td id=
sleft">Responsibilities</td><td id="sright"><input type="text" name="res1"></td></tr>
<tr>
<td id=
sleft">Gross Salary</td><td id="sright"><input type="text" name="gross1"></td></tr>
<tr>
<td id=
sleft">Reason for leaving </td><td id="sright"><input type="text" name="rol1"></td></tr>
<tr><th style="float:left;">Add Employer</th></tr>

<tr><td id=
sleft">Years / Month of Exp:</td><td id="sright"><input type="text" name="yme2"></td></tr>
<tr>
<td id=
sleft">Employer Name</td><td id="sright"><input type="text" name="ename2"></td></tr>
<tr>
<td id=
sleft">Employer Address</td><td id="sright"><textarea name="eaddr2" rows="10" cols="25"></textarea></td></tr>
<tr>
<td id=
sleft">Designation</td><td id="sright"><input type="text" name="desig2"></td></tr>
<tr>
<td id=
sleft">Period</td><td id="sright"><input type="text" name="period2"></td></tr>
<tr>
<td id=
sleft">Responsibilities</td><td id="sright"><input type="text" name="res2"></td></tr>
<tr>
<td id=
sleft">Gross Salary</td><td id="sright"><input type="text" name="gross2"></td></tr>
<tr>
<td id=sleft">Reason for leaving </td><td id="sright"><input type="text" name="rol2"></td></tr>
<tr><td id=sleft"><b>Languages Known</b></tr>
<tr><td>To Read</td><td>English<input type="checkbox" name="lngr[]" value="english">Tamil<input type="checkbox" name="lngr[]" value="tamil">
Telugu<input type="checkbox" name="lngr[]" value="telugu">
Malayalam<input type="checkbox" name="lngr[]" value="malayalam">
Hindi<input type="checkbox" name="lngr[]" value="hindi"></td></tr>

<tr><td >To Write</td><td>English<input type="checkbox" name="lngw[]" value="english">Tamil<input type="checkbox" name="lngw[]" value="tamil">
Telugu<input type="checkbox" name="lngw[]" value="telugu">
Malayalam<input type="checkbox" name="lngw[]" value="malayalam">
Hindi<input type="checkbox" name="lngw[]" value="hindi"></td></tr>

<tr><td>To Speak</td><td>English<input type="checkbox" name="lngs[]" value="english">Tamil<input type="checkbox" name="lngs[]" value="tamil">
Telugu<input type="checkbox" name="lngs[]" value="telugu">
Malayalam<input type="checkbox" name="lngs[]" value="malayalam">
Hindi<input type="checkbox" name="lngs[]" value="hindi"></td></tr>
<tr><th style="float:left;">Details of Children (if married) & Dependents</th></tr>
<tr>

		<table id="test">
		<tr>
		<td>Name</td>
		<td>Age</td>
		<td>Relationship</td>
		<td>Occupation</td>
		</tr>
		<?php for($i=0;$i<5;$i++)
		{
		?>
		<tr>
		<td><input type="text" name="cname[]" style="width:100px;"></td>
		<td><input type="text" name="cage[]" style="width:40px;"></td>
		<td><input type="text" name="crel[]"style="width:100px;"></td>
		<td><input type="text" name="cocc[]"style="width:100px;"></td>
		</tr>
		<?php
		}
		?>
		</tr>
		</table>

</tr>
<tr><td>Physical disability / Serious Accident, if any</td><td><input type="text" name="phy"></td><tr>

<tr><td><br>Blood Group<br></td><td><input type="text" name="blood"></td><tr>

<tr>
<td><br>Acheivements in Sports/Extra Curricular Activities</td><td><textarea rows="8" cols="59" name="extra"></textarea></td>
</tr>
<tr>
<td>Membership in Professional / Cultural bodies</td><td><textarea rows="8" cols="59" name="mem"></textarea></td>
</tr>
<tr>
<td>Details of Publications / Research papers / Books</td><td><textarea rows="8" cols="59" name="book"></textarea></td>
</tr>
<tr>
<td> Anyother special acheivements in your career</td><td><textarea rows="8" cols="59" name="other_extra"></textarea></td>
</tr>

</table><br>
<br>
<input id="sub"type="submit" value="Submit Your Application">
</div>
</form>
</div>
</html>


<?php
//print_r($_FILES['up']);
$target="upload/";
if(move_uploaded_file($_FILES['up']['tmp_name'],$target.$_FILES['up']['name']))
{
	echo "successfully uploaded";
}
else
{
	echo "failed to upload";
}
"<br>";
echo $post=$_POST['post']."<br>";
echo $dept=$_POST['dept']."<br>";
echo $name=$_POST['name']."<br>";
echo $fname=$_POST['fname']."<br>";
echo $dob=$_POST['date']."/".$_POST['month']."/".$_POST['year']."<br>";
echo $age=$_POST['age']."<br>";
echo $gender=$_POST['gender']."<br>";
echo $national=$_POST['nationality']."<br>";
echo $native=$_POST['nativity']."<br>";
echo $religion=$_POST['religion']."<br>";
echo $cast=$_POST['cast']."<br>";
echo $marital=$_POST['mstatus']."<br>";
echo $preaddr=$_POST['preaddr']."<br>";
echo $preemail=$_POST['preemail']."<br>";
echo $prephone=$_POST['prelandline']."<br>";
echo $premob=$_POST['premobile']."<br>";

echo $peraddr=$_POST['peraddr']."<br>";
echo $peremail=$_POST['peremail']."<br>";
echo $perphone=$_POST['perlandline']."<br>";
echo $permob=$_POST['permobile']."<br>";
echo $pname=$_POST['pname']."<br>";
echo $pocc=$_POST['pocc']."<br>";
echo $paddr=$_POST['paddr']."<br>";
echo $pemail=$_POST['pemail']."<br>";
echo $pphone=$_POST['plandline']."<br>";
echo $pmobile=$_POST['pmobile']."<br>";
echo $sname=$_POST['sname']."<br>";
echo $socc=$_POST['socc']."<br>";
echo $saddr=$_POST['saddr']."<br>";
echo $semail=$_POST['semail']."<br>";
echo $sphone=$_POST['slandline']."<br>";
echo $smobile=$_POST['smobile']."<br>";
echo $height=$_POST['height']."<br>";
echo $weight=$_POST['weight']."<br>";
echo $power=$_POST['power']."<br>";
echo $sc=$_POST['sc']."<br>";
echo $sc_institute=$_POST['sc_institute']."<br>";
echo $scuniv=$_POST['sc_university']."<br>";
echo $scyop=$_POST['sc_yop']."<br>";
echo $scmajor=$_POST['sc_major']."<br>";
echo $sccgpa=$_POST['sc_cgpa']."<br>";
echo $hsc=$_POST['hsc']."<br>";
echo $hsc_institute=$_POST['hsc_institute']."<br>";
echo $hscuniv=$_POST['hsc_university']."<br>";
echo $hscyop=$_POST['hsc_yop']."<br>";
echo $hscmajor=$_POST['hsc_major']."<br>";
echo $hsccgpa=$_POST['hsc_cgpa']."<br>";
echo $ug=$_POST['ug']."<br>";
echo $ug_institute=$_POST['ug_institute']."<br>";
echo $uguniv=$_POST['ug_university']."<br>";
echo $ugyop=$_POST['ug_yop']."<br>";
echo $ugmajor=$_POST['ug_major']."<br>";
echo $ugcgpa=$_POST['ug_cgpa']."<br>";


echo $ppno=$_POST['ppno']."<br>";
echo $drno=$_POST['drino']."<br>";
echo $aarno=$_POST['aarno']."<br>";
echo $vidno=$_POST['vidno']."<br>";
echo $panno=$_POST['panno']."<br>";

echo $yme1=$_POST['yme1']."<br>";
echo $ename1=$_POST['ename1']."<br>";
echo $eaddr1=$_POST['eaddr1']."<br>";
echo $edesig1=$_POST['desig1']."<br>";
echo $eperiod1=$_POST['period1']."<br>";
echo $eres1=$_POST['res1']."<br>";
echo $egross1=$_POST['gross1']."<br>";
echo $rol1=$_POST['rol1']."<br>";

echo $yme2=$_POST['yme2']."<br>";
echo $ename2=$_POST['ename2']."<br>";
echo $eaddr2=$_POST['eaddr2']."<br>";
echo $edesig2=$_POST['desig2']."<br>";
echo $eperiod2=$_POST['period2']."<br>";
echo $eres2=$_POST['res2']."<br>";
echo $egross2=$_POST['gross2']."<br>";
echo $rol2=$_POST['rol2']."<br>";

$lngr=$_POST['lngr'];
echo "Languages Known to Read"." <br>";
for($i=0;$i<sizeof($lngr);$i++)
{
	echo $lngr[$i]."<br>";

}
$lngw=$_POST['lngw'];
echo "Languages Known to Write <br>";
for($i=0;$i<sizeof($lngw);$i++)
{
	echo $lngw[$i]."<br>";

}
$lngs=$_POST['lngs'];
echo "Languages Known to Speak <br>";
for($i=0;$i<sizeof($lngs);$i++)
{
	echo $lngs[$i]."<br>";

}
$cname=$_POST['cname'];



for($i=0;$i<sizeof($cname);$i++)
{
	echo "Children=".$cname[$i]."<br>";

}
 $cage=$_POST['cage'];
 for($i=0;$i<sizeof($cage);$i++)
{
	echo "Children Age=".$cage[$i]."<br>";

}

$crel=$_POST['crel'];
for($i=0;$i<sizeof($crel);$i++)
{
	echo "Relationship=".$crel[$i]."<br>";

}
 $cocc=$_POST['cocc'];
for($i=0;$i<sizeof($cocc);$i++)
{
	echo "Occupation=".$cocc[$i]."<br>";

}
echo $phy=$_POST['phy']."<br>";
echo $blood=$_POST['blood']."<br>";
echo $extra=$_POST['extra']."<br>";
echo $mem=$_POST['mem']."<br>";
echo $book=$_POST['book']."<br>";
echo $other=$_POST['other_extra']."<br>";
?>




