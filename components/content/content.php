<?php
    if(isset($_GET['section'])) { // Если в GET-запросе установлен параметр section
        switch ($_GET['section']) {
            case "articles":
                require_once "articles/articles.php";
                break;
            case "people":
                require_once "people/people.php";
                break;
            case "profile":
                require_once "profile/profile.php";
                break;
            default: // Если значение параметра page будет некорректным
                echo "<span style='margin-left: 50px'>Sorry, but the page does not exist</span>";
                break;
        }
    }
    else { // Иначе возвращаем компонент со статьями
        require_once "articles/articles.php";
    }
?>