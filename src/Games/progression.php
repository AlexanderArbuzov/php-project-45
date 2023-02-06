<?php

declare(strict_types=1);

namespace php\project_45\Games\progression;

use Tightenco\Collect;

function getCorrectAnswers(int $iterations, int $beginningOfInterval = 0, int $endOfInterval = 99): array
{
    $progressions = [];

    for ($i = 0; $i < $iterations; $i += 1) {
        $progression = [];
        $progressionLength = rand(10, $endOfInterval);
        $firstTerm = rand($beginningOfInterval, $endOfInterval);
        $d = rand(1, $endOfInterval);

        for ($j = 0; $j < $progressionLength; $j += 1) {
            if (count($progression) === 0) {
                $progression[] = $firstTerm;
            } else {
                $progression[] = end($progression) + $d;
            }
        }

        $collection = collect($progression);
        $progressions[] = $collection->slice(rand(0, $progressionLength - 1), rand(5, 10))->flatten()->all();
    }

    $collection = collect($progressions);

    return $collection->map(function ($item) {
        $hiddenNumberIndex = rand(0, count($item) - 1);
        $answer = $item[$hiddenNumberIndex];
        $item[$hiddenNumberIndex] = "..";
        $exercise = '';

        foreach ($item as $value) {
            $exercise = "{$exercise} {$value}";
        }

        return ['Exercise' => trim($exercise), 'Answer' => $answer];
    })->all();
}
