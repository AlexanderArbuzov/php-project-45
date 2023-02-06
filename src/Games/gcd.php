<?php

declare(strict_types=1);

namespace php\project_45\Games\gcd;

use Tightenco\Collect;

use function php\project_45\utils\gcd\gcd;

function getCorrectAnswers(int $iterations, int $beginningOfInterval = 0, int $endOfInterval = 99): array
{
    $randomNumbers = [];

    for ($i = 0; $i < $iterations; $i += 1) {
        $randomNumbers[] = ['FirstOperand' => rand($beginningOfInterval, $endOfInterval),
            'SecondOperand' => rand($beginningOfInterval, $endOfInterval)];
    }

    $collection = collect($randomNumbers);

    return $collection->map(function ($item) {
        return ['Exercise' => $item['FirstOperand'] . ' ' . $item['SecondOperand'],
            'Answer' => gcd($item['FirstOperand'], $item['SecondOperand'])];
    })->all();
}
