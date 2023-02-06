<?php

declare(strict_types=1);

namespace php\project_45\engine\check;

use function cli\line;
use function cli\prompt;

function isCorrectAnswers(string $task, array $correctAnswers, string $name): bool
{
    line($task);

    foreach ($correctAnswers as $item) {
        line("Question: %s", $item['Exercise']);

        $userAnswer = prompt("Your answer");

        if ((string)$item['Answer'] === $userAnswer) {
            line("Correct!");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'
Let's try again, %s!", $userAnswer, $item['Answer'], $name);
            return false;
        }
    }

    line("Congratulations, %s!", $name);

    return true;
}
