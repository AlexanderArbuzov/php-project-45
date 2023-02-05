<?php

declare(strict_types=1);

namespace php\project_45\data\tasks;

use function cli\line;

function getTask(string $game): string
{
    return match ($game) {
        'isEven' => "Answer \"yes\" if the number is even, otherwise answer \"no\".",
        'calc' => "What is the result of the expression?",
        'gcd' => "Find the greatest common divisor of given numbers.",
        'progression' => "",
        default => line("Game id %s does not exist.", $game),
    };
}