<?php

require_once('/Volumes/Macintosh HD/Users/Tim/Sites/Discovery/Set.php');

$mySet = new Set();
$mySet2 = new Set();

$mySet->add(12);
$mySet->add(22);
$mySet->add(32);
$mySet->add(11);
$mySet->add(15);
$mySet2->add(23);
$mySet2->add(83);
$mySet2->add(4);

//$mySet->printSet();
//$mySet2->printSet();

$mySet->union($mySet2);

$mySet->printSet();
$mySet2->printSet();


?>