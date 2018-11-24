<div class="container-fluid">
	  <!-- Breadcrumbs-->
	  <ol class="breadcrumb">
		<li class="breadcrumb-item">
		  <a href="<?php echo base_url();?>">Dashboard</a>
		</li>
		<li class="breadcrumb-item active">Transaction master</li>
	  </ol>
      <!-- Page Content -->
      <div class="row">
      <div class="col-lg-12 col-sm-6 mb-3">
      <!-- <div class=" d-flex justify-content-around"> -->
	  <h5 class="d-flex justify-content-start">Transaction Master</h5>
      <h5 class="d-flex justify-content-end"><a href="<?php echo base_url(); ?>transaction/trans_money">Debit/Credit</a></h5>
      <!-- </div> -->
	  <hr>
	  <!-- <p>This is a great starting point for new custom pages.</p> -->
      <!-- <p id="infoMessage"><?php //echo $message; ?></p> -->
      <!-- DataTables Example -->
      <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              All Transections </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Account No.</th>
                      <th>Detail</th>
                      <th>Mode</th>
                      <th>Credit/Debit</th>
                      <th>Amount</th>
                      <th>DateTime</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      
                      </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
</div>
</div>
</div>
