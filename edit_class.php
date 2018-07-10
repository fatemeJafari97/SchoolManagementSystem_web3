<?php 
ob_start();
include("template-part/header.php");
?>
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
				    ویرایش مشخصات صنف
				</h3>
				<!-- END PAGE HEADER-->
				<div class="portlet light">
					<div class="portlet-body">
						<div class="row inbox">
							<h3 class="content-title">ویرایش صنف </h3>
						</div>
						<div>
<?php
if($_GET['class_id']){
	$class_id=$_GET['class_id'];
	
		require_once("connection/crud.php");
		$crud= new crud();
		$crud->connect();
							
		$data=$crud->select("classes","*","where class_id='$class_id'",$crud->connect);
        for($i=0;$i<sizeof($data);$i++){		
?>
												
						   <form method="post">
						      <div class="form-group">
							    <label>صنف</label> 
							    <input type="text" required name="class_name" class="form-control"  value="<?php echo $data[$i]['Class_name'] ?>" >
							  </div>
							  <div class="form-group" >
							    <label> شماره اتاق</label> 
							    <select class="form-control" required name="class_room">
								   <option value="1">1</option>
								   <option value="2">2</option>
								   <option value="3">3</option>
								   <option value="4">4</option>
								   <option value="5">5</option>
								   <option value="6">6</option>
								   <option value="7">7</option>
								</select>
							  </div>
							  <div class="form-group">
							    <label>فیس صنف</label> 
							    <input type="number" required name="class_fee" class="form-control" value="<?php echo $data[$i]['Class_fees'] ?>" >
							  </div>
							  <div class="form-group">
							    <div class="col-md-6">
								   <label>تایم شروع</label> 
							       <input type="time" required name="start_time" class="form-control" value="<?php echo $data[$i]['start_time'] ?>">
								</div>
								<div class="col-md-6">
								   <label>تایم ختم</label> 
							       <input type="time" required name="end_time" class="form-control" value="<?php echo $data[$i]['end_time'] ?>">
								</div>
							  </div>
							  <div class="form-group">
							    <div class="col-md-6">
								   <label>تاریخ  شروع</label> 
							       <input type="date" required name="start_date" class="form-control" value="<?php echo $data[$i]['start_date'] ?>">
								</div>
								<div class="col-md-6">
								   <label>تاریخ ختم</label> 
							       <input type="date" required name="end_date" class="form-control" value="<?php echo $data[$i]['end_date'] ?>">
								</div>
							  </div>
							  <div class="form-group">
							   
							    <input type="submit" value="ویرایش" name="submit" class="form-control submit-button">
							  </div>
							  
						   </form>
						 <?php 
	}		
   }	?>	  
						   	<?php
							
							if(isset($_POST['submit'])){
								
								$name=$_POST['class_name'];
								$room=$_POST['class_room'];
								$fees=$_POST['class_fee'];
								$startTime=$_POST['start_time'];
								$endTime=$_POST['end_time'];
								$startDate=$_POST['start_date'];
								$endDate=$_POST['end_date'];

						require_once("connection/crud.php");

						$crud= new crud();
						  
						$crud->connect();

						$res=$crud->update("classes","Class_name='$name',room_no='$room',Class_fees='$fees',start_time='$startTime',end_time='$endTime',start_date='$startDate',end_date='$endDate'","where class_id='$class_id'",$crud->connect);		
						if(!$res){
							header("location:classes.php");
							ob_end_flush();
							echo "<h4 class='message-result'>درخواست موفقانه انجام شد</h4>";
						}
						
						else{
							 
							echo "<h4 class='message-result'>خطای رخ داده است</h4>";
						}

							}
							?>
						   
						   
						   
						   
						   
						   
						   
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- END CONTAINER -->
<?php include("template-part/footer.php");?>