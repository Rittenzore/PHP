<?php
$fop=fopen('index.txt','rt');
$ini= parse_ini_file('index.ini',true);
$l=0;
if($fop) {
    while (!feof($fop)) {
        $text[$l] = fgets($fop);
        $l++;
    }
}
else
    print "Can't open index.txt";

function first($text, $ini){
    if($ini['first_rule']['upper']=="true") {
        $my_text = strtoupper($text);
    }

        else {
            $my_text = strtolower($text);
        }
        return $my_text;



}

function second($text, $ini){
  $new_text=" ";
  if($ini["second_rule"]["direction"]=="+") {
      for ($j = 0; $j != strlen($text); $j++) {
          if (preg_match("+^[0-9]$+", $text[$j])) {
              if ($text[$j] == 9)
                  $new_text .= 0;
              else
                  $new_text .=$text[$j] + 1;
          } else
              $new_text .=$text[$j];

      }
  }
  else{
      for ($j = 0; $j != strlen($text); $j++) {
          if (preg_match("+^[0-9]$+",$text[$j])) {
              if ($text[$j] == 0)
                  $new_text .= 9;
              else
                  $new_text .= $text[$j] - 1;
          } else
              $new_text .= $text[$j];

      }

  }
  return $new_text;


}
function third($text, $ini){
    $new_text = str_ireplace($ini['third_rule']['delete'], "", $text);
    return $new_text;

}
for ($i = 0; $i < $l; $i++) {
    if (strcasecmp(substr($text[$i], 0, strpos($text[$i], " ")), $ini['first_rule']['symbol']) == 0) {
        $text[$i] = substr($text[$i], strpos($text[$i], " "), strlen($text[$i]));
        $first = first($text[$i], $ini);
        $new_text[$i] = $first;

    } else if (strcasecmp(substr($text[$i], 0, strpos($text[$i], " ")), $ini['second_rule']['symbol']) == 0) {
        $text[$i] = substr($text[$i], strpos($text[$i], " "), strlen($text[$i]));
        $second = second($text[$i], $ini);
        $new_text[$i] = $second;

    } else if (strcasecmp(substr($text[$i], 0, strpos($text[$i], " ")), $ini['third_rule']['symbol']) == 0) {
        $text[$i] = substr($text[$i], strpos($text[$i], " "), strlen($text[$i]));
        $third = third($text[$i], $ini);
        $new_text[$i] = $third;

    } else {
        $new_text[$i] = $text[$i];
    }
}
for ($i = 0; $i < $l; $i++) {
    print $new_text[$i] . " ";
}


fclose($fop);
?>