<?php

declare(strict_types=1);

namespace php\project_45\utils\gcd;

function gcd(int $firstNumber, int $secondNumber): int
{
    if ($secondNumber == 0) {
        return $firstNumber;
    }
    return gcd($secondNumber, $firstNumber % $secondNumber);
}
