<?php

/*
 * Shortest path using BFS
 */

class shortestPathUsingBFS {

    function __construct() {
        $this->queue = new SplQueue();
    }

    function shortestPath($matrix, $vertices, $source, $destination, $visitedNode, $previous) {


        $result = array();
        $this->queue->enqueue($source);
        $visitedNode[$source] = true;
        $previous[$source] = $source;
        while (!$this->queue->isEmpty()) {
            $poppedData = $this->queue->dequeue();
            $result[] = $poppedData;
            $row = $poppedData;
            for ($col = 0; $col <= $vertices; $col++) {
                if ($matrix[$row][$col] && !$visitedNode[$col]) {
                    $visitedNode[$col] = true;
                    $this->queue->enqueue($col);
                    $previous[$col] = $row;

                    if ($destination == $col) {
                        goto short;
                    }
                }
            }
        }


        short:
        $resultant = array();
        $this->backTrackNodesToFindShortestPath($previous, $destination, $source, $resultant);

        echo 'Shortest path from ' . $source . ' to ' . $destination . ' is:' . "\n";

        for ($i = count(array_keys($resultant)); $i >= 0; $i--) {
            echo $resultant[$i - 1] . "\t";
        }
    }

    function backTrackNodesToFindShortestPath($previous, $destination, $source, &$resultant) {

        $resultant[] = $destination;

        $destination = $previous[$destination];

        if ($source == $destination) {
            $resultant[] = $source;
            return 0;
        }
        $this->backTrackNodesToFindShortestPath($previous, $destination, $source, $resultant);
    }

}
