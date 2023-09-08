<?php

/**
 * Question 3
 *
 * pattern_count method
 */

function pattern_count(string $text, string $pattern) : int
{
    $textLength = strlen($text);
    $patternLength = strlen($pattern);
    $count = 0;

    if ($patternLength === 0) {
        return 0;
    }

    for ($i = 0; $i <= $textLength - $patternLength; $i++) {
        if (substr($text, $i, $patternLength) === $pattern) { // case sensitive
            $count++;
        }
    }

    return $count;
}

// example test cases
echo "<pre>";
echo "<h1>Question 3</h1>";

$text1 = "palindrom";
$pattern1 = "ind";
$output1 = pattern_count($text1, $pattern1);
echo "Output 1: {$output1} <br>"; // Output: 1

$text2 = "abakadabra";
$pattern2 = "ab";
$output2 = pattern_count($text2, $pattern2);
echo "Output 2: {$output2} <br>"; // Output: 2

$text3 = "hello";
$pattern3 = "";
$output3 = pattern_count($text3, $pattern3);
echo "Output 3: {$output3} <br>"; // Output: 0

$text4 = "ababab";
$pattern4 = "aba";
$output4 = pattern_count($text4, $pattern4);
echo "Output 4: {$output4} <br>"; // Output: 2

$text5 = "aaaaaa";
$pattern5 = "aa";
$output5 = pattern_count($text5, $pattern5);
echo "Output 5: {$output5} <br>"; // Output: 5

$text6 = "hell";
$pattern6 = "hello";
$output6 = pattern_count($text6, $pattern6);
echo "Output 6: {$output6} <br>"; // Output: 0
?>