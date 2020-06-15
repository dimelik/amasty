<?php

$arr = explode(" ", $argv[1]);
$return_array = [];
foreach ($arr as $val) {
    if (is_numeric($val)) {
        $return_array[] = (int)$val;
    }
}
sort($return_array);
$return_array = array_unique($return_array);
$return = implode(" ", $return_array);
echo "Result: " . $return . "\n";