<?php
require_once("connection/crud.php");

		$crud= new crud();
		$crud->connect();
		
if($_GET['student_id']){
	
	    $stu_id=$_GET['student_id'];
       $res= $crud->delete("students","Student_id='$stu_id'",$crud->connect);
	   header("location:students.php");
	   }
else if($_GET['class_id']){
	   $class_id=$_GET['class_id'];
      $crud->delete("classes","class_id='$class_id'",$crud->connect);
      header("location:classes.php");
}
else if($_GET['teacher_id']){
	 $teacher_id=$_GET['teacher_id'];
	$crud->delete("teachers","teacher_id='$teacher_id'",$crud->connect);
    header("location:teachers.php");
}	   
else{
	echo "not read";
}
?>