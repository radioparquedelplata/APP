<?php
$load = new load;
	if($load->isLogin())
	{
	echo ("<script>location.href='/'</script>");
	}
	else
	{	
?>
<body>
	<div class="loader"/></div>
	<div id="app">
		<section class="section">
			<div class="container mt-5">
				<div class="row" id="loginbox">
					<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
						<div class="card">
							<div class="card-body">
								<div class="qz-user-title">
									<center><h3 id="resp">Sign in</h3></center>
								</div>
								<form role="form" id="loginForm" action="<?=siteUrl?>" method="POST" style="margin: 30px 0px;">
								<div class="form-group">
										<input type="email" name="username" class="form-control" placeholder="Enter email" required>
										<div class="qz-input-icon">
											<span class="flaticon-mail"></span>
										</div>
									</div>
									<div class="form-group">
										<input type="password" name="password" class="form-control" placeholder="Password">
										<div class="qz-input-icon">
											<span class="flaticon-lock"></span>
										</div>
									</div>
									<button type="submit" name="sub" onclick="login()" class="btn btn-primary btn-block">Sign in</button>
									<div class="text-center text-muted mt-3">
										 
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!--div class="row" id="signupbox" style="display:none;">
					<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
						<div class="card">
							<div class="card-body">
								<div class="qz-user-title">
									<center><h3>Forget Password</h3></center>
									<center><p id="response">Enter your email address and we will send you a link to reset your password.</p></center>
								</div>
								<form method="post" role="form" action="" id="forgetForm" method="POST" style="margin: 30px 0px;">
									<div class="form-group">
										<input type="email" name="email" class="form-control" placeholder="Enter email" required>
										<div class="qz-input-icon">
											<span class="flaticon-mail"></span>
										</div>
									</div>
									<input type="hidden" name="faction" value="faction">
									<button type="submit" name="sub" onclick="forgetpass('<?=siteUrl;?>')" class="btn btn-primary btn-block">Submit</button>
									
								</form>
								<center><h5><a id="signinlink" href="javascript:void(0)" onclick="$('#signupbox').hide(); $('#loginbox').show()">Go back</a></h5></center>
									
							</div>
						</div>
					</div>
				</div-->
			</div>
		</section>
	</div>
	<style>
		footer.main-footer {
		display: none;
		}
	</style>
<?php 
	}
?>