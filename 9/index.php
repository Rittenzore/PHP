<?php
include_once "ToFile.php";
include_once "ToWeb.php";
if (isset($_POST["text"])) {
    $text = $_POST["text"];
    $toDo = $_POST["toDo"];
    $date = $_POST["date"];
    checkUpper($text);
    if ($toDo == "Browser") {
        if ($date == "DandT") {
            $p = "d-m-y\TH:i:s";
        } else
            if ($date == "T") {
                $p = "TH:i:s";
            } else if ($date == "No") {
                $p = "off";
            }
        $toBrowser = new ToWeb();
        $toBrowser -> writeText($text);
        $toBrowser -> Date($p);
    } else
        if ($toDo == "File") {
            if (isset($_POST["filename"])) {
                $fileName = $_POST["fileName"];
                $fileWriter = new toFile($fileName) . "<br>";
                $fileWriter -> writeText($text);
                print "Success";
            } checkUpper($text);
        }
} else include "index.html";

    function checkUpper($text)
    {

        $flag = strlen(preg_replace('/[^A-ZА-ЯЁ]/', '', $text));

        if ($flag) {
            print "<br>String " . $text . " has capital letters. " . "<br>";
        } else print "<br>Строка " . $text . " has NOT capital letters. ";
    }
        ?>
