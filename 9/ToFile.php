<?php
include_once "Logger.php";

class ToFile extends Logger
{
    private $file;

    function open($file)
    {
        $this->file = fopen($file, 'w');
    }

    function writeText($text)
    {
        fwrite($this->file, $text);
    }

    function close()
    {

        fclose($this->file);
    }
}
?>