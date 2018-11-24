<div class="container-fluid">
	  <!-- Breadcrumbs-->
	  <ol class="breadcrumb">
		<li class="breadcrumb-item">
		  <a href="<?php echo base_url();?>">Dashboard</a>
		</li>
    <li class="breadcrumb-item">
		  <a href="<?php echo base_url();?>transaction">Transaction Master</a>
		</li>
		<li class="breadcrumb-item active">Debit/Credit</li>
	  </ol>
	  <!-- Page Content -->
      <h4>Debit/Credit</h4>
	  <hr>
	  
      <div class="row">
      <div class="col-md-6 float-left">
      <p id="infoMessage"><?php echo $message; ?></p>
      <input type="hidden" name="baseUrl" id="baseUrl" value="<?php echo base_url();?>"/>
      <form class="" method="post" action="<?php echo base_url();?>transaction/trans_money">
      <!-- <div class="form-group">
        <label>Account Holder Name</label>
        <input class="form-control" type="text" id="ac_holder_name" name="ac_holder_name" />
      </div> -->
      <div class="form-group">
        <label>Type Account No</label>
        <input class="form-control" type="text" id="ac_no" name="ac_no" />
      </div>
      <div class="form-group">
        <label>Branch Name</label>
        <!-- <input class="form-control" type="text" id="branch_name" name="branch_name" /> -->
        <select class="form-control" type="text" id="branch_name" name="branch_name" readonly="readonly">

        </select>
      </div> 
      <div class="form-group">
        <label>Account Type</label>
        <!-- <input class="form-control" type="text" id="ac_type" name="ac_type" /> -->
        <select class="form-control" type="text" id="ac_type" name="ac_type">
        </select>
      </div>
      <div class="form-group">
        <label>Amount</label>
        <input class="form-control" type="text" id="amount" name="amount" />
      </div>
      <div class="form-group">
        <label>Credit/Debit</label>
        <select class="form-control" type="text" id="crdr_mode" name="crdr_mode">
            <option value="">Choose Credit/Debit </option>
            <option value="cr">Credit</option>
            <option value="dr">Debit</option>
        </select>
        <!-- <input class="form-control" type="text" id="crdr_mode" name="crdr_mode" /> -->
      </div>
      <div class="form-group">
        <label>Transaction Mode</label>
        <select class="form-control" type="text" id="trans_mode" name="trans_mode">
            <option value="">Choose Transaction Mode</option>
            <option value="cheque">Cheque</option>
            <option value="cash">Cash</option>
        </select>
        <!-- <input class="form-control" type="text" id="trans_mode" name="trans_mode" /> -->
      </div>
      <div class="form-group">
        <label>Transaction Detail</label>
        <textarea class="form-control" type="text" id="trans_detail" name="trans_detail"></textarea>
      </div>
      <div class="form-group">
        <input class="btn btn-info" type="submit" name="Submit" value="Submit"/>
        <input class="btn btn-default" type="reset" name="Cancel" value="Cancel"/>
      <div>
      </form>

      </div>
      </div>
</div>
<div class="col-md-6 float-right">
          <div class="form_group">
          <label>Member Name</label>
          <input class="form-control" type="text" id="mem_name" name="mem_name" readonly="readonly" />
          </div>
          <div class="form_group">
          <label>Member pic</label>
          <img src="" id="mem_pic" name="mem_pic" height="400" widht="200" alt="No Record" >
          </div>
          <div class="form_group">
          <label>Member sign</label>
          <img src="" id="mem_sign" name="mem_sign" height="400" widht="200" alt="No Record" >
          </div>
      </div>
<script>
var baseUrl = $('#baseUrl').val();
$(document).ready(function(){
$(document).on('keyup blur','#ac_no',function(e){
    clearTimeout($.data(this,'timer'));
    if(e.keyCode == 13)
        search(true);
    else
        $(this).data('timer',setTimeout(search,1000));
});
function search(force){
    let myKey = $('#ac_no').val();
    if(!force && myKey.length < 3) return ; //wasn`t enter
    $.ajax({
				type : 'POST',
				url : baseUrl +'transaction/Ajax/get_member_info/'+myKey,
				dataType : 'json',
				data : {
                  // 'myKey':myKey
				},
				success : function (response){
                   // console.log(response.data[0]['name']);
					if(response.status == 200){
                        $('select[name="branch_name"]').append('<option value="'+response.data[0]["b_id"]+'">'+response.data[0]["name"]+'</option>');
                        $('select[name="ac_type"]').append('<option value="'+response.data[0]["a_id"]+'">'+response.data[0]["ac_type"]+'</option>');
                    }
                    else{
                        alert(response.msg);
                    }
                }
        });
}

});
</script>