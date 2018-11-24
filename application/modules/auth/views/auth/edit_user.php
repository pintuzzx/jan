<div class="container-fluid">
		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url();?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Edit Employee</li>
        </ol>
<div class="col-sm">
<h3>Edit Employee</h3>
<hr>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(uri_string());?>

      <div class="form-group">
            <label class="col control-label"> <?php echo lang('edit_user_fname_label');?> </label>
            <div class="col-sm-6">
                  <?php echo form_input($first_name);?>
            </div>
      </div>
      <div class="form-group">
            <label class="col control-label"><?php echo lang('edit_user_lname_label');?></label>
            <div class="col-sm-6">
                  <?php echo form_input($last_name);?>
            </div>
      </div>

      <div class="form-group">
            <label class="col control-label"><?php echo lang('edit_user_company_label');?> </label>
            <div class="col-sm-6">
            <?php echo form_input($company);?>
            </div>
      </div>

      <div class="form-group">
            <label class="col control-label"><?php echo lang('edit_user_phone_label');?> </label>
            <div class="col-sm-6">
            <?php echo form_input($phone);?>
            </div>
      </div>

      <div class="form-group">
            <label class="col control-label"><?php echo lang('edit_user_password_label');?> </label>
            <div class="col-sm-6">
            <?php echo form_input($password);?>
            </div>
      </div>

      <div class="form-group">
            <label class="col control-label"><?php echo lang('edit_user_password_confirm_label');?></label>
            <div class="col-sm-6">
            <?php echo form_input($password_confirm);?>
            </div>
      </div>

      <?php if ($this->ion_auth->is_admin()): ?>

          <h3><?php echo lang('edit_user_groups_heading');?></h3>
          <?php foreach ($groups as $group):?>
              <label class="checkbox">
              <?php
                  $gID=$group['id'];
                  $checked = null;
                  $item = null;
                  foreach($currentGroups as $grp) {
                      if ($gID == $grp->id) {
                          $checked= ' checked="checked"';
                      break;
                      }
                  }
              ?>
              <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
              <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
              </label>
          <?php endforeach?>

      <?php endif ?>

      <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>

      <div class="form-group">
            <?php echo form_submit('submit', lang('edit_user_submit_btn'),'class="btn btn-success"');?>
      </div>

<?php echo form_close();?>
      </div>
</div>