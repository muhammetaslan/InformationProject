<!DOCTYPE html>
<?php
session_start();
include("../dbLayer/baglan.php");
require_once("../LogicLayer/shipFnc.php");

if(@isset($_GET['id'])){
$ship_ID=$_GET['id'];
list($id,$capacity,$routeId,$name)=getShipInfo($ship_ID);


   @$ship_name = $_POST['shipName'];
   @$ship_capacity = $_POST['capacity'];
   @$ship_routeId = $_POST['routeId'];

   $sql = "DELETE FROM ships WHERE id='$ship_ID'";

   // use exec() because no results are returned
   $conn->exec($sql);

   header( "refresh:1; url=../admin-panel.php" );
   }
?>