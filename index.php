<!DOCTYPE html>
<?php
include("baglan.php");
require_once("LogicLayer/shipFnc.php");
if(isset($_POST["ship_name"])){
$Ship_Name=$_POST["ship_name"];
}
$sth = $conn->prepare("SELECT id, capacity, route_ID, name
		FROM ships WHERE name='$Ship_Name'
		ORDER BY id DESC
		LIMIT 10" );
$sth->execute();
$gemiler = $sth->fetchAll(PDO::FETCH_ASSOC);
//$routes=getRouteInfo(1);
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
   foreach ($gemiler as $gemi): ?>
               
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
                              <img src="img/destination-2.jpg"  width="500" height="200" alt="destination image"/>
                           </a>
                        </div>

                        <span class="boats-qty">Route Information</span>

                        <div class="box-details">
                           <div class="box-meta">
                              <h4 class="city">Istanbul-Hamburg</h4>
                              <p class="country"><?php echo $routes; ?></p>
                           </div>
                        </div>
                     </div>
                  </div>

 <?php endForeach; ?>

                  </div>


      

                  
               </div>

               <div class="align-center">
                  <a href="#" class="btn btn-default btn-load-destination"><span class="text">Explore more destinations</span><i class="icon-spinner6"></i></a>
               </div>
            </div>
         </section>

         <!-- Parallax Box -->
         <div id="estimate_arrival_time" class="parallax-box">
            <div class="container">
               <div class="text align-center">
                  <h1>Have your own boat?</h1>
                  <p>navigare necesse est, vivere non est necesse</p>

                  <form class="destinations-form">
                     <div class="input-line">
                        <input type="text" name="destination" value="" class="form-input check-value" placeholder="WHAT IS YOUR DESTINATION, SAILOR?" />
                        <button type="button" name="destination-submit" class="form-submit btn btn-special">Estimate</button>
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
                  <div class="col-sm-12 col-xs-24">
                     <div class="boat-box">
                        <div class="box-cover">
                           <img src="img/boat-1.jpg" alt="destination image" />
                        </div>

                        <span class="boat-price">€580 / day</span>

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

                  <div class="col-sm-12 col-xs-24">
                     <div class="boat-box">
                        <div class="box-cover">
                           <img src="img/boat-2.jpg" alt="destination image" />
                        </div>

                        <span class="boat-price">€950 / day</span>

                        <div class="box-details">
                           <div class="box-meta">
                              <h4 class="boat-name">Sense 55</h4>
                              <ul class="clean-list boat-meta">
                                 <li class="location">Portofino, Itali</li>
                                 <li class="berths">12 Berths</li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="col-sm-12 col-xs-24">
                     <div class="boat-box">
                        <div class="box-cover">
                           <img src="img/boat-3.jpg" alt="destination image" />
                        </div>

                        <span class="boat-price">€820 / day</span>

                        <div class="box-details">
                           <div class="box-meta">
                              <h4 class="boat-name">Cruiser 51</h4>
                              <ul class="clean-list boat-meta">
                                 <li class="location">Palma de Mallorca, Spain</li>
                                 <li class="berths">10 Berths</li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="col-sm-12 col-xs-24">
                     <div class="boat-box">
                        <div class="box-cover">
                           <img src="img/boat-4.jpg" alt="destination image" />
                        </div>

                        <span class="boat-price">€400 / day</span>

                        <div class="box-details">
                           <div class="box-meta">
                              <h4 class="boat-name">Cruiser 41S</h4>
                              <ul class="clean-list boat-meta">
                                 <li class="location">Lisbon, Portugal</li>
                                 <li class="berths">8 Berths</li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="load-boats-box">
                     <div class="col-sm-12 col-xs-24">
                        <div class="boat-box">
                           <div class="box-cover">
                              <img src="img/boat-2.jpg" alt="destination image" />
                           </div>

                           <span class="boat-price">€950 / day</span>

                           <div class="box-details">
                              <div class="box-meta">
                                 <h4 class="boat-name">Sense 55</h4>
                                 <ul class="clean-list boat-meta">
                                    <li class="location">Portofino, Itali</li>
                                    <li class="berths">12 Berths</li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="col-sm-12 col-xs-24">
                        <div class="boat-box">
                           <div class="box-cover">
                              <img src="img/boat-1.jpg" alt="destination image" />
                           </div>

                           <span class="boat-price">€580 / day</span>

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
