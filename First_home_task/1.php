<?php

$countTrucks = trim(fgets(STDIN));

while ($countTrucks != 0) {
    $inputLine = trim(fgets(STDIN));

    $trucks = explode(' ', $inputLine);
    $min = 0;
    $stack = new SplStack();

    for ($i = 0; $i < count($trucks); ) {
        if ($trucks[$i] == $min + 1) {
            $min = $trucks[$i];
            $i++;
        } else {
            if (!$stack->isEmpty() && $trucks[$i] == $stack->top() + 1) {
                $min = $stack->pop();
            } else {
                $stack->push($trucks[$i]);
                $i++;
            }
        }
    }

    $result = true;
    while (!$stack->isEmpty()) {
        $top = $stack->pop();
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
