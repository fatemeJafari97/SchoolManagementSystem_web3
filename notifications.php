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
				    یاداشت ها
				</h3>
				<!-- END PAGE HEADER-->
				<div class="portlet light">
					<div class="portlet-body">
						<div class="row inbox">
							<h3 class="content-title">یاداشت جدید</h3>
						</div>
						<form method="post">
						   <div class="form-group">
						      <input type="text" name="title" class="form-control" required>
						   </div>
						   <div class="form-group">
						     <textarea name="note" class="form-control" rows="6">
							 </textarea>
						   </div>
						   <div class="form-group">
						      <input type="submit" name="submit" class="form-control" value="ذخیره">
						   </div>
						</form>
						<?php
						if(isset($_POST['submit'])){
							$title=$_POST['title'];
							$note=$_POST['note'];
							
							$list = array (array($title),
                                           array($note),
			                                
			                               );
							
							$file= fopen('notes.csv', 'a');
			                foreach($list as $fields) {fputcsv($file, $fields);}
			                fclose($file);
						}
						
						?>
					<hr>
					<h2 class="content-title">نوت ها</h2>
					<form method="post">
					   <input type="submit" name="savetoZip" value="زیپ کردن نوت ها" style="float:left" class="btn btn-success">
					</form>
					<?php
					if(isset($_POST['savetoZip'])){
						$myfile = fopen("notes.csv", "r");
                  $savedNotes= fread($myfile,filesize("notes.csv"));
                      fclose($myfile);
						
						$zip=new ZipArchive();
						$filename="./notes.zip";
						if($zip->open($filename,ZipArchive::CREATE)!==TRUE){
							exit("فایل باز نشد<$filename>\n");}
							
							$zip->addFromString("notes.txt",$savedNotes);

                         echo $zip->numFiles." فایل موفقانه زیپ شد. \n";
						 echo"وضعیت:".$zip->status."\n";
                         $zip->close();
					}
					 
					?>
					<div class="notification">
					    <?php
					$file =fopen('notes.csv','r');
					while(!feof($file)) {
                    echo fgets($file) . "<br>";
                    }
                    fclose($file);
					?>
					</div>
					
					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- END CONTAINER -->
<?php include("template-part/footer.php");?>