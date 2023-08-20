<?php 
$query = $this->db->prepare("select * from applist");
$query->execute();
$count = $query->rowCount();
?> 
<!-- Start content area  -->
<div class="main-content">
	<div class="card">
		<div class="card-body">
			 <div class="qz-page-title">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<div class="d-flex justify-content-between align-items-center">
								<h2><?=$count > 0 ? "Edit" : "Add" ?> app</h2>
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
							<?php
							if($count > 0){
							$query = $this->db->query("select * from applist");
							$query->execute();
							$val = $query->fetch(PDO::FETCH_ASSOC);
							?>
                            <form id="updateForms" role="form" method="post" class="form-horizontal" enctype="multipart/form-data">
							
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>App Name</label>
											<input type="text" name="appname" value="<?=$val['app_name'];?>" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Radio Streaming link</label>
											<input type="text" name="radio_stream" value="<?=$val['radio_stream']?>" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Tv streaming link</label>
											<input type="text" name="tv_stream" value="<?=$val['tv_stream']?>" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>Website</label>
											<input type="text" name="website" value="<?=$val['website']?>" class="form-control">
											
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Facebook</label>
											<input type="text" name="facebook" value="<?=$val['facebook']?>" class="form-control">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Whatsapp</label>
											<input type="text" name="whatsapp" value="<?=$val['whatsapp']?>" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
    								<div class="col-md-4">
    									<div class="form-group">
    										<label>Youtube</label>
    										<div class="colsm">
    										<input type="text" name="youtube" value="<?=$val['youtube']?>" class="form-control">
    										</div>
    									</div>
    								</div>
    								<div class="col-md-4">
    									<div class="form-group">
    										<label>Twitter</label>
    										<div class="colsm">
    										<input type="text" name="twitter" value="<?=$val['twitter']?>" class="form-control">
    										</div>
    									</div>
    								</div>
    								<div class="col-md-4">
    									<div class="form-group">
    										<label>Instagram</label>
    										<div class="colsm">
    										<input type="text" name="instagram" value="<?=$val['instagram']?>" class="form-control">
    										</div>
    									</div>
    								</div>
    							</div>
    							<div class="row">
    								<div class="col-md-6">
    									<div class="form-group">
    										<label>Privacy Policy</label>
    										<div class="colsm">
    										<input type="text" name="privacy_policy" value="<?=$val['privacy_policy']?>" class="form-control">
    										</div>
    									</div>
    								</div>
    								<div class="col-md-6">
    									<div class="form-group">
    										<label>Facebook ID</label>
    										<div class="colsm">
    										<input type="text" name="facebook_id" value="<?=$val['facebook_id']?>" class="form-control">
    										</div>
    									</div>
    								</div>
    							</div>
    							<hr>
						    	<h4>Ads Settings</h4>
    							<div class="row">
    							    <div class="col-md-6">
    									<div class="form-group">
    										<label>Admob ads id</label>
    										<div class="colsm">
    										<input type="text" name="admob_id" value="<?=$val['admob_id']?>" class="form-control">
    										</div>
    									</div>
    								</div>
    								<div class="col-md-6">
    									<div class="form-group">
    										<label>Admob Banner ads id</label>
    										<div class="colsm">
    										<input type="text" name="admob_banner_id" value="<?=$val['admob_banner_id']?>" class="form-control">
    										</div>
    									</div>
    								</div>
    								<div class="col-md-6">
    									<div class="form-group">
    										<label>Admob Interstitial ads id</label>
    										<div class="colsm">
    										<input type="text" name="admob_interstitial_id" value="<?=$val['admob_interstitial_id']?>" class="form-control">
    										</div>
    									</div>
    								</div>
    								<div class="col-md-6">
    									<div class="form-group">
    										<label>Admob native ads id</label>
    										<div class="colsm">
    										<input type="text" name="admob_native_id" value="<?=$val['admob_native_id']?>" class="form-control">
    										</div>
    									</div>
    								</div>
    							</div>
    							<hr>
						    	<h4>App Background Settings</h4>
    							<div class="row">
    								<div class="col-md-6">
    									<div class="form-group">
    										<label>Background start color</label>
    										<div class="colsm">
    										<input type="text" name="start_color" value="<?=$val['start_color']?>" class="form-control">
    										</div>
    									</div>
    								</div>
    								<div class="col-md-6">
    									<div class="form-group">
    										<label>Background end color</label>
    										<div class="colsm">
    										<input type="text" name="end_color" value="<?=$val['end_color']?>" class="form-control">
    										</div>
    									</div>
    								</div>
    								<div class="col-md-6">
									<div class="form-group">
										<label>Cover Image</label>
										<div class="colsm">
										<input type="file" name="cover_image" id="cover_image" class="dropify-image" data-max-file-size="1M" data-default-file="<?php if($val['cover_image'] !=""){ echo siteUrl.$val['cover_image'];}?>" data-allowed-file-extensions="jpg jpeg png gif" />
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Background Image</label>
										<div class="colsm">
										<input type="file" name="background_image" id="background_image" class="dropify-image" data-max-file-size="1M" data-default-file="<?php if($val['background_image'] !=""){ echo siteUrl.$val['background_image'];}?>" data-allowed-file-extensions="jpg jpeg png gif" />
										</div>
									</div>
								</div>
								<input type="hidden" name="old_cover" value="<?=$val['cover_image']?>">
								<input type="hidden" name="old_background" value="<?=$val['background_image']?>">
    							</div>
    							<hr>
							    <h4>App Content</h4>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>About Us</label>
											<div class="colsm">
											<textarea name="aboutus" rows="6" class="form-control"><?=$val['about_us']?></textarea>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Our Service</label>
											<div class="colsm">
											<textarea name="service" rows="6" class="form-control"><?=$val['our_service']?></textarea>
											</div>
										</div>
									</div>
								</div>
                                <div class="row">
                                    <div class="col-lg-6">
                                     <input type="hidden" name="edit_id" value="<?=$val['id']?>">
									<input type="submit" name="" value="Update" class="btn btn-info" onclick="update('applist','<?=siteUrl;?>')">
                                    </div>
                                </div>
                            </form>
							<?php }else{ ?>
							<form id="signupForm" role="form" method="post" class="form-horizontal" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>App Name</label>
										<div class="colsm">
										<input type="text" name="appname" value="" class="form-control">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										
										<label>Radio Streaming link</label>
										<div class="colsm">
										<input type="text" name="radio_stream" value="" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Tv streaming link</label>
										<div class="colsm">
										<input type="text" name="tv_stream" value="" class="form-control">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Website</label>
										<div class="colsm">
										<input type="text" name="website" value="" class="form-control">
										</div>
										
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Facebook</label>
										<div class="colsm">
										<input type="text" name="facebook" value="" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Whatsapp</label>
										<div class="colsm">
										<input type="text" name="whatsapp" value="" class="form-control">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Youtube</label>
										<div class="colsm">
										<input type="text" name="youtube" value="" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Twitter</label>
										<div class="colsm">
										<input type="text" name="twitter" value="" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Instagram</label>
										<div class="colsm">
										<input type="text" name="instagram" value="" class="form-control">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Privacy Policy</label>
										<div class="colsm">
										<input type="text" name="privacy_policy" value="" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Facebook ID</label>
										<div class="colsm">
										<input type="text" name="facebook_id" value="" class="form-control">
										</div>
									</div>
								</div>
							</div>
							<hr>
							<h4>Ads Settings</h4>
							<div class="row">
							    <div class="col-md-6">
									<div class="form-group">
										<label>Admob ads id</label>
										<div class="colsm">
										<input type="text" name="admob_id" value="" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Admob Banner ads id</label>
										<div class="colsm">
										<input type="text" name="admob_banner_id" value="" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Admob Interstitial ads id</label>
										<div class="colsm">
										<input type="text" name="admob_interstitial_id" value="" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Admob native ads id</label>
										<div class="colsm">
										<input type="text" name="admob_native_id" value="" class="form-control">
										</div>
									</div>
								</div>
							</div>
							<hr>
							<h4>App Background Settings</h4>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Background start color</label>
										<div class="colsm">
										<input type="text" name="start_color" value="" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Background end color</label>
										<div class="colsm">
										<input type="text" name="end_color" value="" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Cover Image</label>
										<div class="colsm">
										<input type="file" name="cover_image" id="cover_image" class="dropify-image" data-max-file-size="1M" data-allowed-file-extensions="jpg jpeg png gif" />
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Background Image</label>
										<div class="colsm">
										<input type="file" name="background_image" id="background_image" class="dropify-image" data-max-file-size="1M" data-allowed-file-extensions="jpg jpeg png gif" />
										</div>
									</div>
								</div>
							</div>
							<hr>
							<h4>App Content</h4>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>About Us</label>
										<div class="colsm">
										<textarea name="aboutus" rows="6" class="form-control"></textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Our Service</label>
										<div class="colsm">
										<textarea name="service" rows="6" class="form-control"></textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
								<button type="submit" onclick="Save('applist','<?=siteUrl;?>')"; class="btn btn-info" name="signup" value="Sign up">
								  Add new app                                     </button>
								</div>
							</div>
						</form>
							<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	