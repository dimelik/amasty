<?php

abstract class Classname
{
    public function getClassName(){
        echo get_class($this);
    }
}