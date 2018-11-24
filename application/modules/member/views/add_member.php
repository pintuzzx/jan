	<div class="container-fluid">
	  <!-- Breadcrumbs-->
	  <ol class="breadcrumb">
		<li class="breadcrumb-item">
		  <a href="index.html">Dashboard</a>
		</li>
		<li class="breadcrumb-item active">Member master</li>
	  </ol>
	  <!-- Page Content -->
	  
	  <span style="font-size:40px;">Add New Member</span>
	  <span class="float-right"><a href="<?php echo base_url();?>Member">Members List</a></span>
	  <hr>
	  <div class="row">
		  <div class="col-sm">
			<form id="member_form" method="POST" action="<?php echo base_url(); ?>member/member_create" enctype="multipart/form-data">  
				<div class="form-row">
					<div class="form-group col">
						<label for="inputEmail4">Branch</label>
						<select name="member_branch" id="member_branch" class="form-control">
							<option value="0">Select Branch</option>
							<?php if(isset($branches)){
								if(count($branches)>0){
									foreach($branches as $branch){ ?>
										<option value="<?php echo $branch['b_id']; ?>"><?php echo $branch['name']; ?></option>
							  <?php }
								}
							}?>
						</select>
						<div class="text-danger" style="display:none;" id="member_branch_error"></div>
					</div>
					<div class="form-group col">
						<label for="inputEmail4">Gender</label>
						<select name="member_gender" id="member_gender" class="form-control">
							<option value="0">Select Gender</option>
							<option value="m">Male</option>
							<option value="f">Fe-Male</option>
						</select>
						<div class="text-danger" style="display:none;" id="member_gender_error"></div>
					</div>
					<div class="form-group col">
						<label for="inputPassword4">DOB</label>
						<input type="date" name="member_dob" id="member_dob" class="form-control">
						<div class="text-danger" style="display:none;" id="member_dob_error"></div>
					</div>
					<div class="form-group col">
						<label for="inputPassword4">Cast</label>
						<select name="member_cast" id="member_cast" class="form-control">
							<option value="0">Select Cast</option>
							<option value="gen">Genral</option>
							<option value="obc">OBC</option>
							<option value="st">ST</option>
							<option value="sc">SC</option>
						</select>
						<div class="text-danger" style="display:none;" id="member_cast_error"></div>
					</div>
				</div>
				
				<div class="form-row">
					<div class="form-group col">
						<label for="inputEmail4">First Name</label>
						<input type="text" class="form-control" id="member_first_name" name="member_first_name" placeholder="First Name">
						<div class="text-danger" style="display:none;" id="member_first_name_error"></div>
					</div>
					<div class="form-group col">
						<label for="inputPassword4">Last Name</label>
						<input type="text" class="form-control" id="member_last_name" name="member_last_name" placeholder="Last Name">
						<div class="text-danger" style="display:none;" id="member_last_name_error"></div>
					</div>
					<div class="form-group col">
						<label for="inputPassword4">Email Id</label>
						<input type="text" class="form-control" id="member_mail" name="member_mail" placeholder="Enter Email Id">
						<div class="text-danger" style="display:none;" id="member_mail_error"></div>
					</div>
				</div>
				
				<div class="form-row">
					<div class="form-group col-2">
						<label for="inputEmail4">Father / Husband</label>
						<select class="form-control" id="member_f_h" name="member_f_h">
							<option value="0">-- Select --</option>
							<option value="father">Father</option>
							<option value="husband">Husband</option>
						</select>
						<div class="text-danger" style="display:none;" id="member_f_h_error"></div>
					</div>
					<div class="form-group col-4">
						<label for="inputPassword4">Name</label>
						<input type="text" class="form-control" id="member_f_h_name" name="member_f_h_name" placeholder="Father / Husband Name">
						<div class="text-danger" style="display:none;" id="member_f_h_name_error"></div>
					</div>
					<div class="form-group col-6">
						<label for="inputPassword4">Contact No.</label>
						<input type="text" class="form-control" id="member_f_h_contactno" name="member_f_h_contactno" placeholder="Please enter Contact No.">
						<div class="text-danger" style="display:none;" id="member_f_h_contactno_error"></div>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm">Parmanent Address</label>
					<div class="col-sm-11">
						<textarea class="form-control" col="" rows="" id="member_parmanent_address" name="member_parmanent_address"></textarea>
						<div class="text-danger" style="display:none;" id="member_parmanent_address_error"></div>
					</div>
				</div>
				<hr>
				
				<div class="form-row">
					<div class="form-group col">
						<label for="inputEmail4">Business</label>
						<select id="member_business" name="member_business" class="form-control">
							<option value="0">Select Business</option>
							<option value="job">professional</option>
							<option value="business">Business Man</option>
							<option value="house_wife">House Wife</option>
							<option value="farmer">Farmer</option>	
							<option value="other">Other</option>
						</select>
						<div class="text-danger" style="display:none;" id="member_business_error"></div>
					</div>
					<div class="form-group col">
						<label for="inputPassword4">Business Address</label>
						<textarea class="form-control" col="" rows="" id="member_business_address" name="member_business_address" placeholder="Business Address"></textarea>
						<div class="text-danger" style="display:none;" id="member_business_address_error"></div>
					</div>
					<div class="form-group col">
						<label for="inputPassword4">Business Contact No.</label>
						<input type="text" class="form-control" id="member_business_contactno" name="member_business_contactno" placeholder="Business Contact No." >
						<div class="text-danger" style="display:none;" id="member_business_contactno_error"></div>
					</div>
				</div><hr>		
				
				<div class="form-row">
					<div class="form-group col">
						<label for="inputEmail4">Nominee Name</label>
						<input type="text" class="form-control" id="member_nominee_name" name="member_nominee_name" placeholder="Nominee Name">
						<div class="text-danger" style="display:none;" id="member_nominee_name_error"></div>
					</div>
					<div class="form-group col">
						<label for="inputPassword4">Nominee Age</label>
						<input type="number" class="form-control" id="member_nominee_age" name="member_nominee_age" min="0" max="99" placeholder="Nominee Age">
						<div class="text-danger" style="display:none;" id="member_nominee_age_error"></div>
					</div>
					<div class="form-group col">
						<label for="inputPassword4">Relation</label>
						<input type="text" class="form-control" id="member_nominee_relation" name="member_nominee_relation" placeholder="Nominee Relation">
						<div class="text-danger" style="display:none;" id="member_nominee_relation_error"></div>
					</div>
					<div class="form-group col">
						<label for="inputPassword4">Is Member</label>
						<select name="memeber_is_member" class="form-control">
							<option value="0">No</option>
							<option value="1">Yes</option>
						</select>
						<div class="text-danger" style="display:none;" id="memeber_is_member_error"></div>
					</div>
				</div><hr>
				
				<div class="form-group row">
					<label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm">Image</label>
					<div class="col-sm-11">
						<input type="file" name="member_photo" id="member_photo" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm">Amount</label>
					<div class="col-sm-11">
						<input type="text" name="member_amount" id="member_amount" class="form-control">
						<div class="text-danger" style="display:none;" id="member_amount_error"></div>
					</div>
				</div>
				<div class="form-group row">
					<label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm">Signature</label>
					<div class="col-sm-11">
						<input type="file" name="member_signature" id="member_signature" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm">Refrence By</label>
					<div class="col-sm-11">
						<select class="form-control" id="member_refrence" name="member_refrence">
							<option value="0">Select User</option>
							<?php if(isset($users)){
								if(count($users)>0){
									foreach($users as $user){ ?>
										<option value="<?php echo $user['id']; ?>"><?php echo $user['username']; ?></option>
							  <?php }
								}
							}?>
						</select>
						<div class="text-danger" style="display:none;" id="member_refrence_error"></div>
					</div>
				</div>
				<hr>
				<div class="form-group row">
					<div class="col-sm-10">
					<button type="button" id="member_form_submit" class="btn btn-primary">Submit</button>
					<button type="button" id="member_form_reset" class="btn btn-default">Cancel</button>
					</div>
				</div>
			</form>
		  </div>
	  </div>
	</div>
	
	
	
	<script>
		$(document).on('click','#member_form_submit',function(){
			var form_valid = true;
			if($('#member_branch').val() == 0){
				$('#member_branch_error').html('Please select Branch.').css('display','block');
				form_valid = false;
			}
			else{
				$('#member_branch_error').css('display','none');
				form_valid = true;
			}
			if($('#member_gender').val() == 0){
				$('#member_gender_error').html('Please select Gender.').css('display','block');
				form_valid = false;
			}
			else{
				$('#member_gender_error').css('display','none');
				form_valid = true;
			}
			if($('#member_cast').val() == 0){
				$('#member_cast_error').html('Please select Cast.').css('display','block');
				form_valid = false;
			}
			else{
				$('#member_cast_error').css('display','none');
				form_valid = true;
			}
			if($('#member_dob').val() == ''){
				$('#member_dob_error').html('Please select DOB.').css('display','block');
				form_valid = false;
			}
			else{
				$('#member_dob_error').css('display','none');
				form_valid = true;
			}
			if($('#member_first_name').val() == ''){
				$('#member_first_name_error').html('Please enter First Name.').css('display','block');
				form_valid = false;
			}
			else{
				$('#member_first_name_error').css('display','none');
				form_valid = true;
			}
			if($('#member_last_name').val() == ''){
				$('#member_last_name_error').html('Please enter Last Name.').css('display','block');
				form_valid = false;
			}
			else{
				$('#member_last_name_error').css('display','none');
				form_valid = true;
			}
			if($('#member_mail').val() == ''){
				$('#member_mail_error').html('Please enter Mail Id.').css('display','block');
				form_valid = false;
			}
			else{
				$('#member_mail_error').css('display','none');
				form_valid = true;
			}
			if($('#member_f_h').val() == 0){
				$('#member_f_h_error').html('Please F / H.').css('display','block');
				form_valid = false;
			}
			else{
				$('#member_f_h_error').css('display','none');
				form_valid = true;
			}
			if($('#member_f_h_name').val() == 0){
				$('#member_f_h_name_error').html('Please F/H Name.').css('display','block');
				form_valid = false;
			}
			else{
				$('#member_f_h_name_error').css('display','none');
				form_valid = true;
			}
			if($('#member_f_h_contactno').val() == 0){
				$('#member_f_h_contactno_error').html('Please F/H Contact No.').css('display','block');
				form_valid = false;
			}
			else{
				$('#member_f_h_contactno_error').css('display','none');
				form_valid = true;
			}
			if($('#member_parmanent_address').val() == 0){
				$('#member_parmanent_address_error').html('Please F/H Address.').css('display','block');
				form_valid = false;
			}
			else{
				$('#member_parmanent_address_error').css('display','none');
				form_valid = true;
			}
			// if($('#member_business').val() == 0){
				// $('#member_business_error').html('Please select Business.').css('display','block');
				// form_valid = false;
			// }
			// else{
				// $('#member_business_error').css('display','none');
				// form_valid = true;
			// }
			
			if($('#member_business').val() != 0){
				if($('#member_business_address').val() == 0){
					$('#member_business_address_error').html('Please enter Business Address.').css('display','block');
					form_valid = false;
				}
				else{
					$('#member_business_address_error').css('display','none');
					form_valid = true;
				}
				if($('#member_business_contactno').val() == 0){
					$('#member_business_contactno_error').html('Please enter Business Contact.').css('display','block');
					form_valid = false;
				}
				else{
					$('#member_business_contactno_error').css('display','none');
					form_valid = true;
				}
			}
			if($('#member_nominee_name').val() == 0){
				$('#member_nominee_name_error').html('Please enter Nominee Name.').css('display','block');
				form_valid = false;
			}
			else{
				$('#member_nominee_name_error').css('display','none');
				form_valid = true;
			}
			if($('#member_nominee_age').val() == 0){
				$('#member_nominee_age_error').html('Please enter Nominee Age.').css('display','block');
				form_valid = false;
			}
			else{
				$('#member_nominee_age_error').css('display','none');
				form_valid = true;
			}
			if($('#member_nominee_relation').val() == 0){
				$('#member_nominee_relation_error').html('Please enter Nominee Relation.').css('display','block');
				form_valid = false;
			}
			else{
				$('#member_nominee_relation_error').css('display','none');
				form_valid = true;
			}
			if($('#memeber_is_member').val() == 0){
				$('#memeber_is_member_error').html('Please select nominee is member.').css('display','block');
				form_valid = false;
			}
			else{
				$('#memeber_is_member_error').css('display','none');
				form_valid = true;
			}
			if($('#member_amount').val() == 0){
				$('#member_amount_error').html('Please enter amount.').css('display','block');
				form_valid = false;
			}
			else{
				$('#member_amount_error').css('display','none');
				form_valid = true;
			}
			if($('#member_refrence').val() == 0){
				$('#member_refrence_error').html('Please Select refrence users.').css('display','block');
				form_valid = false;
			}
			else{
				$('#member_amount_error').css('display','none');
				form_valid = true;
			}
			
			
			if(form_valid){
				$('#member_form').ajaxForm({
					dataType : 'json',
					beforeSubmit:function(e){
					},
					success:function(response){
					  if(response.status == 200){
							alert(response.msg);
					  }
					  else{
							alert(response.msg);
					  }
					}
				}).submit();
			}
		});
	</script>