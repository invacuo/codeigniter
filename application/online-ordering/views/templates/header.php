<!DOCTYPE HTML> 
<html>
	<head>
		<title><?php echo $title;?></title>
		
		
		<link href="/assets/css/bootstrap.css" media="all" rel="Stylesheet" type="text/css" /> 
		<link href="/assets/css/bootstrap-responsive.css" rel="stylesheet">	
		<script type="text/javascript" src="/assets/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
		
		
		<link href="/assets/css/style.css" media="all" rel="Stylesheet" type="text/css" /> 
		<script type="text/javascript" src="/assets/js/jquery.forcenumeric.js"></script>
		<script type="text/javascript" src="/assets/js/validation.js"></script>
</head>
	<body>
		<div id="wrapper">
			<div class="navbar navbar-inverse navbar-static-top">
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
								<li class="dropdown<?php if($_SERVER['PHP_SELF']=='/index.php/parts' || $_SERVER['PHP_SELF']=='/index.php/') { echo ' active';}?>">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										Categories
										<b class="caret"></b>
									</a>
									<ul class="dropdown-menu">
										<?php //TODO: only show top 5 categories so that we do not go beyond user's screen height?>										
										<?php foreach($categories as $category) {?>
											<li><a href="/parts/category/<?php echo $category['id'];?>"><?php echo $category['name'];?></a></li>
										<?php }?>										
										<li><a href="/parts/">Browse All Parts</a></li>
									</ul>
								</li>
								<li <?php if($_SERVER['PHP_SELF']=='/index.php/orders/lookup') { echo 'class="active"';}?>><a href="/orders/lookup">Lookup Order by Id</a></li>
							</ul>
						</div><!--/.nav-collapse -->
					</div><!--/.container-fluid -->
				</div><!--/.navbar-inner -->
			</div><!-- /.navbar navbar-inverse navbar-fixed-top -->
			
			<?php //div below is closed in the footer.php file?>
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