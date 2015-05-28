<?php

require_once('/Volumes/Macintosh HD/Users/Tim/Sites/Discovery/Tree.php');
//require("Tree.php");
$myTree = new binaryTree();

$newNode = new binaryNode(12);
$newNode2 = new binaryNode(34);
$newNode3 = new binaryNode(54);
$newNode4 = new binaryNode(3);
$newNode5 = new binaryNode(122);

$myTree->insertNode($newNode);
$myTree->insertNode($newNode2);
$myTree->insertNode($newNode3);
$myTree->insertNode($newNode4);

//$newNode->$payload = "I have stuff";


$myTree->printTree("preorder");
echo ' <br/>';
$myTree->printTree("inorder");
echo ' <br/>';
$myTree->printTree("postorder");

echo '<br/><br/>Search <br/>';
$myTree->searchForNode($newNode3);
echo ' <br/>';

$myTree->searchForNode($newNode5);

require_once('/Volumes/Macintosh HD/Users/Tim/Sites/Discovery/Graph.php');
require_once('/Volumes/Macintosh HD/Users/Tim/Sites/Discovery/List.php');

echo '<br/><br/>';

$myList = new linkList();

$newNodel = new listNode(5);
$newNodel2 = new listNode(6);
$newNodel3 = new listNode(4);
$newNodel4 = new listNode(7);
$newNodel5 = new listNode(8);


$myList->push($newNodel);
$myList->push($newNodel2);
$myList->push($newNodel3);
$myList->push($newNodel4);
$myList->push($newNodel5);

$myList->printList();

$myList->pop();



$myList->printList();

echo $myList->peek()->key();



?>