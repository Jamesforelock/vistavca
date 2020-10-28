<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/vistavca/components/content/articles/article.php';

// Показывает информацию для посетителя (список добавленных экскурсий)
function SecVisitorInfo ($conn, $login) {
    $getUserExcursions_query = "SELECT * FROM `ev` WHERE Visitor_Login = '$login'";
    $userExcursions = mysqli_query($conn, $getUserExcursions_query); // Получаем пользовательские экскурсии
    $userExcursionsId = array();
    while ($row = mysqli_fetch_array($userExcursions)) {
        $userExcursionsId[] = $row['Excursion_ID']; // Получаем ID пользовательских экскурсий
    }
    if(count($userExcursionsId) != 0) { // Если у пользователя есть добавленные экскурсии
        echo '
         <span class="secInfo__title">The excursions you signed up for</span>
         <div class="secInfo__scrollContent">
         ';
        $getExcursions_query = "SELECT * FROM `excursion` WHERE ";
        // Цикл формирования запроса
        // С каждой итерацией добавляется OR для добавления в результат выборки очередной экскурсии
        for($i = 0; $i<count($userExcursionsId); $i++) {
            $getExcursions_query = $getExcursions_query . "ID = $userExcursionsId[$i]";
            if($i === count($userExcursionsId) - 1) continue;
            $getExcursions_query = $getExcursions_query . " OR ";
        }
        // Получаем и отображаем пользовательские экскурсии
        $excursions = mysqli_query($conn, $getExcursions_query);
        while($excursion = mysqli_fetch_array($excursions)) {
            Excursion($excursion['ID'], $excursion['Name'], $excursion['Description'], 'assets/i/excursion/' . $excursion['Picture'],
            $excursion['Date'], "true");
        }
    }
    echo '</div>';
}