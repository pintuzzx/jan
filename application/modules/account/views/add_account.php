	<div class="container-fluid">
	  <!-- Breadcrumbs-->
	  <ol class="breadcrumb">
		<li class="breadcrumb-item">
		  <a href="index.html">Dashboard</a>
		</li>
		<li class="breadcrumb-item">
		  <a href="<?php echo base_url();?>Account">Accounts</a>
		</li>
		<li class="breadcrumb-item active">Open Account</li>
	  </ol>
	  <!-- Page Content -->
	  
	  <span style="font-size:40px;">Open Account</span>
	  <hr>
	  <div class="row">
		  <div class="col-sm">
			<form id="account_open_form" method="POST" action="<?php echo base_url(); ?>Account/open_account" enctype="multipart/form-data">  
				<div class="form-group row">
					<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Branch</label>
					<div class="col-sm-10">
						<select class="form-control" id="account_branch" name="account_branch">
							<option value="0">-- Select Branch --</option>
							<?php if(isset($branches)){
								if(count($branches)>0){
									foreach($branches as $branch){ ?>
										<option value="<?php echo $branch['b_id']; ?>"><?php echo $branch['name']; ?></option>
							  <?php }
								}
							}?>
						</select>
						<div class="text-danger" style="display:none;" id="member_refrence_error"></div>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Members</label>
					<div class="col-sm-10">
						<select class="form-control" id="account_members" name="account_members">
							<option value="0">-- Select User --</option>
						</select>
						<div class="text-danger" style="display:none;" id="member_refrence_error"></div>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Account Type</label>
					<div class="col-sm-10">
						<select class="form-control" id="account_type" name="account_type">
							<option value="0">-- Select Account Type --</option>
							<option value="55">Saving</option>
							<option value="04">Janmit Plus</option>
							<option value="02">Janmit Fund</option>
						</select>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Amount</label>
					<div class="col-sm-10" style="float:right;width:100%;">
						<input type="text" class="form-control" id="account_amount" name="account_amount" >
					</div>
				</div>
				
				<div id="duration" style="display:none;">
					<div class="form-group row">
						<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Duration</label>
						<div class="col-sm-10" style="float:right;width:100%;">
							<input type="text" class="form-control" id="account_duration" name="account_duration" disabled >
						</div>
					</div>					
				</div>
				
				<hr>
				<div class="form-group row">
					<div class="col-sm-10">
					<button type="button" id="account_form_submit" class="btn btn-primary">Submit</button>
					<button type="button" id="account_form_reset" class="btn btn-default">Cancel</button>
					</div>
				</div>
			</form>
				
			</div>
			<div class="col-sm well">
				<div class="form-group col">
					<label for="inputEmail4">First Name</label>
					<input type="text" class="form-control" name="account_first_name" id="account_first_name" placeholder="Please enter member first name">
					<div class="text-danger" style="display:none;" id="account_first_name_error"></div>
				</div>
				<div class="form-group col">
					<label for="inputEmail4">Last Name</label>
					<input type="text" class="form-control" name="account_last_name" id="account_last_name" placeholder="Please enter member last name">
					<div class="text-danger" style="display:none;" id="account_last_name_error"></div>
				</div>
				<div class="form-group col">
					<label for="inputPassword4">Contact No.</label>
					<input type="text" class="form-control" name="account_member_contact" id="account_member_contact" placeholder="member contact no.">
					<div class="text-danger" style="display:none;" id="member_cast_error"></div>
				</div>				
				<div class="form-group col">
					<label for="inputPassword4">Address</label>
					<textarea id="account_member_address" name="account_member_address" class="form-control" placeholder="Member Address"></textarea>
					<div class="text-danger" style="display:none;" id="member_cast_error"></div>
				</div>
			</div>
		</div>
	</div>
	
	
	
	<script>
	var baseUrl = $('#base_url').val();
		$(document).on('click','#account_form_submit',function(){
			var form_valid = true;
			if(form_valid){
				$('#account_open_form').ajaxForm({
					dataType : 'json',
					beforeSubmit:function(e){
					},
					success:function(response){
					  if(response.status == 200){
						alert(response.msg +'\nLast created Account Id : '+ response.data);
						location.reload();
					  }
					  else{
						alert(response.msg);
					  }
					}
				}).submit();
			}
		});
		
		$(document).on('change','#account_members',function(){
			var m_id = $(this).val();
			$.ajax({
				type : 'POST',
				url : baseUrl + 'Account/ajax/member_detail',
				dataType : 'json',
				data : {
					'm_id' : m_id
				},
				success : function (response){
					console.log(response);
					if(response.status == 200){
						$('#account_first_name').val(response.data[0]['first_name']);
						$('#account_last_name').val(response.data[0]['last_name']);
						$('#account_member_contact').val(response.data[0]['phone']);
						$('#account_member_address').html(response.data[0]['address']);
					}
				}
			});
		});
		
		$(document).on('change','#account_type',function(){
			var id = $(this).val();
			if(id == 55){
				$('#duration').css('display','none');
			}
			else if(id == 2){
				$('#duration').css('display','block');
				$('#account_duration').val('3');
			}
			else if(id == 4){
				$('#duration').css('display','block');
				$('#account_duration').val('5');
			}
			else{
				$('#duration').css('display','block');
			}
		});
	
	$(document).on('change','#account_branch',function(){
		get_allusers();
	});
	
	get_allusers();
	function get_allusers(){
		var b_id = $('#account_branch').val();
	
		$.ajax({
		type : 'POST',
		url : baseUrl + 'Account/ajax/member_list',
		dataType : 'json',
		data : {
			'b_id' : b_id
		},
		success : function (response){
			if(response.status == 200){
				var x = '';
				$.each(response.data,function(key,value){
					x = x + '<option value="'+ value.id +'">'+ value.username +'</option>' 
				});
				$('#account_members').html(x);
			}
			else{
				$('#account_members').html('<option value="0">No record found.</option>');
			}
		}
		});
	}
	</script>