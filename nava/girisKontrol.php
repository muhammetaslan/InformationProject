<?php
	
	include('baglan.php');

	session_start();
	$email=$_POST["email"];
	$sifre=$_POST["password_user"];
	$sth = $conn->prepare("SELECT  isim,soyisim,email,sifre,kullanici_tipi,userID FROM 
		(SELECT isim,soyisim,email,sifre,kullanici_tipi,userID FROM kullanici
		UNION
		SELECT isim,soyisim,email,sifre,kullanici_tipi,userID FROM kurumsal_uye) AS Users where Users.email='$email' && Users.sifre='$sifre'" );

	$sth->execute();
	$count = $sth->rowCount();
 // sql sorgusu sağlanırsa sessionların atanacağı kısım

	if($count>0){
			
			foreach($sth->fetchAll() as $row){
				
				$_SESSION["kullanici_tipi"]=$row['kullanici_tipi'];
				$_SESSION["isim"]=$row['isim'];
				$_SESSION["soyisim"]=$row['soyisim'];
				$_SESSION["oturum"]=true;
				$_SESSION["mail"]=$email;
				$_SESSION["sifre"]=$sifre;
				$_SESSION["userID"] = $row['userID'];
				
				if($_SESSION["kullanici_tipi"]==1){
					$ath = $conn->prepare("SELECT  sirket_ismi,adres,telNo FROM kurumsal_uye" );
					$ath->execute();
					foreach($ath->fetchAll() as $row){
					$_SESSION["sirket"]=$row['sirket_ismi'];
					$_SESSION["adres"]=$row['adres'];
					$_SESSION["telNo"]=$row['telNo'];
					
					}

				}
				

					}
					
					
			
			echo('<html><head><link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,300,700&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">
				    <link href="assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
				    <link href="assets/libraries/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css">
				    <link href="assets/libraries/chartist/chartist.min.css" rel="stylesheet" type="text/css">
				    <link href="assets/css/leaflet.css" rel="stylesheet" type="text/css">
				    <link href="assets/css/leaflet.markercluster.css" rel="stylesheet" type="text/css">
				    <link href="assets/css/leaflet.markercluster.default.css" rel="stylesheet" type="text/css">    
				    <link href="assets/css/villareal-turquoise.css" rel="stylesheet" type="text/css" id="css-primary">
					<link rel="shortcut icon" type="image/x-icon" href="assets/favicon.png"></head><body> 	
			 	<div class="alert alert-success" role="alert">
				<strong>Tebrikler</strong> Başarıyla giriş yaptınız.
				</div></body>
						</html>');
			 	
			
			header( "refresh:2;url=index.php" );
		}
		
		
		
		
			
	else{
		echo "<script type='text/javascript'>alert('Kullanıcı adı yada şifre yanlış');</script>";
		include('giris.php');

	}		
	
	






?>