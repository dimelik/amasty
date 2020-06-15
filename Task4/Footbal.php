<?php

final class Footbal
{
    private $url;
    private $post;
    private $firstYear;
    static private $year;

    public function __construct($post = null, $url = null)
    {
        $this->post = $post;
        $this->url = $url;
    }

    public function setFirstYear($year)
    {
        $this->firstYear = $year;
        self::$year = $year;
    }
    public function getFirstYear($year)
    {
        return $this->firstYear;
    }

    public function getPlace()
    {
        $html = file_get_html($this->url);

        foreach ($html->find('tr') as $element) {
            $array[] = strstr($element->plaintext, '#', true);
        }
        array_shift($array);


        $html->clear();
        unset($html);

        foreach ($array as $value) {
            $pos = strpos($value, $this->post);
            if ($pos !== false) {
                echo 'Season ' . self::$year++ . '-' . self::$year . ':' . $value . '<br>';
            }
        }
    }

}