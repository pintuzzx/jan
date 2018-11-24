<html>
	<head>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/mystyle.css">
		<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	</head>
	<body>
		<!-- <section class="login-block"> -->
		<div class="container-fluid login-block ">
		<div class="row">
			<div class="col-lg-6 col-md-12 col-sm-10 login-part">
				<div class="text-center">
					<label class="text-danger"><h3><b><u>Login Now</u></b></h3></label>
				</div>
				<div id="infoMessage"><?php echo $message;?></div>
				<form class="form-horizontal" method="POST" action="<?php echo base_url();?>auth/login">
					<div class="form-group">
						<label for="identity" class="control-label"><?php echo lang('login_identity_label', 'identity');?> </label>
						<!-- <div class="col-md-9"> -->
							<input name="identity" id="identity" type="text" class="form-control"  placeholder="" />
						<!-- </div> -->
					</div>
					
					<div class="form-group">
						<label for="identity" class="control-label"><?php echo lang('login_password_label', 'password');?> </label>
						<!-- <div class="col-md-9"> -->
							<input name="password" id="password" type="password" class="form-control"  placeholder="" />
						<!-- </div> -->
					</div>
					
					<div class="form-group">
						<!-- <div class="col-md-9"> -->
						  <div class="checkbox">
							<label>
							  <input name="remember" value="1" id="remember" type="checkbox"> <?php echo lang('login_remember_label', 'remember');?>
							</label>
						  <!-- </div> -->
						</div>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="<?php echo lang('login_submit_btn'); ?>" class="btn btn-info"> 
						<input type="reset"  value="Cancel" class="btn btn-danger"> 
					</div>
					
				</form>
					<p class="col-md-offset-4"><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
					<!-- <p class="col-md-offset-3"><a href="<?php //echo base_url();?>auth/create_user">For new User SignUp</a></p> -->
			</div>
			<!-- <div class="col-md-6">
				 <h1>this is image section</h1> 
			</div> -->
			</div>
		</div>
<!-- </section> -->
	<body>
</html>