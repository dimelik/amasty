<?php
include_once('parser/simple_html_dom.php');
require_once "Footbal.php";

if($_POST){

    function sanitizeString($var)
    {
        $var = stripslashes($var);
        $var = strip_tags($var);
        $var = htmlentities($var);
        return $var;
    }

    $post = sanitizeString($_POST['club']);
    $url[] = 'http://terrikon.com/football/italy/championship/2009-10/table';
    $url[] = 'http://terrikon.com/football/italy/championship/2010-11/table';
    $url[] = 'http://terrikon.com/football/italy/championship/2011-12/table';
    $url[] = 'http://terrikon.com/football/italy/championship/2012-13/table';
    $url[] = 'http://terrikon.com/football/italy/championship/2013-14/table';
    $url[] = 'http://terrikon.com/football/italy/championship/2014-15/table';
    $url[] = 'http://terrikon.com/football/italy/championship/2015-16/table';
    $url[] = 'http://terrikon.com/football/italy/championship/2016-17/table';
    $url[] = 'http://terrikon.com/football/italy/championship/2017-18/table';


    $setFirst = (new Footbal())->setFirstYear(9);
    foreach($url as $value){
        $teamResult = new Footbal($post, $value);
        $teamResult->getPlace();
    }

}