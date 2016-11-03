
<?php

/*
 * Breadth for Search
 */

class breadthFirstSearch {

    protected $stack;

    function __construct() {
        $this->queue = new SplQueue();
    }

    function bfs($matrix, $vertices, $source, $visitedNode) {
        $result = array();
        $this->queue->enqueue($source);
        $visitedNode[$source] = true;

        while (!$this->queue->isEmpty()) {
            $poppedData = $this->queue->dequeue();
            $result[] = $poppedData;
            $row = $poppedData;
            for ($col = 0; $col <= $vertices; $col++) {
                if ($matrix[$row][$col] && !$visitedNode[$col]) {
                    $visitedNode[$col] = true;
                    $this->queue->enqueue($col);
                }
            }
        }
        echo "BFS : " . "\t";
        foreach ($result as $data) {
            echo $data . "\t";
        }
    }

}
