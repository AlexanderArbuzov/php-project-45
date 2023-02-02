<?php

declare(strict_types=1);

namespace php\project_45\Cli;

use function cli\line;
use function cli\prompt;

function helloMsg(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?', "Agent Smith");
    line("Hello, %s!", $name);

    return $name;
}
