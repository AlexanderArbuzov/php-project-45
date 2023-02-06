<?php

declare(strict_types=1);

namespace php\project_45\engine\client;

use function cli\line;
use function cli\prompt;

function getUserName(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?', "Agent Smith");
    line("Hello, %s!", $name);

    return $name;
}
