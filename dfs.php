<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include "depthFirstSearch.php";

$object = new depthFirstSearch();

$vertices = 4;

$matrix = array(array(0,1,1,0),array(1,0,1,0),array(0,1,0,1),array(0,0,1,1));

$source = 0;
$visitedNode = array();

for($i = 0;$i < $vertices ; $i++){
    $visitedNode[$i] = false;
}

$object->dfs($matrix, $vertices, $source, $visitedNode);

