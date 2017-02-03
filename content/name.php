 <?php  
 $connect = mysqli_connect("localhost", "root", "", "hits_events");  
 $number = count($_POST["faculty_code	"]);  
  $number = count($_POST["depart_code"]);  
 $number = count($_POST["programme_code"]);  
 $number = count($_POST["semester_code	"]);  
 $number = count($_POST["course_code"]);  
 $number = count($_POST["assesmenttype_code"]);  
 $number = count($_POST["qes_no"]);  
 $number = count($_POST["co_code"]);  
  $number = count($_POST["btl_code	"]);  

  $number = count($_POST["max_mark	"]);  

 if($number > 0)  
 {  
      for($i=0; $i<$number; $i++)  
      {  
           if(trim($_POST["faculty_code"][$i] != ''))  
           {  
                $sql = "INSERT INTO qp_set(name) VALUES('".mysqli_real_escape_string($connect, $_POST["faculty_code"][$i],$_POST["depart_code"][$i],$_POST["programme_code"][$i],$_POST["semester_code"][$i],$_POST["course_code"][$i],$_POST["assesmenttype_code"][$i],$_POST["qes_no"][$i],$_POST["co_code"][$i],$_POST["btl_code"][$i])
				."')";  
                mysqli_query($connect, $sql);  
           }  
      }  
      echo "Data Inserted";  
 }  
 else  
 {  
      echo "Please Enter Name";  
 }  
 ?>  
