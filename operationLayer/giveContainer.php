<!DOCTYPE html>
<?php
session_start();
include("../dbLayer/baglan.php");
require_once("../LogicLayer/shipFnc.php");

if(@isset($_GET['id'])){
$ship_ID=$_GET['id'];
list($id,$capacity,$routeId,$name)=getShipInfo($ship_ID);

}

if(@isset($_POST['companyName'])){

      // simdilik default oarak 000001 atıyoz
      $companyName = $_POST['companyName'];
      $orderCapacity = $_POST['orderCapacity'];
      // web service control 

      try{ 
      // insert new users information into database users table
      $sql = "INSERT INTO addorder (companyName,orderCapacity)
                     VALUES ('$companyName','$orderCapacity')";
      // use exec() because no results are returned
      $conn->exec($sql);
      
      }
      catch(PDOException $e)
      {
      echo $sql . "<br>" . $e->getMessage();
      }
   header( "refresh:1   ;url=../index.php" );   
}

?>

<html>
   <head>
      <title>MAAC LOGISTIC</title>
      <meta charset="utf-8">
      <meta name="description" content="Traveling HTML5 Template" />
      <meta name="author" content="Destinationsgn Hooks" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Raleway:400,700" rel="stylesheet" />
      <link href="../img/favicon.png" type="image/x-icon" rel="shortcut icon" />
      <link href="../css/screen.css" rel="stylesheet" />
   </head>
   <body class="home" id="page">
      <!-- Header -->
      <header class="main-header">
         <div class="container">
            <div class="header-content">
               <a href="../index.php">
                  <img src="../img/site-identity.png" alt="site identity" />
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
                        <h1>Update Ship Info</h1>
                        <p></p>
                     </div>

                     
                  <form class="destinations-form" method="POST" action="#">
                        <div class="input-line">
                           <input type="text" name="companyName" value="" class="form-input check-value" placeholder="PLEASE ENTER A COMPANY NAME" />

                        </div>

                           <p></p>

                        <div class="input-line">
                           <input type="text" name="orderCapacity" value="" class="form-input check-value" placeholder="PLEASE ENTER YOUR CAPACITY" />
                           
                        </div>

                         <p></p>


                        <div class="input-line">
                        <p></p>
                        <input type="submit" class="btn btn-special" name="Add_Container" value="Give Container" />
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
            
      </div>

      <!-- Scripts -->
      <script src="../js/jquery.js"></script>
      <script src="../js/functions.js"></script>

   </body>
</html>
