<?php

declare(strict_types=1);

namespace php\project_45\data\calc;
const ITERATIONS = 3;
const TASK = "What is the result of the expression?";

use function Illuminate\Support\Collection;

function getCorrectAnswers(): array
{
    $randomNumbers = [];
    $operations = collect(["+", "-", "*"]);


    for ($i = 0; $i < ITERATIONS; $i += 1) {
        $randomNumbers[] = ['FirstOperand' => rand(0, 99), 'SecondOperand' => rand(0, 99)];
    }

    $collection = collect($randomNumbers);

    return $collection->map(function ($item) use($operations) {
        switch ($operations->random()) {
            case '+':
                return ['Exercise' => $item['FirstOperand'] . ' + ' . $item['SecondOperand'], 'Answer' => $item['FirstOperand'] + $item['SecondOperand']];
            case '-':
                return ['Exercise' => $item['FirstOperand'] . ' - ' . $item['SecondOperand'], 'Answer' => $item['FirstOperand'] - $item['SecondOperand']];
            case '*':
                return ['Exercise' => $item['FirstOperand'] . ' * ' . $item['SecondOperand'], 'Answer' => $item['FirstOperand'] * $item['SecondOperand']];
        }
    })->all();
}