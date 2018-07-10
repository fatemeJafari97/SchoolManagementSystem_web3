<?php include("template-part/header.php");?>
<div class="clearfix">
</div>
<div class="container">
	<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<!-- BEGIN SIDEBAR -->
		 <?php include("template-part/sidebar.php");?>
		<!-- END SIDEBAR -->
		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="page-content">
		
				<!-- BEGIN PAGE HEADER-->
				<h3 class="page-title">
				    لیست صنوف
				</h3>
				
				<!-- END PAGE HEADER-->
				<div class="portlet light">
					<div class="portlet-body">
						<div class="row inbox">
							<h3 class="content-title">لیست صنوف</h3><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="float:left">جستجو</button>
							<table class="table table-striped table-bordered">
							<tr><th>صنف</th> <th>اتاق</th> <th>فیس </th> <th>زمان شروع</th> <th>زمان ختم</th> <th>تاریخ شروع</th> <th>تاریخ ختم</th><th>دیگر موارد</th></tr>
							<?php
							$list="";
							require_once("connection/crud.php");
							$crud= new crud();
							$crud->connect();
							
							
						$data=$crud->select("classes","*","",$crud->connect);		
							
							for($i=0;$i<sizeof($data);$i++){
							echo "<tr>
							<td>".$data[$i]['Class_name']."</td>
							<td>".$data[$i]['room_no']."</td>
							<td>".$data[$i]['Class_fees']."</td>
							<td>".$data[$i]['start_time']."</td>
							<td>".$data[$i]['end_time']."</td>
							<td>".$data[$i]['start_date']."</td>
							<td>".$data[$i]['end_date']."</td>
							<td><button onclick='deleteData(".$data[$i]['class_id'].")' class='btn btn-danger'>حذف</button><a href='edit_class.php?class_id=".$data[$i]['class_id']."' class='btn btn-warning'>ویرایش</a></td>
							
							</tr>";	
								$list=$list.$data[$i]['Class_name'].",".$data[$i]['room_no'].",".$data[$i]['Class_fees'].",".$data[$i]['start_time'].",".$data[$i]['end_time'].",".$data[$i]['start_date'].",".$data[$i]['end_date']."***";
							}
							?>
							</table>
							<form method="post">
							   <input type="submit" value="ذخیره به فایل csv" name="saveToFile" class="btn btn-success">
							</form>
							<?php
							   if(isset($_POST['saveToFile'])){
								   $list =array($list);
								   $file= fopen('classes.csv', 'w');
			                       fputcsv($file, $list);
			                       fclose($file);
							   }
							?>
						</div>
						<div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END CONTAINER -->
	
	<!--MODAL START HERE-->
	  <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">جستجوی صنف</h4>
      </div>
      <div class="modal-body">
        <form>
		  <div class="form-group">
		    <input type="text"name="className" class="form-control" placeholder="اسم صنف را وارد کنید" id="className">
		  </div>
          <div class="form-group">		  
			<input type="button" onclick="getSresult()" class="form-control" value="جستجو">
		  </div>	
		</form>
		<table  id="result" style="width:100% !important" class="table table-striped table-bordered">
                                   
         </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>
      </div>
    </div>

  </div>
</div>
	<!--END OF MODAL-->
<?php include("template-part/footer.php");?>

<script>
//this function is used to confirm the delete process
function deleteData(id){
	var check=confirm("مطمئن هستید حذف شود؟");
	if(check==true){
		window.location.assign("delete.php?class_id="+id);
	}
	else{
		
	}
}
</script>

<script type="text/javascript">
//searching process is done by Ajax
      var xmlAjax; 
    if(window.XMLHttpRequest){
      xmlAjax=new XMLHttpRequest();
    }
    else{
           xmlAjax=new ActiveXObject("Microsoft.XMLHTTP");
    }
    function getSresult(){
      var className=document.getElementById("className").value;
    

      if(className==""){
        alert("شما هیچ کلمه ای را برای جستجو وارد نکرده اید. \n ");
      }
else{
      xmlAjax.open("GET","searchClass.php?className="+className,true);
      xmlAjax.send();

      xmlAjax.onreadystatechange=function(){
        if(xmlAjax.status==200 && xmlAjax.readyState==4){
         document.getElementById("result").innerHTML=xmlAjax.responseText;   
        }
      }
}//end of check not empty cells
    }
   
 </script>