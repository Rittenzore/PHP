<?php
include_once "Logger.php";

$space = ' ';

class toWeb extends Logger
{

    function Date($p)
    {
        $date = new DateTime('now', new DateTimeZone("Europe/Moscow"));
        if (!$p == 0) {
            $date = $date->format($p);
            echo $date . " ";
        }
    }

    function writeText($text)
    {
        echo $text;
    }

}
?>
