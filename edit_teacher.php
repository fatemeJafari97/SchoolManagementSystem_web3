<?php 
ob_start();
include("template-part/header.php");?>
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
				    ویرایش مشخصات استاد
				</h3>
				<!-- END PAGE HEADER-->
				<div class="portlet light">
					<div class="portlet-body">
						<div class="row inbox">
							<h3 class="content-title">ویرایش استاد</h3>
						</div>
						<div>
						<?php
if($_GET['teacher_id']){
	$teacher_id=$_GET['teacher_id'];
	
		require_once("connection/crud.php");
		$crud= new crud();
		$crud->connect();
							
		$data=$crud->select("teachers","*","where teacher_id='$teacher_id'",$crud->connect);
        for($i=0;$i<sizeof($data);$i++){		
?>					
						   <form method="post">
						      <div class="form-group">
							    <label>اسم</label> 
							    <input type="text" required name="teacher_name" class="form-control" value="<?php echo $data[$i]['teacher_name'];?>">
							  </div>
							  <div class="form-group">
							    <label>تخصل</label> 
							    <input type="text" required name="lastName" class="form-control" value="<?php echo $data[$i]['teacher_lastname'];?>">
							  </div>
							  <div class="form-group">
							    <label>نام پدر</label> 
							    <input type="text" required name="fatherName" class="form-control" value="<?php echo $data[$i]['teacher_fathername'];?>">
							  </div>
							  <div class="form-group">
							    <label>شماره تماس</label> 
							    <input type="text" required name="Phone_no" class="form-control" value="<?php echo $data[$i]['teacher_phone'];?>">
							  </div>
							 <div class="form-group">
							    <label>شماره تذکره</label> 
							    <input type="number" required name="ssn" class="form-control" value="<?php echo $data[$i]['teacher_ssn'];?>">
							  </div>
							  <div class="form-group">
							    <label>ایمل</label> 
							    <input type="text" required name="email" class="form-control" value="<?php echo $data[$i]['email'];?>">
							  </div>
							  <div class="form-group">
							    <label>آدرس</label> 
							     <textarea name="address" class="form-control" rows="4" >
								    <?php echo $data[$i]['teacher_address'];?>
								 </textarea>
							  </div>
							  <div class="form-group">
							   
							    <input type="submit" name="submit" class="form-control submit-button" value="ویرایش">
							  </div>
							  
						   </form>
		<?php 
		   }
              }
				?>   
						   	<?php
							
							if(isset($_POST['submit'])){
								
								$name=$_POST['teacher_name'];
								$lastName=$_POST['lastName'];
								$fatherName=$_POST['fatherName'];
								$phone_no=$_POST['Phone_no'];
								$ssn=$_POST['ssn'];
								$email=$_POST['email'];
								$address=$_POST['address'];

								
								$phonePattern='/^07[0-9]{8}$/';
								$emailPattern='/^[a-zA-Z][_.a-zA-Z0-9]{5,19}@\w{3,12}\.[a-zA-Z]{2,5}$/';
								$ssnPattern='/^\d{6,9}$/';
								
			if(preg_match($phonePattern,$phone_no)==0){
							echo "<h4 class='message-result'>شماره تماس نامعتبر است</h4>";
			}
			else if(preg_match($emailPattern,$email)==0){
										echo "<h4 class='message-result'>ایمل آدرس نامعتبر است </h4>";	
			}	
           else if(preg_match($ssnPattern,$ssn)==0){
										echo "<h4 class='message-result'>شماره تذکره نامعتبر است</h4>";   
		   }
          else{	   
						require_once("connection/crud.php");

						$crud= new crud();
						  
						$crud->connect();

						$res=$crud->update("teachers","teacher_name='$name',teacher_lastname='$lastName',teacher_fathername='$fatherName',teacher_ssn='$ssn',email='$email',teacher_phone='$phone_no',teacher_address='$address'","where teacher_id='$teacher_id'",$crud->connect);		
						if(!$res){
	                      header("location:teachers.php");
							ob_end_flush();
							echo "<h4 class='message-result'>درخواست موفقانه انجام شد</h4>";
							}
						
						else{
							 
							echo "<h4 class='message-result'>خطا رخ داده ست</h4>";
						}

						}//end of pattern else
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