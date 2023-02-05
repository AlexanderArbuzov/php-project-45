<?php

declare(strict_types=1);

namespace php\project_45\build;

const ITERATIONS = 3;

use php\project_45\data\isEven;
use php\project_45\data\calc;
use php\project_45\data\gcd;
use php\project_45\data\progression;
use php\project_45\data\prime;
use function php\project_45\data\tasks\getTask;
use function php\project_45\engine\check\isCorrectAnswers;
use function php\project_45\engine\client\getUserName;

function gameSelect(string $game): void
{
    switch ($game) {
        case 'isEven':
            isCorrectAnswers(getTask($game), isEven\getCorrectAnswers(ITERATIONS), getUserName());
            break;
        case 'calc':
            isCorrectAnswers(getTask($game), calc\getCorrectAnswers(ITERATIONS), getUserName());
            break;
        case 'gcd':
            isCorrectAnswers(getTask($game), gcd\getCorrectAnswers(ITERATIONS), getUserName());
            break;
        case 'progression':
            isCorrectAnswers(getTask($game), progression\getCorrectAnswers(ITERATIONS), getUserName());
            break;
        case 'prime':
            isCorrectAnswers(getTask($game), prime\getCorrectAnswers(ITERATIONS), getUserName());
            break;
    }
}
