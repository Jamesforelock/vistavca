<?php
require_once "./components/content/people/human.php";
require_once "./components/universal/paginator.php";
require_once "./components/content/Renderer.php";

// Рисовальщик людей на текущей странице
class PeopleRenderer extends Renderer {
    public function render($items, $table, $currentPage, $pagesCount) {
        $items = parent::reverseMySqlRes($items);
        $itemsRowCount = 0;
        echo '<div class="row">';
        foreach ($items as $item) {
            // Если число элементов делится нацело на 3, то закрываем строку и открываем новую
            if($itemsRowCount % 3 == 0 && $itemsRowCount != 0) {
                echo '
                </div>
                <div class="row">
                ';
            }
            // Если у пользователя есть фото
            if(isset($item['Picture'])) $picturePath = 'assets/i/'.$table.'/' . $item['Picture'];
            // Если у пользователя нет фото
            else $picturePath = 'assets/i/noPhoto.jpg';
            Human($item['Name'], $item['Description'], $picturePath);
            $itemsRowCount++;
        }
        echo '</div>'; // Закрываем строку
    }
    public function getTableType() {
        return "people";
    }
}