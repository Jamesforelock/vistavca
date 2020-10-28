<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/vistavca/components/content/articles/article.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/vistavca/components/universal/paginator.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/vistavca/components/content/renderer.php';

// Рисовальщик статей на текущей странице
class ArticlesRenderer extends Renderer {
    public function render($items, $table) {
        $items = parent::reverseMySqlRes($items);
        foreach ($items as $item) {
            Article($item['ID'], $item['Name'], $item['Description'], 'assets/i/' . $table . '/' . $item['Picture'],
                $item['Date']);
        }
    }
    public function getTableType() {
        return "articles";
    }
}



