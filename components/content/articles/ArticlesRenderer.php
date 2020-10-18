<?php
require_once "./components/content/articles/article.php";
require_once "./components/universal/paginator.php";
require_once "./components/content/Renderer.php";

// Рисовальщик статей на текущей странице
class ArticlesRenderer extends Renderer {
    public function render($items, $table, $currentPage, $pagesCount) {
        while ($item = mysqli_fetch_array($items)) {
            Article($item['Name'], $item['Description'], 'assets/i/' . $table . '/' . $item['Picture'],
                $item['Date']);
        }
    }
}



