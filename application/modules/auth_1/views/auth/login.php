<!--<html>
	<head>
		<link rel="stylesheet" href="<?php //echo base_url();?>assets/css/bootstrap.min.css">
		<script src="<?php //echo base_url(); ?>assets/js/jquery.min.js"></script>
		<script src="<?php //echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	</head>
	<body>-->
		<div class="container-fluid">
			<div class="col-sm-offset-3 col-sm-6" style="border-bottom:solid 1px;">
				<div class="col-sm-12 alert alert-success text-center">
					<label class=""><h1><?php echo lang('login_heading');?></h1></label>
				</div>
				<div id="infoMessage"><?php echo $message;?></div>
				
				<form class="form-horizontal" method="POST" action="<?php echo base_url();?>auth/login">
					<div class="form-group">
						<label for="identity" class="col-sm-3 control-label"><?php echo lang('login_identity_label', 'identity');?> </label>
						<div class="col-sm-9">
							<input name="identity" id="identity" type="text" class="form-control"  placeholder="">
						</div>
					</div>
					
					<div class="form-group">
						<label for="identity" class="col-sm-3 control-label"><?php echo lang('login_password_label', 'password');?> </label>
						<div class="col-sm-9">
							<input name="password" id="password" type="password" class="form-control"  placeholder="">
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-9">
						  <div class="checkbox">
							<label>
							  <input name="remember" value="1" id="remember" type="checkbox"> <?php echo lang('login_remember_label', 'remember');?>
							</label>
						  </div>
						</div>
					</div>
					<div class="col-sm-offset-3">
						<input type="submit" name="submit" value="<?php echo lang('login_submit_btn'); ?>" class="btn btn-info"> 
						<input type="reset"  value="Cancel" class="btn btn-danger"> 
					</div>
					
				</form>
					<p class="col-sm-offset-3"><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
					<p class="col-sm-offset-3"><a href="<?php echo base_url();?>auth/create_user">For new User SignUp</a></p>
			</div>
		</div>
	<!--<body>
</html>-->