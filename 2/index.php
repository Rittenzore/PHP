<?php

getValue();

function getValue()
{
    $output = "";
    $input = $_REQUEST["input"];
    include "2.html";

    foreach ($varToReturnCounter = Generator($input) as $char) {
        $output .= $char;
    }

    $newLine = "<br>";
    print "h = 4 // l = 1 // e = 3 // o = 0" . $newLine;
    print "_____________________________________________" . $newLine;
    print "Вы ввели " . "\"" . $input . "\"" . " и получили строку " . "\"" . $output . "\"" . $newLine;
    print "Количество символов, которые вы заменили равно " . $varToReturnCounter->getReturn();
}

function Generator($input = "")
{
    $counter = 0;
    for ($i = 0; $i < strlen($input); $i++) {

        switch ($input[$i]) {

            case "h" :
                $input[$i] = 4;
                yield $input[$i];
                $counter++;
                break;

            case "l" :
                $input[$i] = 1;
                yield $input[$i];
                $counter++;
                break;

            case "e" :
                $input[$i] = 3;
                yield $input[$i];
                $counter++;
                break;

            case "o" :
                $input[$i] = 0;
                yield $input[$i];
                $counter++;
                break;

            default :
                yield $input[$i];
        }
    }
    return $counter;
}