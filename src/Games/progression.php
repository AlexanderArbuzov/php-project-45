<?php

declare(strict_types=1);

namespace php\project_45\Games\progression;

const PROGRESSION_LENGTH_MIN = 30;
const D_MIN = 1;
const FIRST_TERM_PROGRESSION = 0;
const MIN_NUMBER_TERMS_PROGRESSION = 5;
const MAX_NUMBER_TERMS_PROGRESSION = 10;
const FIRST_INDEX_HIDDEN_TERM_PROGRESSION = 0;

use Tightenco\Collect;

function getCorrectAnswers(int $iterations, int $beginningOfInterval = 0, int $endOfInterval = 99): array
{
    $progressions = [];

    for ($i = 0; $i < $iterations; $i += 1) {
        $progression = [];
        $progressionLength = rand(PROGRESSION_LENGTH_MIN, $endOfInterval);
        $firstTerm = rand($beginningOfInterval, $endOfInterval);
        $d = rand(D_MIN, $endOfInterval);

        for ($j = 0; $j < $progressionLength; $j += 1) {
            if (count($progression) === 0) {
                $progression[] = $firstTerm;
            } else {
                $progression[] = end($progression) + $d;
            }
        }

        $collection = collect($progression);
        $progressions[] = $collection->slice(rand(FIRST_TERM_PROGRESSION, $progressionLength - 1), rand(MIN_NUMBER_TERMS_PROGRESSION, MAX_NUMBER_TERMS_PROGRESSION))->flatten()->all();
    }

    $collection = collect($progressions);

    return $collection->map(function ($item) {
        $hiddenNumberIndex = rand(FIRST_INDEX_HIDDEN_TERM_PROGRESSION, count($item) - 1);
        $answer = $item[$hiddenNumberIndex];
        $item[$hiddenNumberIndex] = "..";
        $exercise = '';

        foreach ($item as $value) {
            $exercise = "{$exercise} {$value}";
        }

        return ['Exercise' => trim($exercise), 'Answer' => $answer];
    })->all();
}
