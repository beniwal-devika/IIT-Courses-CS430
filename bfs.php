<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include "breadthFirstSearch.php";

$object = new breadthFirstSearch();

$vertices = 8;
$source = 0;
$visitedNode = array();

$matrix = array(array(0,1,0,1,0,0,1,0),
                array(0,0,0,0,1,1,0,0),
                array(0,0,0,0,0,1,0,1),
                array(1,0,0,0,0,1,0,0),
                array(0,1,0,0,0,1,1,0),
                array(0,1,1,1,0,0,0,0),
                array(1,0,0,0,1,0,0,0),
                array(0,0,1,0,0,0,0,0));

for($i = 0;$i <= $vertices ; $i++){
    $visitedNode[$i] = false;
}
$object->bfs($matrix, $vertices, $source, $visitedNode);

