<?php

$countTrucks = trim(fgets(STDIN));

while ($countTrucks != 0) {
    $inputLine = trim(fgets(STDIN));

    $trucks = explode(' ', $inputLine);
    $mainStack = new SplStack();
    $tmpStack = new SplStack();

    $mainStack->push(0);

    for ($i = 0; $i < count($trucks); ) {
        if ($trucks[$i] == $mainStack->top() + 1) {
            $mainStack->push($trucks[$i]);
            $i++;
        } else {
            if (!$tmpStack->isEmpty() && $trucks[$i] == $tmpStack->top() + 1) {
                $mainStack->push($tmpStack->pop());
            } else {
                $tmpStack->push($trucks[$i]);
                $i++;
            }
        }
    }

    $result = true;
    while (!$tmpStack->isEmpty()) {
        $top = $tmpStack->pop();
        if ($top != $mainStack->top() + 1) {
            $result = false;
        } else {
            $mainStack->push($top);
        }
    }
    if ($result) {
        echo "yes" . PHP_EOL;
    } else {
        echo "no" . PHP_EOL;
    }

    $countTrucks = trim(fgets(STDIN));
}
