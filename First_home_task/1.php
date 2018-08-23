<?php

$countTrucks = trim(fgets(STDIN));

while ($countTrucks != 0) {
    $inputLine = trim(fgets(STDIN));

    $trucks = explode(' ', $inputLine);
    $min = 0;
    $tmpStack = new SplStack();

    for ($i = 0; $i < count($trucks); ) {
        if ($trucks[$i] == $min + 1) {
            $min = $trucks[$i];
            $i++;
        } else {
            if (!$tmpStack->isEmpty() && $trucks[$i] == $tmpStack->top() + 1) {
                $min = $tmpStack->pop();
            } else {
                $tmpStack->push($trucks[$i]);
                $i++;
            }
        }
    }

    $result = true;
    while (!$tmpStack->isEmpty()) {
        $top = $tmpStack->pop();
        if ($top != $min + 1) {
            $result = false;
        } else {
            $min = $top;
        }
    }
    if ($result) {
        echo "yes" . PHP_EOL;
    } else {
        echo "no" . PHP_EOL;
    }

    $countTrucks = trim(fgets(STDIN));
}
