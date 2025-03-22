<?php

namespace App;

function runTest(): void
{
    echo "\n\n\n***** Начало тестирования *****\n";
    echo "-----------------------------------------------\n\n";

    testStackConstructor();

    testStackPush();

    testStackPop();

    testStackTop();

    testStackIsEmpty();

    testStackCopy();

    testCompareStrings();

    echo "\nВсе тесты выполнены успешно!\n";
}

function testStackConstructor(): void
{
    echo "\033[33mПроверка конструктора Stack и метода toString...\033[0m\n";

    $stack1 = new Stack();
    echo "Создан пустой стек: " . $stack1 . "\n";
    if ($stack1->__toString() !== '[]') {
        echo "\033[31mОшибка: Пустой стек должен отображаться как []\033[0m\n";
    }

    $stack2 = new Stack(1, 2, 3, 4, 5);
    echo "Создан стек с элементами: " . $stack2 . "\n";
    if ($stack2->__toString() !== '[1->2->3->4->5]') {
        echo "\033[31mОшибка: Ожидалось представление стека: [1->2->3->4->5]\033[0m\n";
    }

    echo "\033[32m===== Тест пройден =====\033[0m\n\n";
}

function testStackPush(): void
{
    echo "\033[33mПроверка метода push стека...\033[0m\n";

    $stack = new Stack();
    $stack->push(1);
    echo "После вызова push(1): " . $stack . "\n";
    if ($stack->__toString() !== '[1]') {
        echo "\033[31mОшибка: Стек должен содержать один элемент\n\033[0m";
    }

    $stack->push(2, 3, 4);
    echo "После вызова push(2, 3, 4): " . $stack . "\n";
    if ($stack->__toString() !== '[4->3->2->1]') {
        echo "\033[31mОшибка: Элементы должны добавляться в начало стека\n\033[0m";
    }

    echo "\033[32m===== Тест пройден =====\033[0m\n\n";
}

function testStackPop(): void
{
    echo "\033[33mПроверка метода pop стека...\033[0m\n";

    $stack = new Stack(1, 2, 3);
    echo "Исходный стек: " . $stack . "\n";

    $popped = $stack->pop();
    echo "Извлечённое значение: " . $popped . "\n";
    echo "Стек после извлечения: " . $stack . "\n";
    if ($popped !== 1) {
        echo "\033[31mОшибка: Ожидалось значение 1 при извлечении\n\033[0m";
    }
    if ($stack->__toString() !== '[2->3]') {
        echo "\033[31mОшибка: Стек должен содержать оставшиеся элементы\n\033[0m";
    }

    $stack->pop();
    $stack->pop();
    $emptyPop = $stack->pop();
    echo "Результат извлечения из пустого стека: " . var_export($emptyPop, true) . "\n";
    if ($emptyPop !== null) {
        echo "\033[31mОшибка: При извлечении из пустого стека должно возвращаться null\n\033[0m";
    }

    echo "\033[32m===== Тест пройден =====\033[0m\n\n";
}

function testStackTop(): void
{
    echo "\033[33mПроверка метода top стека...\033[0m\n";

    $stack = new Stack(1, 2, 3);
    echo "Исходный стек: " . $stack . "\n";

    $top = $stack->top();
    echo "Верхний элемент стека: " . $top . "\n";
    echo "Стек после вызова top: " . $stack . "\n";
    if ($top !== 1) {
        echo "\033[31mОшибка: Ожидался верхний элемент 1\n\033[0m";
    }
    if ($stack->__toString() !== '[1->2->3]') {
        echo "\033[31mОшибка: Стек не должен изменяться после top\n\033[0m";
    }

    $stack = new Stack();
    $emptyTop = $stack->top();
    echo "Результат top для пустого стека: " . var_export($emptyTop, true) . "\n";
    if ($emptyTop !== null) {
        echo "\033[31mОшибка: Для пустого стека top должен возвращать null\n\033[0m";
    }

    echo "\033[32m===== Тест пройден =====\033[0m\n\n";
}

function testStackIsEmpty(): void
{
    echo "\033[33mПроверка метода isEmpty стека...\033[0m\n";

    $emptyStack = new Stack();
    echo "Проверка пустого стека: " . var_export($emptyStack->isEmpty(), true) . "\n";
    if ($emptyStack->isEmpty() !== true) {
        echo "\033[31mОшибка: isEmpty для пустого стека должен возвращать true\n\033[0m";
    }

    $nonEmptyStack = new Stack(1, 2, 3);
    echo "Проверка непустого стека: " . var_export($nonEmptyStack->isEmpty(), true) . "\n";
    if ($nonEmptyStack->isEmpty() !== false) {
        echo "\033[31mОшибка: isEmpty для непустого стека должен возвращать false\n\033[0m";
    }

    echo "\033[32m===== Тест пройден =====\033[0m\n\n";
}

function testStackCopy(): void
{
    echo "\033[33mПроверка метода copy стека...\033[0m\n";

    $original = new Stack(1, 2, 3);
    echo "Оригинальный стек: " . $original . "\n";

    $copy = $original->copy();
    echo "Копия оригинального стека: " . $copy . "\n";
    if ($copy->__toString() !== $original->__toString()) {
        echo "\033[31mОшибка: Копия должна содержать те же элементы, что и оригинал\n\033[0m";
    }

    $original->pop();
    echo "Оригинальный стек после удаления элемента: " . $original . "\n";
    echo "Копия стека после изменения оригинала: " . $copy . "\n";
    if ($copy->__toString() !== '[1->2->3]') {
        echo "\033[31mОшибка: Копия не должна изменяться при изменении оригинала\n\033[0m";
    }

    echo "\033[32m===== Тест пройден =====\033[0m\n\n";
}

function testCompareStrings(): void
{
    echo "\033[33mПроверка функции compareStrings...\033[0m\n";

    $result1 = compareStrings("ab", "ab");
    echo "compareStrings(\"ab\", \"ab\") = " . var_export($result1, true) . "\n";
    if ($result1 !== true) {
        echo "\033[31mОшибка: Строки \"ab\" должны совпадать\n\033[0m";
    }

    $result2 = compareStrings("a", "a");
    echo "compareStrings(\"a\", \"a\") = " . var_export($result2, true) . "\n";
    if ($result2 !== true) {
        echo "\033[31mОшибка: Строки \"a\" должны совпадать\n\033[0m";
    }

    $result3 = compareStrings("abc##", "ab#c#");
    echo "compareStrings(\"abc##\", \"ab#c#\") = " . var_export($result3, true) . "\n";
    if ($result3 !== true) {
        echo "\033[31mОшибка: Результат сравнения должен быть true\n\033[0m";
    }

    $result4 = compareStrings("a", "a");
    echo "compareStrings(\"a\", \"a\") = " . var_export($result4, true) . "\n";
    if ($result4 !== true) {
        echo "\033[31mОшибка: Строки \"a\" должны совпадать\n\033[0m";
    }

    $result5 = compareStrings("a#b", "b#");
    echo "compareStrings(\"a#b\", \"b#\") = " . var_export($result5, true) . "\n";
    if ($result5 !== false) {
        echo "\033[31mОшибка: Строки \"a#b\" и \"b#\" не должны совпадать\n\033[0m";
    }

    $result6 = compareStrings("a#", "a##");
    echo "compareStrings(\"a#\", \"a##\") = " . var_export($result6, true) . "\n";
    if ($result6 !== true) {
        echo "\033[31mОшибка: Результат сравнения должен быть true\n\033[0m";
    }

    echo "\033[32m===== Тест пройден =====\033[0m\n\n";
}
