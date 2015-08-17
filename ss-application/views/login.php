<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo (isset($page_title)) ? $page_title : 'Siri Sampada | Dashboard';  ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--bootstrap css-->
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/css/customs.css" rel="stylesheet" />
<!--bootstrap js-->
<script type="text/javascript"> var base_url = '<?php echo base_url(); ?>'; </script>
<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<body>
<div class="row login">
<div class="head"><span>Sign In!</span> <span class="pull-right"><img src="<?php echo base_url(); ?>assets/images/login-logo.jpg" width="146" height="70" alt="Siri Sampada"></span>
<div class="clearfix"></div>
</div>
<?php echo form_open('', 'class="form_login"'); ?>
<div class="col-sm-12">
	<?php if(isset($error_message)){ ?>
    <div class="alert alert-danger"><?php echo $error_message; ?></div>
    <?php } ?>
</div>
<div class="col-sm-6"><label class="form-label">Username</label><input type="text" name="username" placeholder="Enter Username" /></div>
<div class="col-sm-6"><label class="form-label">Password</label><input type="password" name="password" placeholder="Enter Password" /></div>
<div class="clearfix pad-30"></div>
<div class="col-md-12 text-center"><input type="submit" class="btn btn-default" value="Login as Admin" /> <input type="submit" class="btn btn btn-default" value="Login as Sales Person" /></div>
<br /><br />
<?php echo form_close(); ?>
</div>
</body>
</html>