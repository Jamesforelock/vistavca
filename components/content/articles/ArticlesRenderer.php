<?php
require_once "./components/content/articles/article.php";
require_once "./components/universal/paginator.php";
require_once "./components/content/Renderer.php";

// Рисовальщик статей на текущей странице
class ArticlesRenderer extends Renderer {
    public function render($items, $table, $currentPage, $pagesCount) {
        $items = parent::reverseMySqlRes($items);
        $addable = $table === "excursion" && isset($_SESSION['login']) && $_SESSION["type"] === "visitor";
        $userArticles = $this->getUserArticles();
        if($addable) {
            $userArticlesId = array();
            foreach ($userArticles as $userArticle) {
                $userArticlesId[] = $userArticle['Excursion_ID'];
            }
            foreach ($items as $item) {
                if(in_array($item['ID'], $userArticlesId)) {
                    Article($item['ID'], $item['Name'], $item['Description'], 'assets/i/' . $table . '/' . $item['Picture'],
                            $item['Date'], array("isAdded" => true));
                }
                else {
                    Article($item['ID'], $item['Name'], $item['Description'], 'assets/i/' . $table . '/' . $item['Picture'],
                            $item['Date'], array("isAdded" => false));
                }
            }
        }
        else {
            foreach ($items as $item) {
                Article($item['ID'], $item['Name'], $item['Description'], 'assets/i/' . $table . '/' . $item['Picture'],
                    $item['Date'], false);
            }
        }
    }
    public function getTableType() {
        return "articles";
    }
    private function getUserArticles() {
        if(!isset($_SESSION['login'])) {
            return false;
        }
        $login = $_SESSION['login'];
        $conn = $GLOBALS['conn'];
        $getUserArticles_query = "SELECT * FROM `ev` WHERE Visitor_Login = '$login'";
        $userArticles = mysqli_query($conn, $getUserArticles_query);
        if(!$userArticles) {
            return false;
        }
        return parent::reverseMySqlRes($userArticles);
    }
}



