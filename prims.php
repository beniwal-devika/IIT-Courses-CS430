<?php 


include "primsAlgorithm.php";
$a = new primsAlgorithm();

$vertex = 5;
$graph = array(array(0,6,0,2,0),array(6,0,3,8,7),array(0,3,0,0,6),array(2,8,0,0,9),array(0,7,6,9,0));
	
for($i = 0 ;$i < $vertex  ;$i++){
	$key[$i] = INF;
        $parent[$i] = 0;
	$visitedCheck[$i] = 'false';
}
$key[0] = 0;
$parent[0] = -1;
$a->prims($graph, $vertex, $visitedCheck, $key, $parent);


?>