<?php
if (isset($_REQUEST['input_string'])){
    $my_string=$_REQUEST['input_string'];
    $new_string=explode("\n",$my_string);
    $new=array(0);
    $k=0;
    $i=0;
    foreach ($new_string as $v) {
        $new[$i] = explode(" ", $v);
       shuffle($new[$i]);
      $new[$i]= implode(" ", $new[$i]);
      $i++;
    }
    foreach ($new as $value) {
        $array_sort[$k] = explode(" ", $value);
        $k++;
    }

    uasort($array_sort, function ($s1, $s2){
        return strcmp($s1[1],$s2[1]);
    });

    foreach ($array_sort as $value) {
        print implode(" ", $value) ."<br>";
    }

}
else include "index.html";
?>