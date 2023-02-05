<?php

declare(strict_types=1);

namespace php\project_45\data\calc;

use function Illuminate\Support\Collection;

function getCorrectAnswers(int $iterations): array
{
    $randomNumbers = [];
    $operations = collect(["+", "-", "*"]);

    for ($i = 0; $i < $iterations; $i += 1) {
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