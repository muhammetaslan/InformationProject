<!DOCTYPE html>
<?php
include("baglan.php");
require_once("LogicLayer/shipFnc.php");
if(isset($_POST["ship_name"])){
$Ship_Name=$_POST["ship_name"];
$sth = $conn->prepare("SELECT id, capacity, route_ID, name
      FROM ships WHERE name='$Ship_Name'
      ORDER BY id DESC
      LIMIT 10" );
$sth->execute();
$gemiler = $sth->fetchAll(PDO::FETCH_ASSOC);
}
elseif (isset($_POST["estimate_shipName"])) {
   $Ship_Name=$_POST["estimate_shipName"];
   $sth = $conn->prepare("SELECT id, capacity, route_ID, name
      FROM ships WHERE name='$Ship_Name'
      ORDER BY id DESC
      LIMIT 10" );
$sth->execute();
$shipRoute = $sth->fetchAll(PDO::FETCH_ASSOC);
}


?>

<html>
   <head>
      <title>MAAC LOGISTIC</title>
      <meta charset="utf-8">
      <meta name="description" content="Traveling HTML5 Template" />
      <meta name="author" content="Design Hooks" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Raleway:400,700" rel="stylesheet" />
      <link href="img/favicon.png" type="image/x-icon" rel="shortcut icon" />
      <link href="css/screen.css" rel="stylesheet" />
   </head>
   <body class="home" id="page">
      <!-- Header -->
      <header class="main-header">
         <div class="container">
            <div class="header-content">
               <a href="index.html">
                  <img src="img/site-identity.png" alt="site identity" />
               </a>

               <nav class="site-nav">
                  <ul class="clean-list site-links">
                     <li>
                        <a href="#">Search Ship&Route Information</a>
                     </li>
                     <li>
                        <a href="#estimate_arrival_time">Estimate time of arrival</a>
                     </li>
                  </ul>

                  <a href="#" class="btn btn-outlined">Sign up</a>
               </nav>
            </div>
         </div>
      </header>

      <!-- Main Content -->
      <div class="content-box">
         <!-- Hero Section -->
         <section class="section section-hero">
            <div class="hero-box">
               <div class="container">
                  <div class="hero-text align-center">
                     <h1>Search a ship now!</h1>
                     <p>and find route!</p>
                  </div>

                  <form class="destinations-form" method="post" action="#">
                     <div class="input-line">
                        <input type="text" name="ship_name" value="" class="form-input check-value" placeholder="WHAT IS YOUR DESTINATION, SAILOR?" />
                        <input type="Submit" value="Search" name="destination-submit" class="form-submit btn btn-special">
                     </div>
                  </form>
               </div>
            </div>

            <!-- Statistics Box -->
            <div class="container">
               <div class="statistics-box">
                  <div class="statistics-item">
                     <span class="value">2,300</span>
                     <p class="title">Destinations</p>
                  </div>

                  <div class="statistics-item">
                     <span class="value">957</span>
                     <p class="title">Cities</p>
                  </div>

                  <div class="statistics-item">
                     <span class="value">2,870</span>
                     <p class="title">Ship&Tanker</p>
                  </div>

                  <div class="statistics-item">
                     <span class="value">50,000</span>
                     <p class="title">Sailors</p>
                  </div>
               </div>
            </div>
         </section>

         <!-- Destinations Section -->
         <section class="section section-destination">
            <!-- Title -->
            <div class="section-title">
               <div class="container">
                  <h2 class="title">Explore our fleet !</h2>
                  <p class="sub-title">MAAC logistics ready to transport your cargos ! </p>
               </div>
            </div>

            <!-- Content -->
            <div class="container">
               <div class="row">
                <?php
    if(isset($gemiler)){            
   foreach (@$gemiler as $gemi): ?>
               <?php list($route_id,$route_origin,$route_destination,$route_arrival_time)=getRouteInfo($gemi['id']); ?>
                  <div class="col-sm-12 col-xs-24">
                     <div class="boat-box">
                        <div class="box-cover">
                           <img src=<?php echo getShipImage($gemi['id']);?> alt="destination image" />
                        </div>

                        <span class="boat-price"><?php echo $gemi['name']; ?></span>
                     </div>
                  </div>

                  <div class="col-md-8 col-sm-12 col-xs-24">
                        <ul style="list-style-type:none">
                        <h3><li>Ship Name:<?php echo $gemi['name']; ?></li></h3>
                        <h3><li>Ship Nation: Turkish</li></h3>
                        <h3><li>Ship Status: Active</li></h3>
                        <h3><li>Ship Capacity: <?php echo $gemi['capacity']; ?></li></h3>                     
                        <h3><li>Number of Personal: <?php echo $gemi['capacity']; ?></li></h3>                       
                      </ul>
                        
                     </div>

                  <div class="col-md-20 col-xs-24">
                     <div class="destination-box">
                        <div class="box-cover">
                           <a href="#">
                              <img src=<?php echo getRouteImage($route_id);?> width="500" height="200" alt="destination image"/>
                           </a>
                        </div>

                        <span class="boats-qty">Route Information</span>

                        <div class="box-details">
                           <div class="box-meta">
                              <h4 class="city">Istanbul-Hamburg</h4>
                              <p class="country"><?php echo $route_destination; ?></p>
                           </div>
                        </div>
                     </div>
                  </div>

 <?php endForeach; }?>

                  </div>               
               </div>
            </div>
         </section>

         <!-- Parallax Box -->
         <div id="estimate_arrival_time" class="parallax-box">
            <div class="container">
               <div class="text align-center">
                  <h1>Estimate arrival time?</h1>
                  <p>navigare necesse est, vivere non est necesse</p>

                  <form class="destinations-form" method="POST" action="">
                     <div class="input-line">
                        <input type="text" name="estimate_shipName" value="" class="form-input check-value" placeholder="WHAT IS YOUR DESTINATION, SAILOR?" />
                        <input type="Submit" name="estimate_arrival_time-submit" value="Estimate" class="form-submit btn btn-special">
                     </div>
                  </form>
               </div>
            </div>
         </div>

         <!-- Boats Section -->
         <section class="section section-boats">
            <!-- Title -->
            <div class="section-title">
               <div class="container">
                  <h2 class="title">Featured boats</h2>
                  <p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
               </div>
            </div>
            <!-- Content -->
            <div class="container">
               <div class="row">

  
  <?php if(isset($shipRoute)){ foreach ($shipRoute as $gemi): ?>
               <?php list($route_id,$route_origin,$route_destination,$route_arrival_time)=getRouteInfo($gemi['id']); ?>
                  <div class="col-sm-12 col-xs-24">
                     <div class="boat-box">
                        <div class="box-cover">
                           <img src=<?php echo getRouteImage($route_id);?> alt="destination image" />
                        </div>
                        <span class="boat-price"><?php echo $route_origin."-".$route_destination ?></span>
                        <div class="box-details">
                           <div class="box-meta">
                              <h4 class="boat-name">Delphia 47</h4>
                              <ul class="clean-list boat-meta">
                                 <li class="location">Gdansk, Poland</li>
                                 <li class="berths">8 Berths</li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="col-md-8 col-sm-12 col-xs-24">
                        <ul style="list-style-type:none">
                        <h3><li>Origin point:<?php echo $route_origin; ?></li></h3>
                        <h3><li>Destination Point:<?php echo $route_destination; ?></li></h3>
                        <h3><li>Current Ship situtions: Loading</li></h3>                     
                        <h3><li>Approximate arrival time: <?php echo $route_arrival_time; ?> hours</li></h3>                       
                      </ul>
                        
                     </div>

<?php endForeach;} ?>
                                   
                  </div>
               </div>

               <div class="align-center">
                  <a href="#" class="btn btn-default btn-load-boats"><span class="text">Load more boats</span><i class="icon-spinner6"></i></a>
               </div>
            </div>
         </section>
      </div>

      <!-- Footer -->
      <footer class="main-footer">
         <div class="container">
            <div class="row">
               <div class="col-md-5">
                  <div class="widget widget_links">
                     <h5 class="widget-title">Top Locations</h5>
                     <ul>
                        <li><a href="#">Lorem impsum dolor</a></li>
                        <li><a href="#">Sit amet consectetur</a></li>
                        <li><a href="#">Adipisicing elit</a></li>
                        <li><a href="#">Eiusmod tempor</a></li>
                        <li><a href="#">incididunt ut labore</a></li>
                     </ul>
                  </div>
               </div>

               <div class="col-md-5">
                  <div class="widget widget_links">
                     <h5 class="widget-title">Featured Boats</h5>
                     <ul>
                        <li><a href="#">Lorem impsum dolor</a></li>
                        <li><a href="#">Sit amet consectetur</a></li>
                        <li><a href="#">Adipisicing elit</a></li>
                        <li><a href="#">Eiusmod tempor</a></li>
                     </ul>
                  </div>
               </div>

               <div class="col-md-9">
                  <div class="widget widget_social">
                     <h5 class="widget-title">Subscribe to our newsletter</h5>
                     <form class="subscribe-form">
                        <div class="input-line">
                           <input type="text" name="subscribe-email" value="" placeholder="Your email address" />
                        </div>
                        <button type="button" name="subscribe-submit" class="btn btn-special no-icon">Subscribe</button>
                     </form>

                     <ul class="clean-list social-block">
                        <li>
                           <a href="#"><i class="icon-facebook"></i></a>
                        </li>
                        <li>
                           <a href="#"><i class="icon-twitter"></i></a>
                        </li>
                        <li>
                           <a href="#"><i class="icon-google-plus"></i></a>
                        </li>
                     </ul>
                  </div>
               </div>

               <div class="col-md-5">
                  <div class="widget widget_links">
                     <h5 class="widget-title">Contact us</h5>
                     <ul>
                        <li><a href="#">Lorem impsum dolor</a></li>
                        <li><a href="#">Sit amet consectetur</a></li>
                        <li><a href="#">Adipisicing elit</a></li>
                        <li><a href="#">Eiusmod tempor</a></li>
                        <li><a href="#">incididunt ut labore</a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </footer>

      <!-- Scripts -->
      <script src="js/jquery.js"></script>
      <script src="js/functions.js"></script>
   </body>
</html>
