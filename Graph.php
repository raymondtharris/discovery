<?php

require_once('/Volumes/Macintosh HD/Users/Tim/Sites/Discovery/List.php');
require_once('/Volumes/Macintosh HD/Users/Tim/Sites/Discovery/Map.php');

class graph{
	private $graph=NULL;
	private $verts=NULL;
	public function __construct(){
		$this->graph = new Map();
		$this->verts = new linkList();
	}
	public function makeNeighbortlist($arrayOfNodes){
		$temp = new linkList();
		for($i=0; i<count($arrayOfNodes); $i++){
			$temp->push($arrayOfNodes[$i]);
		}
		return $temp;
	}
	
	public function add($vertNodeKey, $neighborsList){
		$vertNode = new listNode($vertNodeKey);
		$this->verts->push($vertNode);
		$newMapObject= new $mapObject($vertNode-key(), $neighborsList);
		$this->graph->push($newMapObject);
	}
	public function addNewNeighborToKey($nodeKey, $newNeightbor){
		$theNode = $this->graph->getMapObjectByKey($nodeKey);
		$temp = $theNode->value();
		$temp->push($newNeightbor);
	}
	
	public function neighborsByKey($nodeKey){
		$neighborsList = $this->graph->getMapObjectByKey($nodeKey);
		return $neighborsList->value();
	}
	
	public function removeNeighborFromKey($nodeKey, $nodeToRemove){
		$node = $this->graph->getMapObjectByKey($nodeKey);
		$nodeList = $node->value();
		$nodeList->removeNode($nodeToRemove);
	}
	
	public function printGraph(){
		echo '<br/>';
		for($i=0; $i< count($this->graph->collection); $i++){
			echo ''.$this->graph->collection[$i]->key();
			$adjs = $this->graph->collection[$i]->value();	
			$current= $adjs->head();
			while($current->key() != $this->tail->key()){
				echo $current->key().', ';
				$current=$current->next();
			}
			echo $adjs->tail()->key();
										
			echo '<br/>';	
		}
		echo '<br/>';
	}
		
}


?>