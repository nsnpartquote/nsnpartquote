<!DOCTYPE html>
<html lang="en" ng-app="myApp">
  <head >
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Bootstrap, a sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development.">
	<meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, bootstrap, front-end, frontend, web development">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">

<title>
  
    Components &middot; Bootstrap
  
</title>

<!-- Bootstrap core CSS -->
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

<!-- Documentation extras -->
<link href="<?php echo base_url(); ?>assets/css/docs.min.css" rel="stylesheet">
<!--[if lt IE 9]><script src="../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Favicons -->
	<script src="<?php echo base_url(); ?>assets/ang/angular.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery-1.7.1.js"></script>
	
  </head>
  <body ng-controller="customersCrtl">
    <a class="sr-only" href="#content">Skip to main content</a>

    <!-- Docs master nav -->
<header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="#" class="navbar-brand">Home</a>
    </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
      <ul class="nav navbar-nav">
        <li>
          <a href="#">About Us</a>
        </li>
        <li >
          <a href="#">Services</a>
        </li>
        <li>
          <a href="#">Products</a>
        </li>
        <li>
          <a href="#">Contuct Us</a>
        </li>
      </ul>
	  
	  
	<form class="navbar-form navbar-right" role="search" ng-submit="submitForm()">
		<div class="form-group">
			<input type="text" class="form-control" id="part_no" ng-model="formData.part_search" name="part_search" placeholder="Search">
		</div>
		<button type="submit" class="btn btn-default">Part Search</button>
	</form>

    </nav>
  </div>
</header>
