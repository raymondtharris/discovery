<?php

class listNode{
	private $next=NULL;
	private $key=NULL;
	public function __construct($newKey){
		$this->setKey($newKey);
	}
	public function setKey($newKey){
		$this->key = $newKey;
	}
	public function key(){
		return $this->key;
	}
	public function setNext($nextNode){
		$this->next=&$nextNode;
	}
	public function next(){
		return $this->next;
	}
}
class linkList{
	private $head=NULL;
	private $tail=NULL;
	private $length=NULL;

	public function __construct(){
		$this->setLength(0);
	}
	public function setLength($newLength){
		$this->length= $newLength;
	}
	public function length(){
		return $this->length;
	}
	public function setHead($newNode){
		if($this->head()==NULL){
			$this->head=&$newNode;
		}
		else{
			$newNode->setNext($this->head());
			$this->head=&$newNode;
		}
	}
	public function head(){
		return $this->head;
	}
	public function setTail($newNode){
		if($this->tail()==NULL){
			$this->tail=&$newNode;
		}
		else{
			$this->tail()->setNext($newNode);
			$this->tail=&$newNode;
		}
	}
	public function tail(){
		return $this->tail;
	}
	
	public function push($newNode){
		if($this->head()==NULL){
			$this->setHead($newNode);
			$this->setTail($newNode);
			$this->setLength($this->length()+1);
		}
		else{
		$this->setTail($newNode);
		$this->setLength($this->length()+1);
		}
	}
	
	public function printList(){
		$current= $this->head();
		while($current->key() != $this->tail->key()){
			echo $current->key().'->';
			$current=$current->next();
		}
		echo $this->tail()->key();
	}
	
	public function pop(){
		
		$current= $this->head();
		while($current->next()->key() != $this->tail->key()){
			//echo $current->key().'->';
			$current=$current->next();
			$this->setLength($this->length()-1);

		}
		unset($this->tail);
		$current->setNext(NULL);
		$this->setTail($current);
		$this->setLength($this->length()-1);

		
	}
	public function peek(){
		$current= $this->head();
		while($current->next()->key() != $this->tail->key()){
			//echo $current->key().'->';
			$current=$current->next();
		}
		return  $current;
	}
	public function insertAfter($newNode,$beforeNode){
		if($beforeNode->next()==NULL){
			$this->push($newNode);
		}
		else{
			$newNode->setNext($beforeNode->next());
			$beforeNode->setNext($newNode);
			$this->setLength($this->length()+1);

		}
	}
	public function insertBefore($newNode, $afterNode){
		if($afterNode->key()== $this->head()->key()){
			//$newNode->setNext($afterNode);
			$this->setHead($newNode);
			$this->setLength($this->length()+1);

		}
		else{
			$prevNode=$this->head();
			while($prevNode->next()->key() != $afterNode->key()){
				$prevNode=$prevNode->next();

			}
			$newNode->setNext($afterNode);
			$prevNode->setNext($newNode);
			$this->setLength($this->length()+1);

		}
	}
	public function removeNode($delNode){
		if($delNode->key()==$this->head()->key()){
			$this->head=$this->head()->next();
			$this->setLength($this->length()-1);
			unset($delNode);
		}
		elseif($delNode->key()==$this->tail()->key()){
			$this->pop();
		}
		else{
			$prevNode=$this->head();
			while($prevNode->next()->key() != $afterNode->key()){
				$prevNode=$prevNode->next();
			}
			$prevNode->setNext($delNode->next());
			$this->setLength($this->length()-1);
			unset($delNode);
		}
	}
	public function findNodeByKey($somekey){
		$current= $this->head();
		while($current->key() != $somekey){
			//echo $current->key().'->';
			$current=$current->next();
		}
		return $current;
	}
	
}

class doublyListNode{
	private $next=NULL;
	private $prev=NULL;
	private $key=NULL;
	public function __construct($newKey){
		$this->setKey($newKey);
	}
	public function setKey($newKey){
		$this->key = $newKey;
	}
	public function key(){
		return $this->key;
	}
	public function setNext($nextNode){
		$this->next=&$nextNode;
	}
	public function next(){
		return $this->next;
	}
	public function setPrev($prevNode){
		$this->prev=&$prevNode;
	}
	public function prev(){
		return $this->prev;
	}
}


class doublyLinkList{
	private $head=NULL;
	private $tail=NULL;
	private $length=NULL;

	public function __construct(){
		$this->setLength(0);
	}
	public function setLength($newLength){
		$this->length= $newLength;
	}
	public function length(){
		return $this->length;
	}
	public function setHead($newNode){
		if($this->head()==NULL){
			$this->head=&$newNode;
		}
		else{
			$newNode->setNext($this->head());
			$this->head()->setPrev($newNode);
			$this->head=&$newNode;
		}
	}
	public function head(){
		return $this->head;
	}
	public function setTail($newNode){
		if($this->tail()==NULL){
			$this->tail=&$newNode;
		}
		else{
			$this->tail()->setNext($newNode);
			$newNode->setPrev($this->tail());
			$this->tail=&$newNode;
		}
	}
	public function tail(){
		return $this->tail;
	}
	
	public function push($newNode){
		if($this->head()==NULL){
			$this->setHead($newNode);
			$this->setTail($newNode);
			$this->setLength($this->length()+1);
		}
		else{
		$this->setTail($newNode);
		$this->setLength($this->length()+1);
		}
	}
	
	public function printList(){
		$current= $this->head();
		while($current->key() != $this->tail->key()){
			echo $current->key().'<->';
			$current=$current->next();
		}
		echo $this->tail()->key();
	}
	
	
	
	public function pop(){		
		$this->setTail($this->tail()->prev());
		$this->tail()->setNext(NULL);
		$this->setLength($this->length()-1);		
	}
	public function peek(){
		return  $this->tail()->prev();
	}
	public function insertAfter($newNode,$beforeNode){
		if($beforeNode->next()==NULL){
			$this->push($newNode);
		}
		else{
			$newNode->setNext($beforeNode->next());
			$newNode->setPrev($prevNode);
			$beforeNode->next()->setPrev($newNode);
			$beforeNode->setNext($newNode);
			$this->setLength($this->length()+1);

		}
	}
	public function insertBefore($newNode, $afterNode){
		if($afterNode->key()== $this->head()->key()){
			//$newNode->setNext($afterNode);
			$this->setHead($newNode);
			$this->setLength($this->length()+1);

		}
		else{
			$afterNode->prev()->setNext($newNode);
			$newNode->setPrev($afterNode->prev());
			$afterNode->setPrev($newNode);
			$newNode->setNext($afterNode);
			$this->setLength($this->length()+1);

		}
	}
	public function removeNode($delNode){
		if($delNode->key()==$this->head()->key()){
			$this->head=$this->head()->next();
			$this->head()->setPrev(NULL);
			$this->setLength($this->length()-1);
			unset($delNode);
		}
		elseif($delNode->key()==$this->tail()->key()){
			$this->pop();
		}
		else{
			$delNode->prev()->setNext($delNode->next());
			$delNode->next()->setPrev($delNode->prev());
			$this->setLength($this->length()-1);
			unset($delNode);
		}
	}
	public function findNodeByKey($somekey){
		$current= $this->head();
		while($current->key() != $somekey){
			//echo $current->key().'->';
			$current=$current->next();
		}
		return $current;
	}	
	
}

?>