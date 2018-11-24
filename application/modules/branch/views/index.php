	<div class="container-fluid">
	  <!-- Breadcrumbs-->
	  <ol class="breadcrumb">
		<li class="breadcrumb-item">
		  <a href="index.html">Dashboard</a>
		</li>
		<li class="breadcrumb-item active">Branch master</li>
	  </ol>
	  <!-- Page Content -->
	  <h1>Branch master</h1>

	  <hr>
	  <div class="row">
		  <div class="col-sm">
			<form name="f1" id="branch_form" method="POST" action="<?php echo base_url();?>branch/create_branch" class="form form-horizontal">
				<div class="form-group">
					<label class="col-sm-2 control-label">Name</label>
					<div class="col-sm-10">
						<input type="hidden" name="branch_id" id="branch_id" placeholder="Branch Id" class="form-control">
						<input type="text" name="branch_name" id="branch_name" placeholder="Branch Name" class="form-control">
						<div id="branch_name_error" class="text-danger" style="display:none;"></div>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Address</label>
					<div class="col-sm-10">
						<textarea id="branch_address" name="branch_address" placeholder="Enter Address" class="form-control"></textarea>
						<div id="branch_name_error" class="text-danger" style="display:none;"></div>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Contact No.</label>
					<div class="col-sm-10">
						<textarea id="branch_contactno" name="branch_contactno" placeholder="Enter Branch Contact no." class="form-control"></textarea>
						<div id="branch_name_error" class="text-danger" style="display:none;"></div>
					</div>
				</div>
				
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input type="button" id="branch_submit" value="Submit">
						<input type="button" id="branch_update" value="Update" style="display:none;">
						<input type="reset" id="branch_form_cancel" value="Cancel">
					</div>
				</div>
				
			</form>
		  </div>
		  
		  <div class="col-sm">
			<div class="table-responsive">
				<table class="table table-horizontal">
					<thead>
						<tr>
							<th>S.No.</th>
							<th>Branch Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="branch_list">
					</tbody>
				</table>
			</div>
		  </div>
	  </div>
	</div>
	
	
	<script>
		var baseUrl = $('#base_url').val();
		
		branch_list();
		function branch_list(){
			console.log('branch_list called');
			$.ajax({
				type : 'POST',
				url : baseUrl + 'branch/Ajax/branch_list',
				dataType : 'json',
				data : {
				},
				success : function (response){
					if(response.status == 200){
						var x = '';
						$.each(response.data,function(key,value){
							x = x + '<tr>'+
										'<td>'+ parseInt(key + 1) +')</td>'+
										'<td>'+ value.name +'</td>'+
										'<td>'+
											'<a href="javascript:void(0);" class="branch_edit" data-branch_address="'+ value.address +'" data-branch_name="'+ value.name +'" data-branch_contact="'+ value.contact_no +'" data-branch_id="'+ value.b_id +'"><i class="fas fa-pencil-alt"></i></a>&nbsp;'+
											'<a href="javascript:void(0);" class="branch_delete" data-branch_id="'+ value.b_id +'"><i class="far fa-trash-alt"></i></a>'+
										'</td>'+
									'</tr>';
						});
						$('#branch_list').html(x);
					}
					else{
						$('#branch_list').html(response.msg);
					}
				}
			});
		}

		$(document).on('click','.branch_edit',function(){
			$('#branch_id').val($(this).data('branch_id'));
			$('#branch_name').val($(this).data('branch_name'));
			$('#branch_address').val($(this).data('branch_address'));
			$('#branch_contactno').val($(this).data('branch_contact'));
			$('#branch_submit').css('display','none');
			$('#branch_update').css('display','block');
		});
		
		
		$(document).on('click','#branch_submit,#branch_update',function(){
			$('#branch_form').ajaxForm({
				dataType : 'json',
			    beforeSubmit:function(e){
					$('#loader').modal('show');
			    },
			    success:function(response){
			  	  if(response.status == 200){
						alert(response.msg);
                 $('#branch_form_cancel').trigger('click');
			      }
			      else{
						alert(response.msg);
			      }
		             branch_list();
			    }
			}).submit();		
		});
		
		$(document).on('click','#branch_form_cancel',function(){
			$('#branch_submit').css('display','block');
			$('#branch_update').css('display','none');
		});
		
		$(document).on('click','.branch_delete',function(){
			var x = confirm('Are you sure!');
			if(x){
				var b_id = $(this).data('branch_id');
				var that = this;
				$.ajax({
					type : 'POST',
					url : baseUrl + 'branch/Ajax/branch_delete',
					dataType : 'json',
					data : {
						'b_id' : b_id
					},
					success : function (response){
						if(response.status == 200){
							$(that).closest('tr').hide('slow');
						}
					}
				});
			}
		});
		
	</script>