<?php
require_once "./components/universal/paginator.php"; // Пагинатор для отображения номеров-ссылок страниц

// Возвращает количество всех элементов в таблице
function getAllItemsCount($conn, $table) {
    $query_getAllItemsCount = 'SELECT COUNT(*) FROM '.$table;
    $getAllItemsCount = mysqli_query($conn, $query_getAllItemsCount);
    return mysqli_fetch_array($getAllItemsCount)[0]; // Число всех элементов в БД
}

//  Возвращает число всех страниц при данном количестве всех элементов и количестве выводимых элементов на страницу
function getPagesCount($allItemsCount, $itemsCount) {
    return ceil($allItemsCount / $itemsCount); // Число всех страниц
}

// Возвращает массив, состоящий из порядкового номера первого и последнего элементов на странице
// Пример: если количество элементов = 20, то вывести элементы от 20-5 до 20 на 1 странице
// Пример: если количество элементов = 20, то вывести элементы от 20-10 до 20-5 на 2 странице
function getItemsIndexes($allItemsCount, $itemsCount, $currentPage) {
    $first = $allItemsCount - $itemsCount * $currentPage;
    $last = $allItemsCount - $itemsCount * ($currentPage - 1);

    return array("first" => $first, "last" => $last);
}

// Возвращает записи из БД (Использование ORDER BY table.ID DESC переворачивает результат выборки с целью
// отображения самых актуальных данных сверху)
function getItems($conn, $table, $itemsIndexes) {
    $first = $itemsIndexes["first"];
    $last = $itemsIndexes["last"];
    if($first < 0) $first = 0;
    $query_getItems = "SELECT * FROM `$table` LIMIT $first, $last";
    return $items = mysqli_query($conn, $query_getItems);
}

// Отрисовка данных
function renderData($conn, $itemsCount, $renderer, $table, $currentPage) {
    $allItemsCount = getAllItemsCount($conn, $table); // Число всех элементов
    $pagesCount = getPagesCount($allItemsCount, $itemsCount); // Количество всех страниц
    $itemsIndexes = getItemsIndexes($allItemsCount, $itemsCount, $currentPage); // ID первого и второго элементов
    $items = getItems($conn, $table, $itemsIndexes); // Получение элементов
    $renderer->render($items, $table); // Рисуем элементы
    $tableType = $renderer->getTableType();
    // Рисуем Paginator
    Paginator($currentPage, $pagesCount, "index.php?section=$tableType&type=$table", 10);
}