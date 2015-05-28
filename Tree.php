<?php
$TREEMAXVAL = 100;

class binaryNode{
	public $value = NULL;
	public $parent = NULL;
	public $left = NULL;
	public $right=NULL;
	function __construct($newValue){
		$this->value= $newValue;
		//echo($this->value);
	}
	
}

class binaryTree{
	public $root = NULL;
	public $height = 0;
	function setRoot($newNode){
		$this->newNode->parent = NULL;
		$this->root = &$newNode;
	}
	function insertNode($newNode){
		if($this->root == NULL){
			$this->setRoot($newNode);
		}
		else{
			if($newNode->value < $this->root->value){
				if($this->root->left == NULL){
					$this->root->left = &$newNode;
					$newNode->parent = &$this->root;
				}
				else{
					$this->compareNodes($newNode,$this->root->left);
				}
			}
			else{
				if($this->root->right == NULL){
					$this->root->right = &$newNode;
					$newNode->parent = &$this->root;
				}
				else{
					$this->compareNodes($newNode,$this->root->right);
				}
			}
		}
	}
	
	function compareNodes($newNode, $otherNode){
		if($newNode->value < $otherNode->value){
			if($otherNode->left==NULL){
				$otherNode->left = &$newNode;
				$newNode->parent = &$otherNode;
			}
			else{
				$this->compareNodes($newNode, $otherNode->left);
			}
		}
		else{
			if($otherNode->right==NULL){
				$otherNode->right = &$newNode;
				$newNode->parent = &$otherNode;
			}
			else{
				$this->compareNodes($newNode, $otherNode->right);
			}
		}
	}
	
	function removeNode($node){
		if($this->searchForNode($node) == true){
			if($node->left==NULL && $node->right==NULL){ //leaf Node removal
				$temp = $node->parent;
				if($temp->left->value == $node->value){
					$temp->left=NULL;
					unset($node);
				}
				else{
					$temp->right=NULL;
					unset($node);
				}			
			}
			elseif($node->left!=NULL && $node->right==NULL){ 
				$temp = $node->parent;
				if($temp->left->value == $node->value){
					$temp->left=$node->left;
					$node->left->parent=$temp; 
					unset($node);
				}
				else{
					$temp->right=$node->left;
					$node->left->parent = $temp;
					unset($node);
				}
			}
			elseif($node->left==NULL && $node->right!=NULL){
				$temp = $node->parent;
				if($temp->left->value == $node->value){
					$temp->left=$node->right;
					$node->right->parent=$temp;
					unset($node);
				}
				else{
					$temp->right=$node->right;
					$node->right->parent=$temp;
					unset($node);
				}
			}
			else{
				$temp = $node->parent;
				if($temp->left->value == $node->value){
					$successor = $this->findSuccessorL($node->left);
					$node->value = $successor->value;
					if($node->left->right==NULL &&$node->left->left !=NULL){
						$node->left =$node->left->left;
						$node->left->left->parent=$node; 
						unset($successor);
					}
					elseif($successor->left!=NULL){
						$successor->left->parent=$successor->parent;
						$successor->parent->right= $successor->left;
						unset($successor);
					}
					else{
						$successor->parent->right=NULL;
						unset($successor);
					}
				}
				else{
					$successor = $this->findSuccessor($node->right);
					$node->value = $successor->value;
					if($node->right->left==NULL &&$node->right->right !=NULL){
						$node->right =$node->right->right;
						$node->right->right->parent=$node; 
						unset($successor);
					}
					elseif($successor->right!=NULL){
						$successor->right->parent=$successor->parent;
						$successor->parent->left= $successor->right;
						unset($successor);
					}
					else{
						$successor->parent->left=NULL;
						unset($successor);
					}
				}
				
			}		
		}
		else{
			echo 'cannot remove node not in tree';
		}
	}
	function findSuccessorL($node){
		if($node->right==NULL){
			return $node;
		}
		else{
			$this->findSuccessorL($node->right);
		}
	}
	function findSuccessor($node){
		if($node->left == NULL){
			return $node;
		}
		else{
			$this->findSuccessor($node->left);
		}
	}
	
	function findNodeByValue($nodeValue){
		$current= $this->root;
		$node = $this->compareReturn($nodeValue, $current);
		return $node;
	}
	function compareReturn($nodeValue, $otherNode){
		if($nodeValue == $otherNode->value){
			
			echo 'node '.$nodeValue.' is in tree';
			return $otherNode;
		}
		
		elseif($nodeValue < $otherNode->value && $otherNode !=NULL){
			
			$this->compareReturn($nodeValue, $otherNode->left);
		}
		
		elseif($nodeValue > $otherNode->value && $otherNode !=NULL){
			
			$this->compareReturn($nodeValue, $otherNode->right);
		}
		else{
			//echo 'node '.$nodeValue.' not in tree';
			return NULL; 
		}
	}
	
	
	function searchForNode($node){
		$temp;
		$temp = $this->traverse($node, $this->root);
		return $temp;
	}
	
	function traverse($node, $otherNode){
	//echo 'node '. $node->value.'  otherNode'.$otherNode->value.'<br/>';
		if($node->value == $otherNode->value){
			
			//echo 'node '.$node->value.' is in tree';
			return true;
		}
		
		elseif($node->value < $otherNode->value && $otherNode !=NULL){
			
			$this->traverse($node, $otherNode->left);
		}
		
		elseif($node->value > $otherNode->value && $otherNode !=NULL){
			
			$this->traverse($node, $otherNode->right);
		}
		else{
			echo 'node '.$node->value.' not in tree';
			return false;
		}
		
	}
	
	function printTree($option){
		echo 'print ';
		if($option == "inorder"){
			echo 'in order <br/>';
			$this->inOrder($this->root);
		}
		elseif($option == "preorder"){
			echo 'pre order <br/> ';
			$this->preOrder($this->root);
		}
		elseif($option == "postorder"){
			echo 'post order <br/>';
			$this->postOrder($this->root);
		}
		else{
			//$option = "inorder";
			printTree("inorder");
		}
		
	}
	
	function preOrder($node){
		if($node == NULL){
		
		}
		else{
		$this->printNode($node);
		$this->preOrder($node->left);
		$this->preOrder($node->right);
		}
	}
	function inOrder($node){
		if($node == NULL){
			
		}
		else{
			$this->inOrder($node->left);
			$this->printNode($node);
			$this->inOrder($node->right);
		}
	}
	function postOrder($node){
		if($node == NULL){
			
		}
		else{
			$this->postOrder($node->left);
			$this->postOrder($node->right);
			$this->printNode($node);
		}
	}
		
	function printNode($node){
		print $node->value."  ";
	}
	
	public function checkAll(){
		
	 	$l = $this->checkNode($this->root);
	 	echo $l->value.' last';
	 	return $l;
	}
	
	public function checkNode($node){
		if($node==NULL){
		echo('NULL  ');
		}
		else{
			echo('YEAH   ');
			$this->checkNode($node->left);
			$this->returnNode($node);
			$this->checkNode($this->right);
		}
	}
	public function returnNode($node){
		echo $node->value.'  ' ;
		return $node;
	}
	
	
	
}

?>