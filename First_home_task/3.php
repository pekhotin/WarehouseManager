<?php

function fact($num) {
    if ($num < 2)
        return 1;
    else
        return fact($num - 1) * $num;
}

$testCount = trim(fgets(STDIN));

for ($i = 0; $i < $testCount; $i++) {
    $test = trim(fgets(STDIN));
    echo fact($test) . PHP_EOL;
}