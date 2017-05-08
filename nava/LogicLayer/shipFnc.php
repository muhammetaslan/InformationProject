<?php
//require_once("./baglan.php");

function getRouteInfo($route_ID){
	include("./baglan.php");
	$sth = $conn->prepare("SELECT id, origin_point,destination_point,remain_travel_time
		FROM routes WHERE id='$route_ID'
		ORDER BY id DESC
		LIMIT 10" );
	$sth->execute();
	$count = $sth->rowCount();
	if($count>0){
	$arr;
    foreach($sth->fetchAll() as $row){
                $arr = array($row['id'],$row['origin_point'],$row['destination_point'],$row['remain_travel_time']);
            }
        }
	return $arr;
} 

function getShipImage($ship_ID){
	$ShipImage="img/boat-";
	$ShipImage=$ShipImage.$ship_ID;
	$ShipImage=$ShipImage.".jpg";
	return $ShipImage;
} 

function getRouteImage($route_ID){
	$RouteImage="img/destination-";
	$RouteImage=$RouteImage.$route_ID;
	$RouteImage=$RouteImage.".jpg";
	return $RouteImage;
} 





?>