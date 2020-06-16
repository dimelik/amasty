<?php
/**
 * 2)
 */
require_once "Stroop.php";
$items = ["red", "blue", "green", "yellow", "lime", "magenta", "black", "gold", "gray", "tomato"];
$test = new Stroop($items);
$str = $test->getTest();