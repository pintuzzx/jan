	<div class="container-fluid">
	  <!-- Breadcrumbs-->
	  <ol class="breadcrumb">
		<li class="breadcrumb-item">
		  <a href="index.html">Dashboard</a>
		</li>
		<li class="breadcrumb-item active">Accounts List</li>
	  </ol>
	  
	  <!-- Page Content -->
	  <span style="font-size:40px;">Accounts List</span>
	  <span class="float-right"><a href="<?php echo base_url();?>account/new_account">open New Account</a></span>
		
		<div class="row">
			<select id="member_brach" class="col-2" name="member_brach">
				<option value="0">Select Branch</option>
					<?php if(isset($branches)){
						if(count($branches)>0){
							foreach($branches as $branch){ ?>
								<option value="<?php echo $branch['b_id']; ?>"><?php echo $branch['name']; ?></option>
					  <?php }
						}
					}?>
			</select>
			&nbsp; <input type="text" name="" class="col-3" value="" id="account_number" placeholder="Enter Account Number">
		</div>
		
		<div class="row">
			<div class="col-sm">
				<div class="table-responsive">
					<table class="table">
						<thead>	
							<tr>
								<th>S.No.</th>
								<th>Branch Name</th>
								<th>Name</th>
								<th>Gender</th>
								<th>Contact No.</th>
								<th>Acc. type</th>
								<th>Acc. no.</th>
								<th>Action</th>
							</tr>
						<thead>
						<tbody id="account_list">
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	
	<script>
	var baseUrl = $('#base_url').val();
	account_list(0);
	
	function account_list(list){
		var b_id = $('#member_brach').val();
		$.ajax({
			type : 'POST',
			url : baseUrl + 'Account/ajax/account_list/' + list,
			dataType : 'json',
			data : {
				'b_id' : b_id
			},
			success : function (response){
				console.log(response);
				if(response.status == 200){
					var x = '';
					$.each(response.data,function(key,value){
						x = x + '<tr>'+
									'<td>'+ parseInt(key + 1) +'</td>'+
									'<td>'+ value.bname +'</td>'+
									'<td>'+ value.username +'</td>';
									if(value.gender == 'm'){
										x = x + '<td>Male</td>';
									}
									else{
										x = x + '<td>Fe-Male</td>';
									}
									x = x + '<td>'+ value.phone +'</td>'+
									'<td>'+ value.ac_type +'</td>'+
									'<td>'+ value.u_account_no +'</td>'+
									'<td><a href="javascript:void(0);"><i class="fas fa-pencil-alt"></i></a> <a href="javascript:void(0);"><i class="fa fa-trash"></i></a></td>'+
							  + '</tr>'; 
						$('#account_list').html(x);
					});
				}
				else{
					$('#account_list').html(response.msg);
				}
			}
		});
	}
	
	$(document).on('change','#member_brach',function(){
		var b_id = $(this).val();
		account_list(0);
	});
	
	$(document).on('keyup','#account_number',function(){
		var accno = $(this).val();
		var b_id = $('#member_brach').val();
		$.ajax({
			type : 'POST',
			url : baseUrl + 'Account/ajax/account_list_accno',
			dataType : 'json',
			data : {
				'accno' : accno,
				'b_id' : b_id
			},
			success : function (response){
				console.log(response);
				if(response.status == 200){
					var x = '';
					$.each(response.data,function(key,value){
						x = x + '<tr>'+
									'<td>'+ parseInt(key + 1) +'</td>'+
									'<td>'+ value.bname +'</td>'+
									'<td>'+ value.username +'</td>';
									if(value.gender == 'm'){
										x = x + '<td>Male</td>';
									}
									else{
										x = x + '<td>Fe-Male</td>';
									}
									x = x + '<td>'+ value.phone +'</td>'+
									'<td>'+ value.ac_type +'</td>'+
									'<td>'+ value.u_account_no +'</td>'+
									'<td><a href="javascript:void(0);"><i class="fas fa-pencil-alt"></i></a> <a href="javascript:void(0);"><i class="fa fa-trash"></i></a></td>'+
							  + '</tr>'; 
						$('#account_list').html(x);
					});
				}
				else{
					$('#account_list').html(response.msg);
				}
			}
		});
	});
	</script>