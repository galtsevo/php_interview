<?php

$array = [
    ['id' => 1, 'date' => "12.01.2020", 'name' => "test1"],
    ['id' => 2, 'date' => "02.05.2020", 'name' => "test2"],
    ['id' => 4, 'date' => "08.03.2020", 'name' => "test4"],
    ['id' => 1, 'date' => "22.01.2020", 'name' => "test1"],
    ['id' => 2, 'date' => "11.11.2020", 'name' => "test4"],
    ['id' => 3, 'date' => "06.06.2020", 'name' => "test3"]
];

echo 'Исходный массив';
echo '<pre>';
print_r($array);
echo '</pre>';

echo 'Задача #1';
$temp = array_unique(array_column($array, 'id'));
$unique_arr = array_intersect_key($array, $temp);
echo '<pre>';
print_r($unique_arr);
echo '</pre>';

echo 'Задача #2';
array_multisort(array_column($array, 'id'), SORT_ASC,  $array);
echo '<pre>';
print_r($array);
echo '</pre>';

echo 'Задача #3';
$where_id = 1;
$where_id_column = array_filter($array, function ($value) use ($where_id) {
    return ($value["id"] == $where_id);
});
echo '<pre>';
print_r($where_id_column);
echo '</pre>';

echo 'Задача #4';
$id_column = array_column($array, 'id');
$name_column = array_column($array, 'name');
$combined = array_combine($name_column, $id_column);
echo '<pre>';
print_r($combined);
echo '</pre>';

echo 'Задача #5';
$sql1 ="
        SELECT 
            g.id, g.name AS cgid
        FROM
            tags t
                LEFT JOIN
            goods_tags gt ON gt.tag_id = t.id
                LEFT JOIN
            goods g ON g.id = gt.goods_id
        GROUP BY gt.goods_id
        HAVING COUNT(gt.goods_id) = (SELECT 
                COUNT(id) AS cid
            FROM
                tags)
        ";

echo '<pre>';
echo $sql1;
echo '</pre>';

echo 'Задача #6';
$sql2 ="
        SELECT 
            *
        FROM
            evaluations
        WHERE
            gender AND value > 5
        GROUP BY department_id
        ";

echo '<pre>';
echo $sql2;
echo '</pre>';