<?php

/**
 * 1)
 */
require_once "Base.php";
require_once "First.php";
require_once "Second.php";


$first = new First();
$second = new Second();

$first->getClassname();
$second->getClassname();
$first->getLetter();
$second->getLetter();
