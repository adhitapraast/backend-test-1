<?php

/**
 * Question 1 + Challenge
 *
 * sum_deep method
 */

function sum_deep(string $tree, string $chars): int
{
    $charArray = str_split($chars);
    $charSum = [];
    foreach ($charArray as $char) {
        $charSum[$char] = sum_deep_recursive(json_decode($tree), $char);
    }
    $totalSum = 0;
    foreach ($charSum as $char => $sum) {
        $position = strpos($chars, $char) + 1;
        $totalSum += ($sum * $position);
    }

    return $totalSum;
}

function sum_deep_recursive(array|string $node, string $char, int $level = 0): mixed
{
    $sum = 0;

    if (is_string($node) && strpos($node, $char) !== false) {
        $sum += $level; // Increment the sum by the level
    } elseif (is_array($node)) {
        foreach ($node as $childNode) {
            $sum += sum_deep_recursive($childNode, $char, $level + 1);
        }
    }

    return $sum;
}

// example test cases question 1
echo "<pre>";
echo "<h1>Question 1</h1>";

$input_a = '["AB", ["XY"], ["YP"]]';
$find_char_a = 'Y';

$input_b = '["", ["", ["XXXXX"]]]';
$find_char_b = 'X';

$input_c = '["X"]';
$find_char_c = 'X';

$input_d = '[""]';
$find_char_d = 'X';

$input_e = '["X", ["", ["", ["Y"], ["X"]]], ["X", ["", ["Y"], ["Z"]]]]';
$find_char_e = 'X';

$input_f = '["X", [""], ["X"], ["X"], ["Y", [""]], ["X"]]';
$find_char_f = 'X';

$output_a = sum_deep($input_a, $find_char_a);
$output_b = sum_deep($input_b, $find_char_b);
$output_c = sum_deep($input_c, $find_char_c);
$output_d = sum_deep($input_d, $find_char_d);
$output_e = sum_deep($input_e, $find_char_e);
$output_f = sum_deep($input_f, $find_char_f);

echo "Output a: $output_a <br>";
echo "Output b: $output_b <br>";
echo "Output c: $output_c <br>";
echo "Output d: $output_d <br>";
echo "Output e: $output_e <br>";
echo "Output f: $output_f <br>";


// example test cases question 1 challenge
echo "<pre>";
echo "<h1>Question 1 Challenge</h1>";

$tree = '["ABAH", ["CIRCA"], ["CRUMP", ["IRA"]], ["ALI"]]';
$chars = "ACI";
$output = sum_deep($tree, $chars);

echo "Output: $output <br>";