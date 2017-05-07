<?php
//require_once("./baglan.php");

function getRouteInfo($route_ID){
	include("./baglan.php");
	$sth = $conn->prepare("SELECT id, origin_point,destination_point,remain_travel_time
		FROM routes WHERE id='$route_ID'
		ORDER BY id DESC
		LIMIT 10" );
	$sth->execute();
	$routes = $sth->fetchAll(PDO::FETCH_ASSOC);
	echo $routes['origin_point'];
	return $routes;
} 

function getShipImage($ship_ID){
	$ShipImage="img/boat-";
	$ShipImage=$ShipImage.$ship_ID;
	$ShipImage=$ShipImage.".jpg";
	return $ShipImage;
} 

function getRouteImage($route_ID){
	$RouteImage="destination-";
	$RouteImage=$RouteImage.$route_ID;
	return $RouteImage;
} 





?>