 
    <!-- BEGIN: Page Main-->
<div class="main-content">
	<div class="card">
		<div class="card-body">
			<div class="qz-page-title">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<div class="d-flex justify-content-between align-items-center">
								<h2>Push Notification</h2>
								<span class="sidebarToggler">
									<i class="fa fa-bars d-lg-none d-block"></i>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End page title -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<form id="signupForm" role="form" method="post" action="<?=siteUrl?>" class="form-horizontal" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Title <span class="text-danger">*</span></label>
										<div class="colsm">
										<input type="text" name="title" value="" class="form-control">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Message<span class="text-danger"></span></label>
										<div class="colsm">
											<textarea name="message" id="description" rows="4" class="form-control"></textarea>
										</div>
										<!--script>CKEDITOR.replace( 'description' );</script-->
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
								<button type="submit" onclick="SaveNotify('notification','<?=siteUrl;?>')"; class="btn btn-info" name="Add form" value="Add form">
								  Send Push notification                                     </button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	