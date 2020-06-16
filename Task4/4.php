<?php
include_once('parser/simple_html_dom.php');
require_once "Footbal.php";

if(isset($_POST)){

    function sanitizeString($var)
    {
        $var = stripslashes($var);
        $var = strip_tags($var);
        $var = htmlentities($var);
        return $var;
    }

    $post = sanitizeString($_POST['club']);

    $setFirst = new Footbal($post);
    $setFirst->setFirstYear(9);
    $setFirst->getPlace();
}