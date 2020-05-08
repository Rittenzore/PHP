<?php
header('Content-type: text/html; charset=cp-1251');

if (isset($_POST["address"])) {
    $address = $_POST["address"];
    if (isset($_POST["ping"])) {
        ping($address);
    }
    if (isset($_POST["tracert"])) {
        tracert($address);
    }
    if (!isset($_POST["ping"]) && !isset($_POST["tracert"])) print "Chose ping or(and) tracert";
} else {
    include "5.html";
}

function ping($address)
{
    $result = shell_exec("ping " . $address);
    $result_ip = "";
    $result_requests = "";
    for ($i = strpos($result, "[") + 1; $i <= strpos($result, "]") - 1; $i++) {
        $result_ip .= $result[$i];
    }
    for ($i = strpos($result, "(") + 1; $i <= strpos($result, "%") - 1; $i++) {
        $result_requests .= $result[$i];
    }
    print "<b> IP: " . $result_ip . "</b><br>";
    print "<b>Successful requests = " . (100 - (int)$result_requests) . "%</b>";
}

function tracert($address) {
    $result = shell_exec("tracert " . $address);
    preg_match_all("/[0-9]{1,3}[\.][0-9]{1,3}[\.][0-9]{1,3}[\.][0-9]{1,3}/", $result, $text);
    print "Tracert IP: <br>";
    foreach ($text as $value) {
        foreach ($value as $item) {
            print "<b>" . $item . "<b><br>";
        }
    }
}

?>