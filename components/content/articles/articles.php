<div class="articles container">
    <?php
        require_once "components/content/dataConnector.php";
        require_once "components/content/renderData.php";
        require_once "components/universal/intro.php";
        require_once "components/content/articles/ArticlesRenderer.php";
        require_once "components/content/articles/ExcursionsRenderer.php";
        $conn = $GLOBALS['conn'];
        $user = isset($GLOBALS['user']) ? $GLOBALS['user'] : null;
        if(isset($_GET['type'])) { // Проверяем, установлен ли тип статей
            $sectionType = $_GET['type'];
        }
        else { // Если тип статей не установлен
            $sectionType = 'excursion';
        }
        if(isset($_GET['page'])) { // Проверяем, задан ли параметр page
            $currentPage = $_GET['page'];
        }
        else { // Если page не задан, то отрисуется первая страница
            $currentPage = 1;
        }
        switch ($sectionType) {
            case 'excursion': // Если тип статей - экскурсии
                Intro("Excursions", "Here you can see our nice Excursions");
                // Если пользователь - посетитель, то рисуем экскурсии как экскурсии,
                // то есть так, чтобы на них можно было записаться
                $data = getData($conn, 5, "excursion", $currentPage);
                if($user && $user["type"] === "visitor") {
                    renderData($data, new ExcursionsRenderer());
                    break;
                }
                // Иначе рисуем экскурсии как обычные статьи, на которых нельзя записываться
                renderData($data, new ArticlesRenderer());
                break;
            case 'stand': // Если тип статей - стенды
                Intro("Stands", "Here you can see our nice Stands");
                $data = getData($conn, 5, "excursion", $currentPage);
                renderData($data, new ArticlesRenderer());
                break;
        }
    ?>
    <!--Скрипт плавного появления блока статей-->
    <script>
        let articles = document.getElementsByClassName("articles")[0]
        smoothAppear(articles)
    </script>
</div>