<?php
/**
 * 1)
 */
require_once "Classname.php";
require_once "First.php";
require_once "Second.php";


$first = new First();
$second = new Second();

$first->getClassname();
$second->getClassname();
$first->getLetter();
$second->getLetter();
echo "<br><br>";
/**
 * 2)
 */
print "<a href=tasktwo.html>перейдите на тест Струпера</a>";
