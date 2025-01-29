<?php

function number_of_sisters($count_sister, $count_brother){
    if($count_sister >= 0 && $count_brother >= 0){
        return ++ $count_sister;
    }
    else {
        echo "сестер или братьев не может быть меньше нуля";
        return false;
    }
}

$n = 5;
$m = 20;
if (number_of_sisters($n, $m)) {
    echo "У Алисы есть $n сестер и $m братьев.\nУ произвольного брата " . number_of_sisters($n, $m) . " сестер";
}