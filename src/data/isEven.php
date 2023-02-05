<?php

declare(strict_types=1);

namespace php\project_45\data\isEven;

use function Illuminate\Support\Collection;

function getCorrectAnswers(int $iterations): array
{
    $randomNumbers = [];

    for ($i = 0; $i < $iterations; $i += 1) {
        $randomNumbers[] = rand(0, 99);
    }

    $collection = collect($randomNumbers);

    return $collection->map(function ($item) {
        return $item % 2 == 0 ? ['Exercise' => $item, 'Answer' => 'yes'] : ['Exercise' => $item, 'Answer' => 'no'];
    })->all();
}
