<?php

declare(strict_types=1);

namespace php\project_45\utils\isPrime;

function isPrime(int $number): bool
{
    if ($number < 2) {
        return false;
    }

    for ($i = 2; $i <= $number / 2; $i += 1) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}

