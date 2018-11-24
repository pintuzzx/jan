	<div class="container-fluid">
		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Add Employee</li>
        </ol>
		  <div class="col-sm">
		  <div id="infoMessage"><?php echo $message;?></div>
			<form class="form-horizontal" method="post" action="<?php echo base_url();?>auth/create_user" enctype="multipart/form-data">
				<div class="d-flex justify-content-around"><b>Employee Genral Info.</b><a href="<?php echo base_url();?>auth/users_list">Show Employee List</a></div>
				<hr>
				<div class="col">
					<div class="form-group">
						<label class="col control-label">First Name</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col control-label">Last Name</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col control-label">Photo</label>
						<div class="col-sm-6">
							<input type="file" id="userfile" name="userfile" class="form-control" size="200">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col control-label">signature</label>
						<div class="col-sm-6">
							<input type="file" id="userfile1" name="userfile1" class="form-control" size="200">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col control-label">DOB</label>
						<div class="col-sm-6">
							<input type="date" class="form-control" id="dob" name="dob">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col control-label">Cast</label>
						<div class="col-sm-6">
							<select class="form-control" id="cast" name="cast">
								<option value="0">Select Cast</option>
								<option value="gen">GENRAL</option>
								<option value="obc">OBC</option>
								<option value="st">ST</option>
								<option value="sc">SC</option>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col control-label">Gender</label>
						<div class="col-sm-6">
							<select class="form-control" id="gender" name="gender">
								<option value="0">Select Gender</option>
								<option value="m">Male</option>
								<option value="f">Female</option>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col control-label">Email Id</label>
						<div class="col-sm-6">
							<input type="email" class="form-control" id="email" name="email">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col control-label">Contact No.</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="phone" name="phone">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col control-label">Company</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="company" name="company">
						</div>
					</div>

					<div class="form-group">
						<label class="col control-label">Branch Name</label>
						<div class="col-sm-6">
							<select class="form-control" id="branch_name" name="branch_name">
								<option value="1">Bhilai</option>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col control-label">Address</label>
						<div class="col-sm-6">
							<textarea type= "text" col="" rows="5" class="form-control" id="address" name="address"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col control-label">Password</label>
						<div class="col-sm-6">
							<input type="password" class="form-control" id="password" name="password">
						</div>
					</div>
					<div class="form-group">
						<label class="col control-label">Confirm Password</label>
						<div class="col-sm-6">
							<input type="password" class="form-control" id="password_confirm" name="password_confirm">
						</div>
					</div>
					<div class="form-group">
						<label class="col control-label">Member of groups</label>
						<div class="col-sm-6">
						<?php foreach ($groups as $group):?>
							<label class="checkbox">
							<input type="checkbox" name="groups[]" id="groups[]" value="<?php echo $group['id'];?>">
							<?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
							</label>
						<?php endforeach?>		
						</div>
					</div>
					<hr>
					<div class="form-group">
						<input type="submit" class="btn btn-info" value="submit">
						<input type="reset" class="btn btn-danger" value="Cancel">
					</div>
				</div>
			</form>
		</div>
	</div>

		


