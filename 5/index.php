<?php
if (isset($_REQUEST["pass"])) {
    $pass = $_REQUEST["pass"];
    getPass($pass);
} else include "file.html";

function getPass($pass)
{
    if (!preg_match('{^.{10,}$}', $pass)) {
        print ("Ваш пароль состоит менее, чем из 10 символов");
    }
    else if(!preg_match('{^(.*[A-Z].*){2}$}', $pass)) {
        print('Пароль должен содержать хотя бы 2 прописные буквы');
    }
    else if(!preg_match('{^(.*[a-z].*){2}$}', $pass)) {
        print('Пароль должен содержать хотя бы 2 строчные буквы');
    }
    else if(!preg_match('{^(.*[0-9].*){2}$}', $pass)) {
        print('Пароль должен содержать хотя бы 2 цифры!');
    }
    else if(!preg_match('{^(.*[%,$,#,_,*].*){2}$}', $pass)) {
        print('Пароль должен содержать хотя бы 2 уникальных символа (%$#_*)');
    }
    else if(preg_match('{^(.*[a-z].*){4,}$}', $pass)) {
        print('Пароль должен содержать не более 3 строчных букв!');
    }
    else if(preg_match('{^(.*[A-Z].*){4,}$}', $pass)) {
        print('Пароль должен содержать не более 3 прописных букв');
    }
    else if(preg_match('{^(.*[0-9].*){4,}$}', $pass)) {
        print('Пароль должен содержать не более 3 цифр');
    }
    else if(preg_match('{^(.*[%,$,#,_,*].*){4,}$}', $pass)) {
        print('Пароль должен содержать не более 3 уникальных символов');
    }
    else print "Success!";
}