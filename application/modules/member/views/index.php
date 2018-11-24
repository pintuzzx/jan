	<div class="container-fluid">
	  <!-- Breadcrumbs-->
	  <ol class="breadcrumb">
		<li class="breadcrumb-item">
		  <a href="index.html">Dashboard</a>
		</li>
		<li class="breadcrumb-item active">Member List</li>
	  </ol>
	  
	  <!-- Page Content -->
	  <span style="font-size:40px;">Member List</span>
	  <span class="float-right"><a href="<?php echo base_url();?>Member/add_member">Add Members</a></span>
		
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
			&nbsp; <input type="text" name="" class="col-3" value="" placeholder="Enter member name">
			&nbsp; <input type="button" id="member_filter_submit" value="Search" class="btn btn-default">
		</div>
		
		<div class="row">
			<div class="col-sm">
				<div class="table-responsive">
					<table class="table">
						<thead>	
							<tr>
								<th>S.No.</th>
								<th>Name</th>
								<th>Gender</th>
								<th>Contact No.</th>
								<th>Email Id</th>
								<th>Address</th>
								<th>Action</th>
							</tr>
						<thead>
						<tbody id="members_list">
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	
	<script>
	var baseUrl = $('#base_url').val();
	$.ajax({
		type : 'POST',
		url : baseUrl + 'member/Ajax/member_list',
		dataType : 'json',
		data : {
		},
		success : function (response){
			console.log(response);
			if(response.status == 200){
				var x = '';
				$.each(response.data,function(key,value){
					x = x + '<tr>'+
								'<td>'+ parseInt(key + 1) +'</td>'+
								'<td>'+ value.username +'</td>'+
								'<td>'+ value.gender +'</td>'+
								'<td>'+ value.phone +'</td>'+
								'<td>'+ value.email +'</td>'+
								'<td>'+ value.address +'</td>'+
								'<td>'+
									'<a href="javascript:void(0);"><i class="fas fa-pencil-alt"></i></a>'+
									'<a href="javascript:void(0);"><i class="far fa-trash-alt"></i></a>'+
								'</td>'+
							'</tr>'; 
				});
				$('#members_list').html(x);
			}
			else{
				$('#members_list').html('No. record find.');
			}
		}
	});
	
	$(document).on('change','#member_brach',function(){
		var b_id = $(this).val();
		$.ajax({
			type : 'POST',
			url : baseUrl + 'member/Ajax/member_list_filter',
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
									'<td>'+ value.username +'</td>'+
									'<td>'+ value.gender +'</td>'+
									'<td>'+ value.phone +'</td>'+
									'<td>'+ value.email +'</td>'+
									'<td>'+ value.address +'</td>'+
									'<td>'+
										'<a href="javascript:void(0);"><i class="fas fa-pencil-alt"></i></a>'+
										'<a href="javascript:void(0);"><i class="far fa-trash-alt"></i></a>'+
									'</td>'+
								'</tr>'; 
						$('#members_list').html(x);
					});
				}
				else{
					$('#members_list').html('No. record found.');
				}
			}
		});
	});
	</script>