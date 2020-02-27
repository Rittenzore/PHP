<?php
include "index.html";
$bf_code = $_REQUEST["bf_code"];
$input_field = $_REQUEST["input_field"];

$char = array(0);
$index_char = 0;
$open = 0;
$close = 0;
$j = 0;

for ($i = 0; $i < strlen($bf_code); $i++) {
    switch ($bf_code[$i]) {
        case "+":
            $char[$index_char]++;
            break;

        case "-":
            $char[$index_char]--;
            break;

        case ",":
            $char[$index_char] = ord($input_field[$j]);
            $j++;
            break;

        case ".":
            print(chr($char[$index_char]));
            break;

        case "<":
            $index_char--;
            if (!isset($char[$index_char])) {
                $char[$index_char] = 0;
            }
            break;

        case ">":
            $index_char++;
            if (!isset($char[$index_char])) {
                $char[$index_char] = 0;
            }
            break;

        case "[":
            if ($char[$index_char] == 0) {
                $open++;
                while ($open != 0) {
                    $i++;
                    if ($bf_code[$i] == "[") {
                        $open++;
                    } else if ($bf_code[$i] == "]") {
                        $open--;
                    }
                }
            }
            break;

        case "]":
            if ($char[$index_char] != 0) {
                $close++;
                if ($char[$index_char] != 0) {
                    while ($close != 0) {
                        $i--;
                        if ($bf_code[$i] == "]") {
                            $close++;
                        } else if ($bf_code[$i] == "[") {
                            $close--;
                        }
                    }
                }
            }
            break;
    }
}