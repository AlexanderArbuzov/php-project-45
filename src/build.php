<?php

declare(strict_types=1);

namespace php\project_45\build;

use php\project_45\data\isEven;
use php\project_45\data\calc;
use function php\project_45\engine\check\isCorrectAnswers;
use function php\project_45\engine\client\getUserName;

function gameSelect(string $game): void
{
    switch ($game) {
        case 'isEven':
            isCorrectAnswers(isEven\TASK, isEven\getCorrectAnswers(), getUserName());
            break;
        case 'calc':
            isCorrectAnswers(calc\TASK, calc\getCorrectAnswers(), getUserName());
            break;
    }
}
