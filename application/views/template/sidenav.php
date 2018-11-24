<div id="wrapper">
      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
<?php  if(in_array('admin',$this->session->userdata('groups')) || in_array('employee',$this->session->userdata('groups'))){ ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url();?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
<?php } ?>
<?php  if(in_array('admin',$this->session->userdata('groups'))){ ?>
	<li class="nav-item">
          <a class="nav-link" href="<?php echo base_url();?>branch">
            <i class="fas fa-fw fa-bezier-curve"></i>
            <span>Branches</span>
          </a>
        </li>
<?php } ?>
<?php  if(in_array('admin',$this->session->userdata('groups'))){ ?>
		<li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>member">
            <i class="fas fa-fw fa-users"></i>
            <span>Members</span>
          </a>
        </li>
<?php } ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url();?>account">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Accounts</span>
          </a>
        </li>
<?php  if(in_array('admin',$this->session->userdata('groups'))){ ?>
	<li class="nav-item">
          <a class="nav-link" href="<?php echo base_url();?>auth/users_list">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Employee</span>
          </a>
        </li>
<?php  } ?>
<?php  if(in_array('admin',$this->session->userdata('groups')) || in_array('employee',$this->session->userdata('groups'))){ ?>
	<li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fas fa-fw fa-handshake"></i>
            <span>Transactions</span>
          </a>
        </li>
<?php } ?>
	<li class="nav-item">
          <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-user-circle"></i>
            <span>Logout</span>
          </a>
        </li>
      </ul>