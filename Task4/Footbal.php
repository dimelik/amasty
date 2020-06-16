<?php

final class Footbal
{
    private $post;
    private $firstYear;
    static private $year;

    public function __construct($post = null)
    {
        $this->post = $post;
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
        echo $this->post . '<br>';
        for ($this->firstYear++, $yearUrl = 2000 + $this->firstYear - 1;
             $url = 'http://terrikon.com/football/italy/championship/' . $yearUrl . '-' . $this->firstYear . '/table';
             $this->firstYear++, $yearUrl++)
        {
            $html = file_get_html($url);
            $array = [];
            foreach ($html->find('tr') as $element) {
                $array[] = strstr($element->plaintext, '#', true);
            }
            array_shift($array);
            $html->clear();
            unset($html);

            foreach ($array as $value) {
                $pos = strpos($value, $this->post);
                if ($pos !== false) {
                    echo 'Season ' . self::$year++ . '-' . self::$year . ':' . strstr($value, '.', true) . '<br>';
                }
            }
        }


    }

}