<?php

$testCount = trim(fgets(STDIN));

$queue = new SplQueue();

for ($i = 0; $i < $testCount; $i++) {
    $cmd = trim(fgets(STDIN));
    switch ($cmd) {
        case 2:
            if (!$queue->isEmpty()) {
                $queue->dequeue();
            }
            break;
        case 3:
            if (!$queue->isEmpty()) {
                echo $queue->bottom() . PHP_EOL;
            } else {
                echo "Empty!" . PHP_EOL;
            }
            break;
        default:
            $array = explode(' ', $cmd);
            if (count($array) == 2) {
                $queue->enqueue($array[1]);
            } else {
                echo "Неверный ввод" . PHP_EOL;
            }
            break;
    }
}

