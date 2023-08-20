 

   
    <!-- BEGIN: Page Main-->
<div class="main-content">
	<div class="card">
		<div class="card-body">
			<div class="qz-page-title">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<div class="d-flex justify-content-between align-items-center">
								<h2>Account Setting</h2>
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
						<form id="updateForms" role="form" method="post" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
							<?php
							$load = new load;
							$data = $load->GetAdminSetting();
							foreach($data as $val):
							?>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Name</label>
										<div class="colsm">
										<input type="text" name="name" value="<?=$val['name']?>" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Username</label>
										<div class="colsm">
										<input type="email" name="username" value="<?=$val['username']?>" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>New Password</label>
										<div class="colsm">
										<input type="password" name="pass" value="" class="form-control" placeholder="************">
										</div>
										
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Confirm Password</label>
										<div class="colsm">
										<input type="password" name="cpass" value="" class="form-control" placeholder="************">
										</div>
									</div>
								</div>
							</div>
							<input type="hidden" name="id" value="<?=$val['id']?>">
							<?php endforeach; ?>
							<div class="row">
								<div class="col-lg-3">
									<div class="form-group">
										<button type="submit" onclick="updatepass('account','<?=siteUrl?>');" class="btn btn-info" name="signup" value="Sign up" style="width: 100%;">Update Account </button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<h3 class="mb-4 mt-4">Firebase Server Key</h3>
				<div class="row">
					<div class="col-lg-12">
						<?php
						$base   = new load;
						$id     = $base->getID();
						$edit   = $base->getBy('admin',"id = 1");
						?>
						<form id="updateFormskey" role="form" method="post" class="form-horizontal" enctype="multipart/form-data">
						<?php foreach($edit as $val):?>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Server Key</label>
										<input type="text" name="server_key" value="<?=$val['server_key'];?>" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
								 <input type="hidden" name="edit_id" value="<?=$val['id']?>">
								<input type="submit" name="" value="Update Server Key" class="btn btn-info" onclick="updateServerkey('account','<?=siteUrl;?>')">
								</div>
							</div>
							<?php endforeach;?>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
	