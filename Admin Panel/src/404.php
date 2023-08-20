<?php
$load = new load;
	if($load->isLogin())
	{
	echo ("<script>location.href='/'</script>");
	}
	else
	{	
?>
<body class="user-body">
<!-- Start user area -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="logo">
                                <a href="#">
                                    <img src="http://mobapp.mcqbook.com/uploaded_file/files/img/1548157822.png" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="qz-user-title">
                                <h1>Sign Up</h1>
                            </div>
                            <h5>Hello there, Sign up and Join with Us</h5>
                                <span class="text-left">
                                                                    </span>

                            <form method="POST" action="http://mobapp.mcqbook.com/save" accept-charset="UTF-8"><input name="_token" type="hidden" value="rmAsbyRKblWYRxlQhPPhKczvV49rdi9poJrWZ9Wn">
                            <input type="hidden" name="_token" value="rmAsbyRKblWYRxlQhPPhKczvV49rdi9poJrWZ9Wn">
                            <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" placeholder="Username">
                                            <div class="qz-input-icon">
                                                <span class="flaticon-user-1"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Email">
                                            <div class="qz-input-icon">
                                                <span class="flaticon-mail"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" placeholder="Password">
                                            <div class="qz-input-icon">
                                                <span class="flaticon-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                                            <div class="qz-input-icon">
                                                <span class="flaticon-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="phone" class="form-control" placeholder="Phone">
                                            <div class="qz-input-icon">
                                                <span class="flaticon-phone-call"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Sign Up</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="qz-user-footer">
                                <h4>Already have an account ? <a href="http://mobapp.mcqbook.com/signin">Sign In</a> </h4>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
	}
?>