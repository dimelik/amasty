<?php

final class Footbal
{
    private $post;
    private $firstYear;
    static private $year;

    public function __construct($post = null, $startYear)
    {
        $this->post = $post;
        $this->firstYear = $startYear;
        self::$year = $startYear;
    }

    private function is_url_exist($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($code == 200) {
            $status = true;
        } else {
            $status = false;
        }
        curl_close($ch);
        return $status;
    }

    public function getPlace()
    {
        echo "<table><thead>$this->post</thead>";
        for ($this->firstYear++, $yearUrl = 2000 + $this->firstYear - 1;
             $link = 'http://terrikon.com/football/italy/championship/' . $yearUrl . '-' . $this->firstYear . '/table';
             $this->firstYear++, $yearUrl++) {
            if ($this->is_url_exist($link)) {
                $html = file_get_html($link);
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
                        echo "<tr><td>" . 'Season ' . self::$year++ . '-' . self::$year . ':' . strstr($value, '.',
                                true) . "</td></tr>";
                    }
                }
            } else {
                break;
            }
        }
        echo "</table>";
    }
}