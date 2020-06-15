<?php
/**
 * 1)
 */
require_once "Task1/Base.php";
require_once "Task1/First.php";
require_once "Task1/Second.php";


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
require_once "Task2/Stroop.php";
$items = ["red", "blue", "green", "yellow", "lime", "magenta", "black", "gold", "gray", "tomato"];
$test = new Stroop($items);
$str = $test->getTest();

