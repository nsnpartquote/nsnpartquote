<!--row starts here-->

<div class="col-md-2 col-sm-3 left-nav">
  <!--left-nav starts-->
  <ul>
    <li class="<?php echo (in_array($this->uri->segment(1), array('', 'dashboard')) ? 'active' : ''); ?>"><a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-th"></span>Dashboard</a></li>
    <div class="sub-menu">
      <li class="parent down"><a href="javascript:void(0);"><span class="glyphicon glyphicon-file"></span>Admin Masters</a></li>
      <!--sub menu-->
      <ol class="child">
        <li><a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-menu-right"></span>Departments</a></li>
      </ol>
    </div>
    <div class="sub-menu">
      <li class="parent down"><a href="javascript:void(0);"><span class="glyphicon glyphicon-file"></span>Project Masters</a></li>
      <!--sub menu-->
      <ol class="child">
        <li class="<?php echo (in_array($this->uri->segment(2), array('site-types')) ? 'active' : ''); ?>">
        	<a href="<?php echo base_url('project-masters/site-types'); ?>"><span class="glyphicon glyphicon-menu-right"></span>Site Types</a>
        </li>
        <li class="<?php echo (in_array($this->uri->segment(2), array('site-yards')) ? 'active' : ''); ?>">
        	<a href="<?php echo base_url('project-masters/site-yards'); ?>"><span class="glyphicon glyphicon-menu-right"></span>Site Yards</a>
        </li>
        <li class="<?php echo (in_array($this->uri->segment(2), array('site-faces')) ? 'active' : ''); ?>">
        	<a href="<?php echo base_url('project-masters/site-faces'); ?>"><span class="glyphicon glyphicon-menu-right"></span>Site Faces</a>
        </li>
        <li class="<?php echo (in_array($this->uri->segment(2), array('plot-sizes')) ? 'active' : ''); ?>">
        	<a href="<?php echo base_url('project-masters/plot-sizes'); ?>"><span class="glyphicon glyphicon-menu-right"></span>Plot Sizes</a>
        </li>
        <li><a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-menu-right"></span>Plants</a></li>
        <li><a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-menu-right"></span>Plant Types</a></li>
        <li><a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-menu-right"></span>Schemes</a></li>
      </ol>
    </div>
    <div class="sub-menu">
      <li class="parent down"><a href="javascript:void(0);"><span class="glyphicon glyphicon-file"></span>CRM Masters</a></li>
      <!--sub menu-->
      <ol class="child">
        <li><a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-menu-right"></span>Customer Types</a></li>
        <li><a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-menu-right"></span>Lead Types</a></li>
        <li class="<?php echo (in_array($this->uri->segment(2), array('campaign-types')) ? 'active' : ''); ?>">
        	<a href="<?php echo base_url('crm-masters/campaign-types'); ?>"><span class="glyphicon glyphicon-menu-right"></span>Campaign Types</a>
        </li>
        <li><a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-menu-right"></span>Lead Sources</a></li>
        <li><a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-menu-right"></span>Sales Heads</a></li>
        <li><a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-menu-right"></span>Contact Subjects</a></li>
        <li><a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-menu-right"></span>Commisions</a></li>
        <li><a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-menu-right"></span>Payment Modes</a></li>
      </ol>
    </div>
    <li class="<?php echo (in_array($this->uri->segment(1), array('projects')) ? 'active' : ''); ?>"><a href="<?php echo base_url('projects/phases'); ?>"><span class="glyphicon glyphicon-file"></span>Projects</a></li>
    <li class="<?php echo (in_array($this->uri->segment(1), array('employees')) ? 'active' : ''); ?>"><a href="<?php echo base_url('employees'); ?>"><span class="glyphicon glyphicon-user"></span>Employees</a></li>
    <li class="<?php echo (in_array($this->uri->segment(1), array('change-password')) ? 'active' : ''); ?>"><a href="<?php echo base_url('change-password'); ?>"><span class="glyphicon glyphicon-pencil"></span>Change Password</a></li>
    <li><a href="<?php echo base_url('dashboard/logout'); ?>"><span class="glyphicon glyphicon-off"></span>Logout</a></li>
  </ul>
</div>
<!--left-nav ends-->
