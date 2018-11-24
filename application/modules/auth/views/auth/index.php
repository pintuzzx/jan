<div class="container-fluid">
<!-- Breadcrumbs-->
	<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Employee List</li>
    </ol>
<div class="row">
      <div class="col-lg-12 col-sm-6 mb-3">
	  <h5 class="d-flex justify-content-start">List of Employee</h5>
      <h5 class="d-flex justify-content-end"><a href="<?php echo base_url(); ?>auth/create_user">Add Employee</a></h5>
	  <hr>

<div id="infoMessage"><?php echo $message;?></div>

 <!-- DataTables Example -->
 <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              All Employees </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr> 
						<th><?php echo lang('index_fname_th');?></th>
						<th><?php echo lang('index_lname_th');?></th>
						<th><?php echo lang('index_email_th');?></th>
						<th><?php echo lang('index_groups_th');?></th>
						<th><?php echo lang('index_status_th');?></th>
						<th><?php echo lang('index_action_th');?></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($users as $user):?>
		<tr>
            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
			<td>
				<?php foreach ($user->groups as $group):?>
					<?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
                <?php endforeach?>
			</td>
			<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
			<td><?php echo anchor("auth/edit_user/".$user->id, 'Edit') ;?></td>
		</tr>
	<?php endforeach;?>
    </tbody>
	</table>
		</div>
	</div>
	</div>

<!-- <p><a href="<?php //echo base_url();?>auth/create_user">Add Employee</a><?php //echo anchor('auth/create_user', lang('index_create_user_link'))?>  <?php //echo anchor('auth/create_group', lang('index_create_group_link'))?></p> -->
	</div>
</div>
</div>