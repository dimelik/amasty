<?php

abstract class Base
{
    public function getClassName(){
        echo get_class($this);
    }
    abstract public function getLetter();
}