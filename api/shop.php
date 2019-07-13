<?php

$number = 0;
if (!empty($_GET['number']) && is_numeric($_GET['number'])) {
    $number = $_GET['number'];
}

$index  = 1;
$result = array();
while ($index <= $number) {
    $result[] = fillBox($index);

    $index++;
}
echo json_encode($result);

// 往盒子里面装巧克力
function fillBox($index)
{
    // 最少12块 最轻8oz.
    $number = 1;
    $weight = 0;
    while ($number < 12 || $weight < 8) {
        $weight += rand(55, 75) / 100;

        $number++;
    }

    // 如果最终十三块 就加一块
    if ($number == 13) {
        $weight += rand(55, 75) / 100;
        $number++;
    }

    $box = $index;
    if ($index <= 9) {
        $box = "0" . $index;
    }

    return sprintf("Box %s: Total weight is %soz. and The pieces is %s", $box, $weight, $number);
}