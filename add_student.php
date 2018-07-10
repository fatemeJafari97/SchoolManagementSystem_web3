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
				    ثبت نام شاگرد
				</h3>
				<!-- END PAGE HEADER-->
				<div class="portlet light">
					<div class="portlet-body">
						<div class="row inbox">
							<h3 class="content-title">شاگرد جدید</h3>
						</div>
						<div>
						   <form method="post">
						      <div class="form-group">
							    <label>اسم</label> 
							    <input type="text" required name="student_name" class="form-control">
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
							    <label> آقا: <input type="radio" value="male" name="gender"> </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<label> خانم: <input type="radio" value="female" name="gender"></label>
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
							     <label>صنف</label>
							     <select class="form-control" name="student_class">
								    <?php 
									$con=new mysqli("localhost","root","","school") or die(mysqli_error()."database connection error");
                                    $res=$con->query("select * from classes");  
                                    while($classes=$res->fetch_assoc()){
									?>
									<option value="<?php echo $classes["class_id"]?>"><?php echo $classes["Class_name"]?></option>
									<?php
									}
									?>
								 </select>
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
								
								$name=$_POST['student_name'];
								$lastName=$_POST['lastName'];
								$fatherName=$_POST['fatherName'];
								$phone_no=$_POST['Phone_no'];
								$gender=$_POST['gender'];
								$ssn=$_POST['ssn'];
								$email=$_POST['email'];
								$address=$_POST['address'];
								$student_class=$_POST['student_class'];

								
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

						$res=$crud->insert("students","Student_id,Student_name,student_lastname,student_fathername,gender,student_ssn,student_phone,student_email,address,class_id","'','$name','$lastName','$fatherName','$gender','$ssn','$phone_no','$email','$address','$student_class'",$crud->connect);		
						if(!$res){
							echo "<h4 class='message-result'>شاگرد موفقانه ثبت نام گردید</h4>";
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