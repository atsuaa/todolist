<?php
//ページ数は$n

//10県ずつ表示で、オフセットする件数
$offset= ($n-1)* $max;
//部分的SQL文
$pagenation= " LIMIT {$max} OFFSET {$offset}";
