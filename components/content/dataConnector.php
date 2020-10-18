<?php
require_once "./components/universal/paginator.php"; // Пагинатор для отображения номеров-ссылок страниц
require_once "./components/content/articles/ArticlesRenderer.php"; // Рисовальщик для статей
require_once "./components/content/people/PeopleRenderer.php"; // Рисовальщик для людей

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

// Возвращает массив, состоящий из id первого и последнего элементов текущей страницы
/*
    Вывод всех элементов из таблицы БД производится с конца, поэтому на первой странице должны быть отображены
    самые последние элементы таблицы.
    Если $allItemsCount = 10, $itemsCount = 5, page = 2, то $lastItemId = 10 - 5 * (2 - 1) = 5
    Если $lastItemId = 5, $itemsCount = 5, то $firstItemId = 5 - 5 + 1 = 1
*/
function getFirstAndLastItemsId($allItemsCount, $itemsCount, $currentPage) {
    $lastItemId = $allItemsCount - $itemsCount * ($currentPage - 1); // ID последнего выводимого элемента на странице
    $firstItemId = $lastItemId - $itemsCount + 1; // ID первого выводимого элемента на странице
    if($firstItemId < 1) { // Проверка на случай, если на последней странице число элементов будет < $itemsCount
        $firstItemId = 1;
    }

    return array("first" => $firstItemId, "last" => $lastItemId);
}

// Возвращает записи из БД (Использование ORDER BY table.ID DESC переворачивает результат выборки с целью
// отображения самых актуальных данных сверху)
function getItems($conn, $table, $itemsId) {
    $firstItemId = $itemsId["first"];
    $lastItemId = $itemsId["last"];
    $query_getItems = 'SELECT * FROM '.$table.' WHERE '.$table.'.ID >= '.$firstItemId.' AND 
    '.$table.'.ID <='.$lastItemId.' ORDER BY '.$table.'.ID DESC';
    return $items = mysqli_query($conn, $query_getItems);
}

// Отрисовка данных
function renderData($conn, $itemsCount, $tableType, $table, $currentPage) {
    $allItemsCount = getAllItemsCount($conn, $table); // Число всех элементов
    $pagesCount = getPagesCount($allItemsCount, $itemsCount); // Количество всех страниц
    $itemsId = getFirstAndLastItemsId($allItemsCount, $itemsCount, $currentPage); // ID первого и второго элементов
    $items = getItems($conn, $table, $itemsId); // Получение элементов
    switch ($tableType) {
        case "articles": // Если рисуем статьи
            $renderer = new ArticlesRenderer(); // Создаем экземпляр рисовальщика статей
            break;
        case "people": // Если рисуем людей
            $renderer = new PeopleRenderer(); // Создаем экземпляр рисовальщика людей
            break;
        // Можем добавить ещё тип таблицы при условии если добавим соответствующий renderer
        default:
            $renderer = new ArticlesRenderer();
    }
    $renderer->render($items, $table, $currentPage, $pagesCount); // Рисуем элементы
    // Рисуем Paginator
    Paginator($currentPage, $pagesCount, "index.php?section=$tableType&type=$table", 10);
}