<!DOCTYPE HTML> 
<html>
	<head>
		<title><?php echo $title;?></title>
		
		
		<link href="/assets/css/bootstrap.css" media="all" rel="Stylesheet" type="text/css" /> 
		<link href="/assets/css/bootstrap-responsive.css" rel="stylesheet">	
		<script type="text/javascript" src="/assets/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
		
		
		<style type="text/css">
		
		
		#wrapper {
			min-height: 100%;
			position: relative;
		}
		
		#main-content {
			margin-top: 50px;
			padding-bottom: 20px;
			font-size: 12px;
		}
		
		html,body {
			height: 100%;
		}
		
		footer {
			width:100%; 
			height:20px;
			position:absolute;
			bottom:0;
			left:0;
			font-size:12px;
			background-color:#F1F1F1;
		}
		
		.center {
			text-align: center;
		}
		
		.right {
			text-align: right;
		}
		.item-quantity {
			text-align: right;
			width:40px;
			text-align:right;
		}
		
		#customer-info-form input[type="text"], .form-signin input[type="password"] {
			font-size: 16px;
			height: auto;
			margin-bottom: 15px;
			padding: 7px 9px;
		}
		
		</style>
</head>
	<body>
		<div id="wrapper">
			<div class="navbar navbar-inverse navbar-fixed-top">
				<div class="navbar-inner">
					<div class="container-fluid">
						<button type="button" class="btn btn-navbar" data-toggle="collapse"
							data-target=".nav-collapse">
							<span class="icon-bar"></span> <span class="icon-bar"></span> <span
								class="icon-bar"></span>
						</button>
						<a class="brand" href="/">Online Ordering</a>
						<div class="nav-collapse collapse">
							<p class="navbar-text pull-right">
								<a href="/cart/" class="navbar-link">View Cart</a>
							</p>
							<ul class="nav">
								<li <?php if($_SERVER['PHP_SELF']=='/index.php/parts' || $_SERVER['PHP_SELF']=='/index.php/') { echo 'class="active"';}?>><a href="/parts">Parts</a></li>
								<li <?php if($_SERVER['PHP_SELF']=='/index.php/orders') { echo 'class="active"';}?>><a href="/orders">Orders by customer</a></li>
							</ul>
						</div><!--/.nav-collapse -->
					</div><!--/.container-fluid -->
				</div><!--/.navbar-inner -->
			</div><!-- /.navbar navbar-inverse navbar-fixed-top -->
			
			<div class="container" id="main-content">
				<?php if(!empty($alertMessage)) {?>
					<div class="alert alert-error">
					<?php echo $alertMessage?>
					</div>
				<?php }?>				
				
				<?php if(!empty($infoMessage)) {?>
					<div class="alert alert-info">
					<?php echo $infoMessage?>
					</div>
				<?php }?>				
				
				<?php if(!empty($successMessage)) {?>
					<div class="alert alert-success">
					<?php echo $successMessage?>
					</div>
				<?php }?>