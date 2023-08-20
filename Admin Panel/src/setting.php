
<!-- Main Content -->
<div class="main-content">
	<div class="card-body">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<form id="updateForms" role="form" method="post" class="form-horizontal" enctype="multipart/form-data">
						<?php
						$load = new load;
						$data = $load->GetSetting();
						foreach($data as $val):
						?>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Site Title</label>
									<div class="colsm">
									<input type="text" name="title" value="<?=$val['title']?>" class="form-control">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Email Address</label>
									<div class="colsm">
									<input type="email" name="email" value="<?=$val['email']?>" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Contact Number</label>
									<div class="colsm">
									<input type="number" name="contact" value="<?=$val['contact']?>" class="form-control">
									</div>
									
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Address</label>
									<div class="colsm">
									<textarea class="form-control" name="address" id="editor" placeholder="Address"><?=$val['address']?></textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Site Description</label>
									<div class="colsm">
									<textarea class="form-control" name="description" id="editor" placeholder="Description"><?=$val['description']?></textarea>
									</div>
								</div>
							</div>
						</div>
						<input type="hidden" name="id" value="<?=$val['id']?>">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									  <label>Site Logo</label>
									  <div class="fileupload_block">
										<input type="hidden" value="<?= $val['logo']?>" name="upfile">
										<div class="fileupload_img"><img type="image" src="<?=siteUrl.$val['logo']?>" id="imgsrc" class="avatars" alt="Genre image" width="250"></div>
									  </div><br/>
									  <div class="fileva btn btn-sm btn-primary">
									  <input type="file" name="uploadfile" value="" class="inputva d-block form-control file-upload" id="fileupload">
									  Change Logo</div>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<button type="submit" onclick="update('setting','<?=siteUrl?>')"; class="btn btn-info" name="signup" value="Sign up">Update Setting</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
	
	