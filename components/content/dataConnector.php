<?php
require "dbConnector.php";
require "./components/universal/paginator.php";
require "./components/content/articles/article.php";
require "./components/content/people/human.php";

function renderData($itemsCount, $table, $currentPage) {
    $conn = connectToDb();
    // Получение количества всех элементов и генерация количества страниц
    $query_getAllItemsCount = 'SELECT COUNT(*) FROM '.$table;
    $getAllItemsCount = mysqli_query($conn, $query_getAllItemsCount);
    $allItemsCount = mysqli_fetch_array($getAllItemsCount)[0]; // Число всех элементов в БД
    $pagesCount = ceil($allItemsCount / $itemsCount); // Число всех страниц

    /*
    Вывод всех элементов из таблицы БД производится с конца, поэтому на первой странице должны быть отображены
    самые последние элементы таблицы.
    Если $allItemsCount = 10, $itemsCount = 5, page = 2, то $lastItemId = 10 - 5 * (2 - 1) = 5
    Если $lastItemId = 5, $itemsCount = 5, то $firstItemId = 5 - 5 + 1 = 1
    */
    $lastItemId = $allItemsCount - $itemsCount * ($currentPage - 1); // ID последнего выводимого элемента на странице
    $firstItemId = $lastItemId - $itemsCount + 1; // ID первого выводимого элемента на странице
    if($firstItemId < 1) { // Проверка на случай, если на последней странице число элементов будет < $itemsCount
        $firstItemId = 1;
    }

    // Получение записей из БД (Использование ORDER BY table.ID DESC переворачивает результат выборки с целью
    // отображения самых актуальных данных сверху)
    $query_getItems = 'SELECT * FROM '.$table.' WHERE '.$table.'.ID >= '.$firstItemId.' AND 
    '.$table.'.ID <='.$lastItemId.' ORDER BY '.$table.'.ID DESC';
    $items = mysqli_query($conn, $query_getItems);

    if($table == "excursion" || $table == "stand") {
        while ($item = mysqli_fetch_array($items)) {
            Article($item['Name'], $item['Description'], 'assets/i/'.$table.'/' . $item['Picture'], $item['Date']);
        }
        Paginator($currentPage, $pagesCount, "index.php?section="."articles&type=".$table);
    }
    elseif ($table == "visitor" || $table == "assistant") {
        $itemsRowCount = 0;
        echo '<div class="row">';
        while ($item = mysqli_fetch_array($items)) {
            if($itemsRowCount % 3 == 0 && $itemsRowCount != 0) { // Если число элементов делится нацело на 3, то закрываем строку и открываем новую
                echo '
                </div>
                <div class="row">
                ';
            }
            Human($item['Name'], $item['Description'], 'assets/i/'.$table.'/' . $item['Picture']);
            $itemsRowCount++;
        }
            echo '</div>'; // Закрываем строку
        Paginator($currentPage, $pagesCount, "index.php?section="."people&type=".$table);
    }

}