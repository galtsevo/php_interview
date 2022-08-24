## Исходный массив
```php
$array = [
    ['id' => 1, 'date' => "12.01.2020", 'name' => "test1"],
    ['id' => 2, 'date' => "02.05.2020", 'name' => "test2"],
    ['id' => 4, 'date' => "08.03.2020", 'name' => "test4"],
    ['id' => 1, 'date' => "22.01.2020", 'name' => "test1"],
    ['id' => 2, 'date' => "11.11.2020", 'name' => "test4"],
    ['id' => 3, 'date' => "06.06.2020", 'name' => "test3"]
];
```

## Задание #1
```php
$temp = array_unique(array_column($array, 'id'));
$unique_arr = array_intersect_key($array, $temp);
```

## Задание #2
```php
array_multisort(array_column($array, 'id'), SORT_ASC,  $array);
```

## Задание #3
```php
$where_id = 1;
$where_id_column = array_filter($array, function ($value) use ($where_id) {
    return ($value["id"] == $where_id);
});
```

## Задание #4
```php
$id_column = array_column($array, 'id');
$name_column = array_column($array, 'name');
$combined = array_combine($name_column, $id_column);
```

## Задание #5
```mysql
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
```

## Задание #6
```mysql
        SELECT 
            *
        FROM
            evaluations
        WHERE
            gender AND value > 5
        GROUP BY department_id
```
