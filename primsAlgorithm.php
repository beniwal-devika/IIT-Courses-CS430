<?php

class primsAlgorithm {

    function __construct() {
        
    }

    function findMinimumKey($key, $visitedCheck) {

        $min = INF;
        foreach ($key as $index => $value) {
            if ($visitedCheck[$index] == 'false' && $min >= $value) {
                $min = $value;
                $minIndex = $index;
            }
        }
        return $minIndex;
    }

    function prims($graph, $vertex, $visitedCheck, $key, $parent) {
        for ($i = 0; $i < $vertex; $i++) {
            $row = $this->findMinimumKey($key, $visitedCheck);
            $visitedCheck[$row] = 'true';
            for ($col = 0; $col < $vertex; $col++) {
                if ($graph[$row][$col] && $visitedCheck[$col] == 'false' && $key[$col] > $graph[$row][$col]) {
                    $key[$col] = $graph[$row][$col];
                    $parent[$col] = $row;
                }
            }
        }
        echo "Path would be : \n";
        foreach ($parent as $index => $value) {
            if ($value == -1) continue; 
            echo $value . " ->" . $index . "  Weight = " . $key[$index] . "\n";
        }
    }

}
?>