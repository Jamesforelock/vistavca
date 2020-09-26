<?php
    if(isset($_GET['section'])) { // Если в GET-запросе установлен параметр section
        switch ($_GET['section']) {
            case "excursions":
                require "excursions.php";
                break;
            case "visitors":
                require "visitors.php";
                break;
            case "stands":
                require "stands.php";
                break;
            case "assistants":
                require "assistants.php";
                break;
            default: // Если значение параметра page будет некорректным
                echo "<span style='margin-left: 50px'>Sorry, but the page does not exist</span>";
                break;
        }
    }
    else { // Иначе возвращаем компонент со статьями
        require "excursions.php";
    }
?>