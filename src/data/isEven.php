<?php

declare(strict_types=1);

namespace php\project_45\data\isEven;
const ITERATIONS = 3;
const TASK = "Answer \"yes\" if the number is even, otherwise answer \"no\".";

use function Illuminate\Support\Collection;

function getCorrectAnswers(): array
{
    $randomNumbers = [];

    for ($i = 0; $i < ITERATIONS; $i += 1) {
        $randomNumbers[] = rand(0, 99);
    }

    $collection = collect($randomNumbers);

    return $collection->map(function ($item) {
        return $item % 2 == 0 ? ['Exercise' => $item, 'Answer' => 'yes'] : ['Exercise' => $item, 'Answer' => 'no'];
    })->all();
}
