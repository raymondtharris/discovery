<?php
require_once('/Volumes/Macintosh HD/Users/Tim/Sites/Discovery/List.php');

class Stack{
	private $top=NULL;
	private $bottom=NULL;
	private $stack=NULL;
	private $size=NULL;
	public function __construct(){
		$this->stack = new doublyLinkList();
		$this->setTop($this->stack->tail());
		$this->setBottom($this->stack->head());
		$this->setSize($this->stack->length());
	}
	public function size(){
		return $this->size;
	}
	public function setSize($newSize){
		$this->size=$newSize;
	}
	public function top(){
		return $this->top;
	}
	public function setTop($newTop){
		$this->top=$newTop;
	}
	public function bottom(){
		return $this->bottom;
	}
	public function setBottom($newBottom){
		$this->bottom=$newBottom;
	}
	public function push($newNodeKey){
		$newNode = new doublyListNode($newNodeKey);
		$this->stack->push($newNode);
	}
	public function pop(){
		$this->stack->pop();
	}
	
	public function printStack(){
		$current=$this->top();
		while($current->key() != $this->bottom->key()){
			echo $current->key().'<br/>';
			$current=$current->prev();
		}
		echo $current->key().'<br/>';
	}
	
	
}


?>