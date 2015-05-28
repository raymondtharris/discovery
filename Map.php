<?php

class mapObject{
	private $key=NULL;
	private $value=NULL;
	public function __construct($newKey, $newValue){
		$this->setKet($newKey);
		$this->setValue($newValue);		
	}
	public function key(){
		return $this->key;
	}
	public function setKey($newKey){
		$this->key=$newKey;
	}
	public function value(){
		return $this->value;
	}
	public function setValue($newValue){
		$this->value= $newValue;
	}
}

class Map{
	private $index=NULL;
	private $collection=NULL;
	public function __construct(){
		$this->setIndex(0);
		$this->collection = array();
	}
	public function index(){
		return $this->index;
	}
	public function setIndex($newIndex){
		$this->index= $newIndex;
	}
	public function push($newMapObject){
		array_push($this->collection, $newMapObject);
	}
	
	public function pop(){
		array_pop($this->collection);
	}
	
	public function removeByKey($keyToRemove){
		$cIndex=0;
		$current=$this->collection[$cIndex];
		while($current->key()!= $keyToRemove){
			$cIndex++;
		}
		array_splice($this->collection, $cIndex,1);
	}
	public function printMap(){
		echo '{<br/>';
		for($i=0; $i< count($this->collection); $i++){
			echo ''.$this->collection[$i]->key().' : '.$this->collection[$i]->value().'<br/>';	
		}
		echo '}<br/>';
	}
	public function getValueByKey($mapObjectKey){
		$cIndex=0;
		$current=$this->collection[$cIndex];
		while($current->key()!= $keyToRemove){
			$cIndex++;
		}
		return $current->value();
	}
	
	public function getMapObjectByKey($mapObjectKey){
		$cIndex=0;
		$current=$this->collection[$cIndex];
		while($current->key()!= $keyToRemove){
			$cIndex++;
		}
		return $current;
	}
	
	public function changeValueByKey($mapObjectKey, $newValue){
		$cIndex=0;
		$current=$this->collection[$cIndex];
		while($current->key()!= $keyToRemove){
			$cIndex++;
		}
		$current->setValue($newValue);
	}
	
}

?>