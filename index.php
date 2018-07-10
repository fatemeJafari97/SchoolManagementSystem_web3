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
				    صفحه اصلی
				</h3>
				<!-- END PAGE HEADER-->
				<div class="portlet light">
					<div class="portlet-body">
						<div class="row inbox">
							<div class="col-md-4">
								<ul class="inbox-nav margin-bottom-10">
									<li class="compose-btn">
										<a href="add_student.php" data-title="Compose" class="btn green">
										<i class="fa fa-edit"></i> ثبت نام شاگرد </a>
									</li>
									<li class="inbox active">
										<a href="javascript:;" class="btn" data-title="Inbox">
										شاگردان </a>
										<b></b>
									</li>
									<li class="sent">
										<a class="btn" href="students.php" data-title="Sent">
										لیست شاگردان </a>
										<b></b>
									</li>
									<li class="draft">
										<a class="btn" href="javascript:;" data-title="Draft">
										شاگردان قبلی </a>
										<b></b>
									</li>
									<li class="trash">
										<a class="btn" href="javascript:;" data-title="Trash">
										شاگردان فعلی</a>
										<b></b>
									</li>
								</ul>
							</div>
							<div class="col-md-4">
								<ul class="inbox-nav margin-bottom-10">
									<li class="compose-btn">
										<a href="add_class.php" data-title="Compose" class="btn green">
										<i class="fa fa-edit"></i> صنف جدید </a>
									</li>
									<li class="inbox active">
										<a href="javascript:;" class="btn" data-title="Inbox">
										صنوف </a>
										<b></b>
									</li>
									<li class="sent">
										<a class="btn" href="classes.php" data-title="Sent">
										لیست صنوف </a>
										<b></b>
									</li>
									<li class="draft">
										<a class="btn" href="javascript:;" data-title="Draft">
										صنوف ختم شده </a>
										<b></b>
									</li>
									<li class="trash">
										<a class="btn" href="javascript:;" data-title="Trash">
										صنوف در حال جریان </a>
										<b></b>
									</li>
								</ul>
							</div>
							
							<div class="col-md-4">
								<ul class="inbox-nav margin-bottom-10">
									<li class="compose-btn">
										<a href="add_teacher.php" data-title="Compose" class="btn green">
										<i class="fa fa-edit"></i> استاد جدید </a>
									</li>
									<li class="inbox active">
										<a href="javascript:;" class="btn" data-title="Inbox">
										اساتید </a>
										<b></b>
									</li>
									<li class="sent">
										<a class="btn" href="teachers.php" data-title="Sent">
										لیست استاتید </a>
										<b></b>
									</li>
									<li class="draft">
										<a class="btn" href="javascript:;" data-title="Draft">
										اساتید فعلی </a>
										<b></b>
									</li>
									<li class="trash">
										<a class="btn" href="javascript:;" data-title="Trash">
										استاتید گذشته </a>
										<b></b>
									</li>
								</ul>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- END CONTAINER -->
<?php include("template-part/footer.php");?>