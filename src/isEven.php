<?php

declare(strict_types=1);

namespace php\project_45\isEven;

use function cli\line;
use function cli\prompt;
use function Illuminate\Support\Collection;

function getCorrectAnswers(): array
{
    $randomNumbers = [];
    $iterations = 3;

    for ($i = 0; $i < $iterations; $i += 1) {
        $randomNumbers[] = rand(0, 99);
    }

    $collection = collect($randomNumbers);

    return $collection->map(function ($item) {
        return $item % 2 == 0 ? ['Number' => $item, 'Answer' => 'yes'] : ['Number' => $item, 'Answer' => 'no'];
    })->all();
}

function isCorrect(array $correctAnswers, string $name): bool
{
    line("Answer \"yes\" if the number is even, otherwise answer \"no\".");

    foreach ($correctAnswers as $key => $item) {
        line("Question: %s", $item['Number']);

        $userAnswer = prompt("Your answer");

        if ($item['Answer'] === $userAnswer) {
            line("Correct!");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'\nLet's try again, %s!", $userAnswer, $item['Answer'], $name);
            return false;
        }
    }

    line("Congratulations, %s!", $name);

    return true;
}
