<?php

/*
 * Kruskal's algorith using DFS
 */

class kruskalsAlgorithm {

    function __construct() {
        $this->count = 0;
        $this->stack = new SplStack();
    }

    function kruskals($matrix, $vertices, $source, $visitedNode, $dfsMatrix, $parent) {

        $final = array();

        //start : Sorting the input according to weights
        
        $min = INF;
        $sortedOrder = array();
        while ($this->count <= $vertices) {

            for ($row = 0; $row < $vertices; $row++) {
                for ($col = 0; $col < $vertices; $col++) {
                    if ($matrix[$row][$col] < $min) {
                        $min = $matrix[$row][$col];
                        $weight = $min;
                        $source = $row;
                        $destination = $col;
                    }
                }
            }

            $sortedOrder[] = array('weight' => $weight, 'source' => $source, 'destination' => $destination);
            $matrix[$source][$destination] = INF;
            $matrix[$destination][$source] = INF;
            $min = INF;
            $this->count++;
        }

        //end 
        
        //Using DFS find cycle into the graph and discard those edges.
        
        $result = array();
        foreach ($sortedOrder as $index => $data) {

            $weight = $data['weight'];
            $source = $data['source'];
            $destination = $data['destination'];

            $this->setResetMatrix($source, $destination, $dfsMatrix);

            $return = $this->dfsToFindCycle($dfsMatrix, $vertices, $source, $visitedNode, $parent);

            if ($return) { //Found a cycle in the graph
                $this->setResetMatrix($source, $destination, $dfsMatrix, true);
                continue;
            } else {
                $final[] = array('weight' => $weight, 'source' => $source, 'destination' => $destination);
            }
        }

        $this->printFinalOutput($final); 
    }

    function printFinalOutput($final) {

        echo "OUTPUT :" . "\n";

        echo "weight" . "\t" . "source" . "\t" . "destination" . "\n";

        foreach ($final as $data) {
            echo $data['weight'] . "\t" . $data['source'] . "\t" . $data['destination'] . "\n";
        }
    }

    function setResetMatrix($source, $destination, &$dfsMatrix, $reset = false) {

        if ($reset) {
            $dfsMatrix[$source][$destination] = 0;
            $dfsMatrix[$destination][$source] = 0;
        } else {
            $dfsMatrix[$source][$destination] = 1;
            $dfsMatrix[$destination][$source] = 1;
        }
    }

    function dfsToFindCycle($matrix, $vertices, $source, $visitedNode, $parent) {

        $result = array();
        $this->stack->push($source);
        $visitedNode[$source] = true;
        $parent[$source] = $source;

        while (!$this->stack->isEmpty()) {
            $poppedData = $this->stack->pop();
            $result[] = $poppedData;
            $row = $poppedData;
            for ($col = 0; $col < $vertices; $col++) {
                if ($matrix[$row][$col] && !$visitedNode[$col]) {
                    $visitedNode[$col] = true;
                    $this->stack->push($col);
                    $parent[$col] = $row;
                } else if ($visitedNode[$col] && $matrix[$row][$col]) {
                    if ($parent[$row] == $col) {
                        continue;
                    } else {
                        if ($parent[$row] == $parent[$col]) {
                            return true;
                        }
                    }
                }
            }
        }
        return false; // NO-CYCLE
    }

}
