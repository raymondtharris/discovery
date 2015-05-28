<?php
require_once('/Volumes/Macintosh HD/Users/Tim/Sites/Discovery/Tree.php');

class Set{
	private $set=NULL;
	public function __construct(){
		$this->set= new binaryTree();
	}
	public function add($newNodeKey){
		$newNode = new binaryNode($newNodeKey);
		if($this->set->searchForNode($newNode)==false){
			$this->set->insertNode($newNode);
		}
		else{
			echo 'Value is contained in set already';
		}
	}
	
	public function remove($newNodeKey){
		if($this->set->findNodeByValue($newNodeKey) == NULL){
			$delValue = $this->set->findNodeByValue($newNodeKey);
			$this->set->removeNode($delValue);
		}
		else{
			echo 'Value is not in set';
		}
	}
	
	public function printSet(){
		echo ' {  ';
		$this->set->printTree('inorder');
		echo '  } <br/>';
	}
	
	public function union($otherSet){
		$current= $otherSet->set->root;
		while($this->inOrderCheck($current, $otherSet) !=NULL){
			
		}
		
	}
	public function inOrderCheck($node, $otherSet){
		if($node==NULL){
			
		}
		else{
			$this->inOrderCheck($node->left, $otherSet);
			$this->returnNode($node, $otherSet);
			$this->inOrderCheck($node->right, $otherSet);
			
		}
	}
	public function returnNode($node,$otherSet){
		//echo '<br/>'.$node->value.'<br/>  ';
		
		if($this->set->compareReturn($node->value, $this->set->root)==NULL){
			$newNode = new binaryNode($node->value);
			$this->set->insertNode($newNode);
			$otherSet->set->removeNode($node);
		}
		
		return $node;
	}
	
	public function difference($otherSet){
		
	}
	public function intersection($otherSet){
		
	}
	
	
}

?>