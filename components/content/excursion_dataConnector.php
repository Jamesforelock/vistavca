<?php
require "dbConnector.php";
$itemsCount = 5; // Количество выводимых на одну страницу элементов
// Получение количества всех элементов и генерация количества страниц
$query_getAllItemsCount = 'SELECT COUNT(*) FROM article WHERE article.type = "Excursion"';
$getAllItemsCount = mysqli_query($conn, $query_getAllItemsCount);
$allItemsCount = mysqli_fetch_array($getAllItemsCount)[0]; // Число всех элементов в БД
$pagesCount = ceil($allItemsCount / $itemsCount); // Число всех страниц
if(isset($_GET['page'])) { // Проверяем, задан ли параметр page
    $page = $_GET['page'];
}
else { // Если page не задан, то отрисуется первая страница
    $page = 1;
}

/*
Вывод всех элементов из таблицы БД производится с конца, поэтому на первой странице должны быть отображены
самые последние элементы таблицы.
Если $allItemsCount = 10, $itemsCount = 5, page = 2, то $lastItemId = 10 - 5 * (2 - 1) = 5
Если $lastItemId = 5, $itemsCount = 5, то $firstItemId = 5 - 5 + 1 = 1
*/
$lastItemId = $allItemsCount - $itemsCount * ($page - 1); // ID последнего выводимого элемента на странице
$firstItemId = $lastItemId - $itemsCount + 1; // ID первого выводимого элемента на странице

if($firstItemId < 1) { // Проверка на случай, если на последней странице число элементов будет < $itemsCount
    $firstItemId = 1;
}

// Функция для задания класса active номеру страницы в случае, если номер текущей страницы == номеру-ссылки рассматриваемой страницы
function isActive($currentPage, $linkPageNumber) {
    if ($currentPage == $linkPageNumber){
        return "active";
    }
    return "";
}

// Получение записей из БД (Использование ORDER BY article.ID DESC переворачивает результат выборки с целью
// отображения самых актуальных данных сверху)
$query_getExcursion = 'SELECT * FROM article WHERE article.type = "Excursion" AND article.ID >= '.$firstItemId.' AND 
article.ID <='.$lastItemId.' ORDER BY article.ID DESC';
$excursions = mysqli_query($conn, $query_getExcursion);

while($row = mysqli_fetch_array($excursions)) {
    echo ' <div class="card mb-3 article">
        <div class="row no-gutters">
            <div class="col-md-4 article__imgContainer">
                <img src="./assets/i/articles/'.$row['Picture'].'" class="card-img article__img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title article__title">'.$row['Name'].'</h5>
                    <p class="card-text article__text">'.$row['Description'].'</p>
                    <p class="card-text article__text article__text_muted"><small class="text-muted">'.date("d.m.Y", strtotime($row['Date'])).'</small></p>
                </div>
            </div>
        </div>
    </div>';
}

echo '<nav aria-label="Page navigation example" class="paginationContainer">
        <ul class="pagination">';
if($page != 1) { // Вывод ссылки "назад", если текущая страница != номеру последней страницы
    echo '
            <li class="page-item">
                <a class="page-link" href="./index.php?section=excursions&page='.($page - 1).'" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>';
}
for($i = 1; $i<=$pagesCount; $i++) { // Вывод всех номеров-ссылок страниц
    echo '<li class="page-item '.isActive($page, $i).'"><a class="page-link" href="./index.php?section=excursions&page='.$i.'">'.$i.'</a></li>';
}
if($page != $pagesCount) { // Вывод стрелки "вперед", если текущая страница != числу всех страниц (номеру последней страницы)
    echo '
     <li class="page-item">
                <a class="page-link" href="./index.php?section=excursions&page='.($page + 1).'"  aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
';
}


