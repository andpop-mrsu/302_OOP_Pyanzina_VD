<?php

namespace App;

function compareStrings(string $str1, string $str2): bool
{
    $process = function ($str) {
        $stack = new Stack();

        for ($i = 0; $i < strlen($str); $i++) {
            if ($str[$i] === '#') {
                $stack->pop();
            } else {
                $stack->push($str[$i]);
            }
        }

        return $stack->__toString();
    };

    return $process($str1) === $process($str2);
}
function checkIfBalanced(string $str): bool
{
    $stack = new Stack();
    $pairs = [
        ')' => '(',
        '}' => '{',
        ']' => '['
    ];

    for ($i = 0; $i < strlen($str); $i++) {
        $char = $str[$i];
        if (in_array($char, $pairs)) {
            $stack->push($char);
        } elseif (array_key_exists($char, $pairs)) {
            if ($stack->isEmpty()) {
                return false;
            }

            $top = $stack->pop();

            if ($top !== $pairs[$char]) {
                return false;
            }
        }
    }
    return $stack->isEmpty();
}