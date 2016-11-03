<?php

class dijkstrasAlgorithm {

    function __construct() {
        
    }

    function findMinimumKey($key, $mset) {

        $min = INF;
        foreach ($key as $index => $value) {
            if ($mset[$index] == 'false' && $min >= $value) {
                $min = $value;
                $minIndex = $index;
            }
        }
        return $minIndex;
    }

    function dijkstras($graph, $vertex, $mset, $key, $source) {
        for ($i = 0; $i < $vertex; $i++) {

            $row = $this->findMinimumKey($key, $mset);

            $mset[$row] = 'true';
            for ($col = 0; $col < $vertex; $col++) {
                if ($graph[$row][$col] && $mset[$col] == 'false' && $key[$row] != INF && $key[$col] > $graph[$row][$col] + $key[$row]) {
                    $key[$col] = $graph[$row][$col] + $key[$row];
                }
            }
        }

        echo "Shortest Path from source to vertex : \n";
        foreach ($key as $index => $value) {
            echo $source. " to ".$index . " ->" . $value . "\n";
        }
    }

}

?>