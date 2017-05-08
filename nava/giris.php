<!DOCTYPE html>
<html lang="tr">



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,300,700&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">
    <link href="assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/libraries/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css">
    <link href="assets/libraries/chartist/chartist.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/leaflet.css" rel="stylesheet" type="text/css">
    <link href="assets/css/leaflet.markercluster.css" rel="stylesheet" type="text/css">
    <link href="assets/css/leaflet.markercluster.default.css" rel="stylesheet" type="text/css">    
    <link href="assets/css/villareal-turquoise.css" rel="stylesheet" type="text/css" id="css-primary">
	<link rel="shortcut icon" type="image/x-icon" href="assets/favicon.png">
	
    <title>QR-Estate Giriş Ekranı</title>
</head>

<body class="content-title-center">
<div class="page-wrapper">
				
    	<div class="page-wrapper">
	
		<div class="header-wrapper">
	<div class="header">
		<div class="header-inner">
			<div class="container">
				

				<div class="header-top">
					<div class="header-top-inner">
						<a class="header-logo" href="index.php">
							<span class="header-logo-shape"></span> 
							<span class="header-logo-text">QR Estate</span>
						</a><!-- /.header-logo -->

						<div class="header-separator">
						</div><!-- /.header-separator -->
                       
						<div class="header-search">
							<form method="get" action="http://villareal-html.wearecodevision.com/properties.html">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-search"></i></span>
									<input type="text" placeholder="Sitede Ara" class="form-control">
								</div><!-- /.form-group -->
							</form>
						</div> 

						

						<div class="header-information">
							<i class="fa fa-plus"></i>

							<div class="header-information-block">
								<strong>Ücretsiz ilan ver</strong>
								<span>Ki herkes görsün</span>
							</div><!-- /.header-information-block -->
						</div><!-- /.header-information -->

						<button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target=".nav-primary-wrapper">
	                        <span></span>
	                        <span></span>
	                        <span></span>
	                    </button>							
					</div><!-- /.header-top-inner -->
				</div><!-- /.header-top -->

				<div class="header-bottom">
					<div class="header-bottom-inner">
						
<div class="nav-primary-wrapper collapse navbar-toggleable-sm">
	
</div><!-- /.nav-primary -->

					</div><!-- /.header-bottom-inner -->
				</div><!-- /.header-bottom -->
			</div><!-- /.container -->
		</div><!-- /.header-inner -->
	</div><!-- /.header -->
</div><!-- /.header-wrapper-->
	    
    <div class="main-wrapper">
	    <div class="main">
	        <div class="main-inner">
	        		        
					<div class="content-title">
	<div class="content-title-inner">
		<div class="container">		
			<h1>Giriş Yap</h1>		

			<ol class="breadcrumb">
				<li><a href="index.php">AnaSayfa</a></li>
				<li><a href="properties.php">Özellikler</a></li>
			</ol>			
		</div><!-- /.container -->
	</div><!-- /.content-title-inner -->
</div><!-- /.content-title -->
				

	            <div class="content">
	                <div class="container">
	<div class="row">
		<div class="col-lg-4 col-lg-offset-4">
			<form action="girisKontrol.php" method="post">
				<div class="form-group">
					<label for="email">E-mail</label>
					<input type="text" name="email" class="form-control">
				</div><!-- /.form-group -->

				<div class="form-group">
					<label for="password_user">Şifre</label>
					<input type="password" name="password_user" class="form-control">
				</div><!-- /.form-group -->

				<div class="form-group-btn">
					<input type="submit" class="btn btn-primary pull-right" name="girisYap" value="Giriş Yap" />
					
				</div><!-- /.form-group-btn -->

				<div class="form-group-bottom-link">
				<a href="bireysel-kayit.php">Bireysel Kayıt<i class="fa fa-user"></i></a>
				<a href="kurumsal-kayit.php">Kurumsal Kayıt<i class="fa fa-building-o"></i></a>
				</div><!-- /.form-group-bottom-link -->
			</form>
		</div><!-- /.col-* -->
	</div><!-- /.row -->
</div><!-- /.container -->
	            </div><!-- /.content -->
	        </div><!-- /.main-inner -->
	    </div><!-- /.main -->
    </div><!-- /.main-wrapper -->
<?php include("footer.php");?>

</div><!-- /.page-wrapper -->



<script src="http://maps.googleapis.com/maps/api/js" type="text/javascript"></script>

<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/jquery.ezmark.min.js"></script>
<script type="text/javascript" src="assets/js/tether.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/gmap3.min.js"></script>
<script type="text/javascript" src="assets/js/leaflet.js"></script>
<script type="text/javascript" src="assets/js/leaflet.markercluster.js"></script>
<script type="text/javascript" src="assets/libraries/owl-carousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="assets/libraries/chartist/chartist.min.js"></script>
<script type="text/javascript" src="assets/js/scrollPosStyler.js"></script>
<script type="text/javascript" src="assets/js/villareal.js"></script>

</body>

</html>