<?php
// Функция для задания класса active номеру страницы в случае, если номер текущей страницы == номеру-ссылки рассматриваемой страницы
function isActive($currentPage, $linkPageNumber) {
    if ($currentPage == $linkPageNumber){
        return "active";
    }
    return "";
}
function Paginator($currentPage, $pagesCount, $baseAddress) {
    echo ' <nav aria-label="Page navigation example" class="paginationContainer"> <ul class="pagination">';
        if($currentPage!= 1) { // Вывод ссылки "назад", если текущая страница != номеру последней страницы
            echo '
            <li class="page-item">
                <a class="page-link" href="'.$baseAddress.'&page='.($currentPage - 1).'" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>';
        }
        for($i = 1; $i<=$pagesCount; $i++) { // Вывод всех номеров-ссылок страниц
            echo '<li class="page-item '.isActive($currentPage, $i).'"><a class="page-link" href="'.$baseAddress.'&page='.$i.'">'.$i.'</a></li>';
        }
        if($currentPage != $pagesCount) { // Вывод стрелки "вперед", если текущая страница != числу всех страниц (номеру последней страницы)
            echo '
             <li class="page-item">
                <a class="page-link" href="'.$baseAddress.'&page='.($currentPage+ 1).'"  aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
           ';
        }
        echo '</ul></nav>';
}