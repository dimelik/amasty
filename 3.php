<?php

$arr = explode(" ", $argv[1]);
function my_is_int($input){
    if($input[0] == '-')
    {
        return ctype_digit(substr($input, 1));
    }
    return ctype_digit($input);
}
$return_array = [];
foreach ($arr as $val) {
    if (my_is_int($val)) {
        $return_array[] = (int)$val;
    }
}
sort($return_array);
$return_array = array_unique($return_array);
$return = implode(" ", $return_array);
echo "Result: " . $return . "\n";