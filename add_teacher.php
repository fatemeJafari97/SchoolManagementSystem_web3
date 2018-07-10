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
				    استاد جدید
				</h3>
				<!-- END PAGE HEADER-->
				<div class="portlet light">
					<div class="portlet-body">
						<div class="row inbox">
							<h3 class="content-title">استاد جدید</h3>
						</div>
						<div>
						   <form method="post">
						      <div class="form-group">
							    <label>اسم</label> 
							    <input type="text" required name="teacher_name" class="form-control">
							  </div>
							  <div class="form-group">
							    <label>تخصل</label> 
							    <input type="text" required name="lastName" class="form-control">
							  </div>
							  <div class="form-group">
							    <label>نام پدر</label> 
							    <input type="text" required name="fatherName" class="form-control">
							  </div>
							  <div class="form-group">
							    <label>شماره تماس</label> 
							    <input type="text" required name="Phone_no" class="form-control">
							  </div>
							 <div class="form-group">
							    <label>شماره تذکره</label> 
							    <input type="number" required name="ssn" class="form-control">
							  </div>
							  <div class="form-group">
							    <label>ایمل</label> 
							    <input type="text" required name="email" class="form-control">
							  </div>
							  <div class="form-group">
							    <label>آدرس</label> 
							     <textarea name="address" class="form-control" rows="4">
								 </textarea>
							  </div>
							  <div class="form-group">
							   
							    <input type="submit" name="submit" class="form-control submit-button" value="ذخیره">
							  </div>
							  
						   </form>
						   
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

						$res=$crud->insert("teachers","teacher_id,teacher_name,teacher_lastname,teacher_fathername,teacher_ssn,email,teacher_phone,teacher_address","'','$name','$lastName','$fatherName','$ssn','$email','$phone_no','$address'",$crud->connect);		
						if(!$res){
							echo "<h4 class='message-result'>استاد موفقانه ثبت گردید</h4>";
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