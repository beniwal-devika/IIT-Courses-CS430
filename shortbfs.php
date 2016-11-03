<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include "shortestPathUsingBFS.php";

$object = new shortestPathUsingBFS();

$vertices = 8;
$source = 0;
$destination = 2;
$visitedNode = array();

$matrix = array(array(0,1,0,1,0,0,1,0),
                array(0,0,0,0,1,1,0,0),
                array(0,0,0,0,0,1,0,1),
                array(1,0,0,0,0,1,0,0),
                array(0,1,0,0,0,1,1,0),
                array(0,1,1,1,0,0,0,0),
                array(1,0,0,0,1,0,0,0),
                array(0,0,1,0,0,0,0,0));

$previous = array();

for($i = 0;$i <= $vertices ; $i++){
    $visitedNode[$i] = false;
    $previous[$i] = -1;
}
$object->shortestPath($matrix, $vertices, $source,$destination, $visitedNode, $previous);

