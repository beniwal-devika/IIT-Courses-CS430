
<?php

/*
 * Depth for Search
 */

class depthFirstSearch {

    protected $stack;

    function __construct() {
        $this->stack = new SplStack();
    }

    function dfs($matrix, $vertices, $source, $visitedNode) {
      $result = array();
      $this->stack->push($source);
      $visitedNode[$source] = true; 

      while(!$this->stack->isEmpty()){
           $poppedData = $this->stack->pop();
           $result[]= $poppedData;
           $row = $poppedData;
               for($col = 0 ;$col < $vertices ;$col++){
                   if($matrix[$row][$col] && !$visitedNode[$col]){
                       $visitedNode[$col] = true;
                        $this->stack->push($col);
                   }
               }   
      }
      echo "DFS : "."\t";
      foreach($result as $data){
          echo $data."\t";
      } 
    }

}
