<?php
require_once('/Volumes/Macintosh HD/Users/Tim/Sites/Discovery/List.php');

class Queue{
	private $front=NULL;
	private $back=NULL;
	private $length=NULL;
	private $queue=NULL;
	public function __construct(){
		$this->queue = new doublyLinkList();
		$this->setLength($this->queue->length());
		$this->setFront($this->queue->head());
		$this->setBack($this->queue->back());
	}
	public function length(){
		return $this->length;
	}
	public function setLength($newLength){
		$this->length= $newLength;
	}
	public function front(){
		return $this->front;
	}
	public function setFront($newFront){
		$this->front=$newFront;
	}
	public function back(){
		return $this->back;
	}
	public function setBack($newBack){
		$this->back=$newBack;
	}
	public function enqueue($newNodeKey){
		$newNode= new doublyLinkList($newNodeKey);
		$this->queue->push($newNode);
	}
	public function dequeue(){
		$this->queue->removeNode($this->front());
	}
	public function printQueue(){
		$currentPosition= $this->front();
		while($currentPosition->key()!=$this->back()->key()){
			echo $currentPosition->key().'-';
			$currentPosition= $currentPosition->next();
		}
		echo $currentPosition->key();
	}
			
}

class priorityNode extends doublyListNode{
		private $priority=NULL;
		public function __construct($newKey, $newPriority){
			$this->setKey($newKey);
			$this->setPriority($newPriority);
		}
		public function priority(){
			return $this->priority;
		}
		public function setPriority($newPriority){
			$this->priority=$newPriority;
		}
}

class priorityQueue{
	private $front=NULL;
	private $back=NULL;
	private $length=NULL;
	private $queue=NULL;
	public function __construct(){
		$this->queue = new doublyLinkList();
		$this->setLength($this->queue->length());
		$this->setFront($this->queue->head());
		$this->setBack($this->queue->back());
	}
	public function length(){
		return $this->length;
	}
	public function setLength($newLength){
		$this->length= $newLength;
	}
	public function front(){
		return $this->front;
	}
	public function setFront($newFront){
		$this->front=$newFront;
	}
	public function back(){
		return $this->back;
	}
	public function setBack($newBack){
		$this->back=$newBack;
	}
	public function enqueue($newNodeKey,$newNodePriority){
		$newNode= new priorityNode($newNodeKey, $newNodePriority);
		$this->queue->push($newNode);
	}
	public function dequeue(){
		$highestPriority=$this->front();
		$currentPosition=$this->front();
		while($currentPosition->key()!=$this->back()->key()){
			if($highestPriority->key()> $currentPosition->key()){
				$highestPriority=$currentPosition;
			}
			$currentPosition=$currentPosition->next();
		}
		$this->queue->removeNode($highestPriority);
		
	}
	public function printQueue(){
		$currentPosition= $this->front();
		while($currentPosition->key()!=$this->back()->key()){
			echo '(k:'.$currentPosition->key().'; P:'.$currentPosition->priority().')--';
			$currentPosition= $currentPosition->next();
		}
		echo $currentPosition->key();
	}
	
}

?>