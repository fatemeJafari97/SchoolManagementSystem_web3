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
				    لیست استاتید
				</h3>
				<!-- END PAGE HEADER-->
				<div class="portlet light">
					<div class="portlet-body">
						<div class="row inbox">
							<h3 class="content-title">لیست اساتید</h3>
							<table class="table table-striped table-bordered">
							<tr><th>اسم</th> <th>تخلص</th> <th>ولد </th> <th>شماره تذکره</th> <th>شماره تماس</th> <th>ایمل</th> <th>آدرس</th><th>دیگر موارد</th></tr>
							<?php
							require_once("connection/crud.php");
							$crud= new crud();
							$crud->connect();
							
							
						$data=$crud->select("teachers","*","",$crud->connect);		
							
							for($i=0;$i<sizeof($data);$i++){
							echo "<tr>
							<td>".$data[$i]['teacher_name']."</td>
							<td>".$data[$i]['teacher_lastname']."</td>
							<td>".$data[$i]['teacher_fathername']."</td>
							<td>".$data[$i]['teacher_ssn']."</td>
							<td>".$data[$i]['teacher_phone']."</td>
							<td>".$data[$i]['email']."</td>
							<td>".$data[$i]['teacher_address']."</td>
							<td><button onclick='deleteData(".$data[$i]['teacher_id'].")' class='btn btn-danger'>حذف</button><a href='edit_teacher.php?teacher_id=".$data[$i]['teacher_id']."' class='btn btn-warning'>ویرایش</button></td>
							
							</tr>";	
								
							}
							?>
							</table>
						</div>
						<div>

						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- END CONTAINER -->
<?php include("template-part/footer.php");?>
<script>
function deleteData(id){
	var check=confirm("مطمئن هستید حذف شود؟");
	if(check==true){
		window.location.assign("delete.php?teacher_id="+id);
	}
	else{
		
	}
}
</script>