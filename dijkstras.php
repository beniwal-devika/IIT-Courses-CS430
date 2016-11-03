<?php 


include "dijkstrasAlgorithm.php";
$object = new dijkstrasAlgorithm();

$vertex = 9;
$graph = array(array(0,4,0,0,0,0,0,8,0),
               array(4,0,8,0,0,0,0,11,0),
               array(0,8,0,7,0,4,0,0,0),
               array(0,0,7,0,9,14,0,0,0),
               array(0,0,0,9,0,10,0,0,0),
               array(0,0,4,14,10,0,2,0,0),
               array(0,0,0,0,0,2,0,1,6),
               array(8,11,0,0,0,0,1,0,7),
               array(0,0,2,0,0,0,6,7,0));
               
	
for($i = 0 ;$i < $vertex  ;$i++){
	$key[$i] = INF;
	$mset[$i] = 'false';
}
$key[0] = 0;
$source = 0;
$object->dijkstras($graph, $vertex, $mset, $key, $source);


?>

