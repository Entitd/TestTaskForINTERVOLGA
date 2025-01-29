<?php

$data = [
    ['Иванов', 'Математика', 5],
    ['Иванов', 'Математика', 4],
    ['Иванов', 'Математика', 5],
    ['Петров', 'Математика', 5],
    ['Сидоров', 'Физика', 4],
    ['Иванов', 'Физика', 4],
    ['Петров', 'ОБЖ', 4],
];

function output_of_ratings($array)
{
    $out_array = [];
    $name_course = array_unique(array_column($array, 1)); # у второй колонки(с предметами) берутся уникальные значения
    $surname = array_unique(array_column($array, 0)); # у первой колонки(с фамилиями) берутся уникальные значения

    sort($name_course); # сортировка
    sort($surname); # сотировка

    for ($i = 0; $i < count($array); $i++) { #
        if (!isset($out_array[$array[$i][0]][$array[$i][1]])) {
            $out_array[$array[$i][0]][$array[$i][1]] = 0;
        }
        $out_array[$array[$i][0]][$array[$i][1]] += $array[$i][2];
    }
    ?>
    <table class="table table-bordered w-50 text">
        <tr>
            <td> </td>
            <?php foreach($name_course as $name): ?> <!--первой строкой выводятся названия предметов-->
                <td><?=$name?></td>
            <?php endforeach?>
        </tr><tr>
            <?php  foreach($surname as $last_name): ?> <!--первым столбцом выводится фамилия ученика-->
            <td><?=$last_name?></td>
            <?php foreach ($name_course as $course): # далее выводятся оценки, в соответствии с фамилией и предметом
                if(isset($out_array[$last_name][$course])){?> <!--если есть оценка, то она выводится-->
                    <td><?=$out_array[$last_name][$course]?></td>
                <?php }
                else {?>
                    <td> </td> <!--если нет оценки, то выводится пустота-->
                <?php }?>
            <?php endforeach?>
        <tr></tr>
        <?php endforeach?>
        </tr>
    </table>
    <?php
}?>