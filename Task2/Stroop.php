<?php


final class Stroop
{
    private $items;

    public function __construct($items)
    {
        $this->items = $items;
    }

    private function getItems()
    {
        $random = $this->items;
        shuffle($random);
        return ['color' => array_pop($random), 'word' => array_pop($random)];
    }

    private function getWord()
    {
        $wordColor = $this->getItems();
        $color = $wordColor['color'];
        $word = $wordColor['word'];
        return "<b style=\"color: $color\">" . $word . '</b>';
    }

    public function getTest()
    {
        echo "<div>{$this->getWord()}, {$this->getWord()}, {$this->getWord()}, {$this->getWord()},{$this->getWord()}</div>";
        echo "<div>{$this->getWord()}, {$this->getWord()}, {$this->getWord()}, {$this->getWord()},{$this->getWord()}</div>";
        echo "<div>{$this->getWord()}, {$this->getWord()}, {$this->getWord()}, {$this->getWord()},{$this->getWord()}</div>";
        echo "<div>{$this->getWord()}, {$this->getWord()}, {$this->getWord()}, {$this->getWord()},{$this->getWord()}</div>";
        echo "<div>{$this->getWord()}, {$this->getWord()}, {$this->getWord()}, {$this->getWord()},{$this->getWord()}</div>";
        return print "Test success";
    }
}