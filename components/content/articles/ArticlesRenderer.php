<?php
require_once "./components/content/articles/article.php";
require_once "./components/universal/paginator.php";
require_once "./components/content/Renderer.php";

// Рисовальщик статей на текущей странице
class ArticlesRenderer extends Renderer {
    public function render($items, $table, $currentPage, $pagesCount) {
        $items = parent::reverseMySqlRes($items);
        foreach ($items as $item) {
            Article($item['Name'], $item['Description'], 'assets/i/' . $table . '/' . $item['Picture'],
                $item['Date']);
        }
    }
    public function getTableType() {
        return "articles";
    }
}



