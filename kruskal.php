<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include "kruskalsAlgorithm.php";

$object = new kruskalsAlgorithm();

$vertices = 4;

$matrix = array(array(INF, 1, 2, 5), array(1, INF, 3, INF), array(2, 3, INF, 4), array(5, INF, 4, INF));
$dfsMatrix = array(array(0, 0, 0, 0), array(0, 0, 0, 0), array(0, 0, 0, 0), array(0, 0, 0, 0));

$source = 0;
$visitedNode = array();
$parent = array();
for ($i = 0; $i < $vertices; $i++) {
    $visitedNode[$i] = false;
    $parent[$i] = -1;
}
$object->kruskals($matrix, $vertices, $source, $visitedNode, $dfsMatrix, $parent);

