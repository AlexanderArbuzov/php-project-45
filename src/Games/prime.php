<?php

declare(strict_types=1);

namespace php\project_45\Games\prime;

use Tightenco\Collect;

use function php\project_45\utils\isPrime\isPrime;

function getCorrectAnswers(int $iterations, int $beginningOfInterval = 0, int $endOfInterval = 99): array
{
    $randomNumbers = [];

    for ($i = 0; $i < $iterations; $i += 1) {
        $randomNumbers[] = rand($beginningOfInterval, $endOfInterval);
    }

    $collection = collect($randomNumbers);

    return $collection->map(function ($item) {
        return isPrime($item) ? ['Exercise' => $item, 'Answer' => 'yes'] : ['Exercise' => $item, 'Answer' => 'no'];
    })->all();
}
