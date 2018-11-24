<div class="container-fluid">
<div class="row flex-container">
<div class="col"></div>
<div class="col">
<h3>Hi Frnd,Please fill the required info</h3>
<span class="hr"></span>
<form class="form" method="post">
<div class="form-group">
<input type="hidden" id="base" name="base" value="<?php echo base_url();?>" />
<label for="name">Name</label>
<input class="form-control" type="text" id="name" name="name" />
</div>
<div class="form-group">
<label  for="class">Class</label>
<input class="form-control" type="text" id="class" name="class" />
</div>
<div class="form-group">
<label for="role">Role</label>
<input class="form-control" type="text" id="role" name="role" />
</div>
<div class="form-group">
<label for="salary">Salary</label>
<input class="form-control" type="text" id="salary" name="salary" />
</div>
<div class="form-group">
<label for="pic">Pic</label>
<input class="form-control" type="text" id="pic" name="pic" />
</div>
<div class="form-group">
<input class="btn btn-info" type="submit" id="clickme" name="clickme" value="clickme"/>
<input class="btn btn-dafault" type="reset" id="Cancel" name="Cancel" value="Cancel"/>
</div>
</form>
</div>
</div>
</div>

<script>
var baseUrl = $('#base').val();
$('document').ready(function(){
	$('#clickme').on('click',function(e){
		//alert(baseUrl);
			e.preventDefault();
		        //alert('hh');
		        	$.ajax({
		            url: baseUrl + 'index.php/signin/ajax',
		            type: 'POST',
		            dataType: 'json',
		            data:{},
		            success :function(response){
			            alert('fdsgfg');
		            }
		        	});
		});
	});
</script>